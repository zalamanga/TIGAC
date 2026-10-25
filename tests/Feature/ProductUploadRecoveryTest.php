<?php

namespace Tests\Feature;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\ProductService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Mockery;
use PDO;
use RuntimeException;
use Tests\TestCase;

class ProductUploadFaultPdo extends PDO
{
    public ?RuntimeException $afterCommit = null;
    public ?RuntimeException $duringRollback = null;

    public function commit(): bool
    {
        $result = parent::commit();
        if ($this->afterCommit !== null) {
            throw $this->afterCommit;
        }

        return $result;
    }

    public function rollBack(): bool
    {
        if ($this->duringRollback !== null) {
            throw $this->duringRollback;
        }

        return parent::rollBack();
    }
}

class ProductUploadRecoveryTest extends TestCase
{
    private ProductUploadFaultPdo $pdo;

    protected function setUp(): void
    {
        parent::setUp();
        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
            'filesystems.default' => 'local',
        ]);
        DB::purge('sqlite');
        $this->pdo = new ProductUploadFaultPdo('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec('PRAGMA foreign_keys = ON');
        DB::connection()->setPdo($this->pdo)->setReadPdo($this->pdo);
        $this->artisan('migrate', ['--force' => true])->assertExitCode(0);
        Storage::fake('local');
        Storage::fake('public');
    }

    protected function tearDown(): void
    {
        if (isset($this->pdo)) {
            $this->pdo->afterCommit = null;
            $this->pdo->duringRollback = null;
            if ($this->pdo->inTransaction()) {
                $this->pdo->rollBack();
            }
        }
        DB::purge('sqlite');
        parent::tearDown();
    }

    private function productData(): array
    {
        $category = ProductCategory::create(['name' => 'Recovery fixture', 'is_active' => '1']);

        return [
            'name' => 'Upload recovery fixture', 'sku' => null,
            'description' => 'Synthetic isolated upload recovery fixture.',
            'product_category_id' => $category->id, 'price' => 10000,
            'discount_percent' => 0, 'is_active' => '1', 'is_hot_item' => '0',
            'is_device' => '0', 'is_collaboration_project' => '0',
            'stock' => 3, 'product_external_link' => null,
            'images' => [UploadedFile::fake()->createWithContent('fixture.png', base64_decode(
                'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+j2ioAAAAASUVORK5CYII='
            ))],
            'image_name' => ['Fixture'], 'image_description' => ['Synthetic image'],
            'product_variants' => [],
        ];
    }

    private function failingService(RuntimeException $failure): ProductService
    {
        $repository = Mockery::mock(ProductRepositoryInterface::class);
        $repository->shouldReceive('createProduct')->once()->andReturnUsing(fn ($data) => Product::create($data));
        $repository->shouldReceive('storeProductImage')->once()->andReturnUsing(fn ($product, $data) => $product->images()->create($data));
        $repository->shouldReceive('attachProductVariant')->once()->andThrow($failure);

        return new ProductService($repository);
    }

    private function assertOriginalFailure(ProductService $service, array $data, RuntimeException $failure): void
    {
        try {
            $service->storeProductData($data);
            $this->fail('The controlled failure must propagate.');
        } catch (RuntimeException $actual) {
            $this->assertSame($failure, $actual);
        }
    }

    public function test_nested_rollback_removes_only_its_new_image_and_preserves_other_media(): void
    {
        Storage::disk('local')->put('products/existing.png', 'Existing unrelated local media.');
        Storage::disk('public')->put('products/other.png', 'Existing unrelated public media.');
        DB::beginTransaction();
        $data = $this->productData();
        $failure = new RuntimeException('Controlled relation write failure.');
        $this->assertOriginalFailure($this->failingService($failure), $data, $failure);

        $this->assertDatabaseCount('products', 0);
        $this->assertDatabaseCount('product_images', 0);
        $this->assertSame(1, DB::transactionLevel());
        $this->assertTrue($this->pdo->inTransaction());
        $this->assertSame(['products/existing.png'], Storage::disk('local')->allFiles('products'));
        Storage::disk('public')->assertExists('products/other.png');
    }

    public function test_successful_create_keeps_the_image_on_the_configured_default_disk(): void
    {
        config(['filesystems.default' => 'public']);
        Storage::disk('local')->put('products/existing.png', 'Existing unrelated local media.');
        $this->app->make(ProductService::class)->storeProductData($this->productData());

        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseCount('product_images', 1);
        $path = Product::firstOrFail()->images()->firstOrFail()->image_path;
        Storage::disk('public')->assertExists($path);
        Storage::disk('local')->assertMissing($path);
        Storage::disk('local')->assertExists('products/existing.png');
        $this->assertSame(0, DB::transactionLevel());
    }

    private function assertFailedStoreRejected($result): void
    {
        $data = $this->productData();
        $image = Mockery::mock(UploadedFile::class);
        $image->shouldReceive('store')->once()->with('products', 'local')->andReturn($result);
        $data['images'] = [$image];
        Storage::disk('local')->put('products/existing.png', 'Existing media.');
        try {
            $this->app->make(ProductService::class)->storeProductData($data);
            $this->fail('An unsuccessful file store cannot create an image record.');
        } catch (RuntimeException $actual) {
            $this->assertSame('Product image could not be stored.', $actual->getMessage());
        }
        $this->assertDatabaseCount('products', 0);
        $this->assertDatabaseCount('product_images', 0);
        $this->assertSame(['products/existing.png'], Storage::disk('local')->allFiles('products'));
        $this->assertSame(0, DB::transactionLevel());
    }

    public function test_false_store_result_is_rejected_before_recording_an_image(): void
    {
        $this->assertFailedStoreRejected(false);
    }

    public function test_empty_store_result_is_rejected_before_recording_an_image(): void
    {
        $this->assertFailedStoreRejected('');
    }

    public function test_failed_cleanup_retains_original_failure_and_logs_a_generic_warning(): void
    {
        $disk = Storage::disk('local');
        $proxy = Mockery::mock($disk)->makePartial();
        $proxy->shouldReceive('delete')->once()->andReturn(false);
        Storage::set('local', $proxy);
        Log::spy();
        $failure = new RuntimeException('Controlled product relation failure.');
        $this->assertOriginalFailure($this->failingService($failure), $this->productData(), $failure);

        $this->assertDatabaseCount('products', 0);
        $this->assertCount(1, $disk->allFiles('products'));
        Log::shouldHaveReceived('warning')->once()->with('Product creation upload cleanup could not be completed.');
    }

    public function test_cleanup_and_logging_exceptions_cannot_mask_the_original_failure(): void
    {
        $disk = Storage::disk('local');
        $proxy = Mockery::mock($disk)->makePartial();
        $proxy->shouldReceive('delete')->once()->andThrow(new RuntimeException('Controlled cleanup exception.'));
        Storage::set('local', $proxy);
        Log::shouldReceive('warning')->once()->andThrow(new RuntimeException('Controlled logger exception.'));
        $failure = new RuntimeException('Original controlled persistence failure.');
        $this->assertOriginalFailure($this->failingService($failure), $this->productData(), $failure);

        $this->assertDatabaseCount('products', 0);
        $this->assertCount(1, $disk->allFiles('products'));
    }

    public function test_actual_commit_then_lost_acknowledgement_keeps_committed_row_and_file(): void
    {
        $data = $this->productData();
        $failure = new RuntimeException('Controlled acknowledgement loss after actual commit.');
        $this->pdo->afterCommit = $failure;
        $this->assertOriginalFailure($this->app->make(ProductService::class), $data, $failure);

        $this->assertFalse($this->pdo->inTransaction());
        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseCount('product_images', 1);
        $path = Product::firstOrFail()->images()->firstOrFail()->image_path;
        Storage::disk('local')->assertExists($path);
    }

    public function test_unconfirmed_rollback_retains_new_media_and_the_original_exception(): void
    {
        $data = $this->productData();
        $failure = new RuntimeException('Original controlled relation failure.');
        $this->pdo->duringRollback = new RuntimeException('Controlled PDO rollback failure.');
        Log::spy();
        $this->assertOriginalFailure($this->failingService($failure), $data, $failure);

        $this->assertTrue($this->pdo->inTransaction());
        $this->assertCount(1, Storage::disk('local')->allFiles('products'));
        Log::shouldHaveReceived('warning')->once()->with('Product creation rollback could not be confirmed; uploaded media retained.');
    }
}
