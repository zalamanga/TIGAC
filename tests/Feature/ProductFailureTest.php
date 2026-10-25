<?php

namespace Tests\Feature;

use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Mockery;
use RealRashid\SweetAlert\Facades\Alert;
use RuntimeException;
use Tests\TestCase;

class ProductFailureTest extends TestCase
{
    use RefreshDatabase;

    protected function beforeRefreshingDatabase(): void
    {
        config([
            'database.default' => 'sqlite',
            'database.connections.sqlite.database' => ':memory:',
        ]);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
    }

    private function productData(string $name): array
    {
        $category = ProductCategory::create(['name' => 'Fixture category', 'is_active' => '1']);

        return [
            'name' => $name,
            'sku' => 'TEST-ONLY',
            'description' => 'Synthetic product for isolated tests.',
            'product_category_id' => $category->id,
            'price' => 10000,
            'discount_percent' => 0,
            'is_active' => '1',
            'is_hot_item' => '0',
            'is_device' => '0',
            'is_collaboration_project' => '0',
            'stock' => 3,
            'product_external_link' => null,
            'product_variants' => [],
        ];
    }

    private function failAfterInsert(RuntimeException $failure): ProductRepositoryInterface
    {
        $repository = Mockery::mock(ProductRepositoryInterface::class);
        $repository->shouldReceive('createProduct')->once()->andReturnUsing(function (array $data) {
            $product = Product::create($data);
            $this->assertDatabaseHas('products', ['id' => $product->id]);

            return $product;
        });
        $repository->shouldReceive('attachProductVariant')->once()->andThrow($failure);

        return $repository;
    }

    public function test_unknown_product_slug_returns_not_found(): void
    {
        $this->get('/product/no-such-fixture-product')->assertNotFound();
        $this->assertDatabaseCount('products', 0);
    }

    public function test_existing_detail_still_renders_product_and_only_approved_reviews(): void
    {
        $data = $this->productData('Existing fixture product');
        unset($data['product_variants']);
        $product = Product::create($data);
        $product->reviews()->create([
            'name' => 'Fixture reviewer',
            'email' => 'review@example.test',
            'rating' => 4,
            'comment' => 'Visible approved fixture review.',
            'is_approved' => true,
        ]);
        $product->reviews()->create([
            'name' => 'Pending reviewer',
            'email' => 'pending@example.test',
            'rating' => 1,
            'comment' => 'Hidden unapproved fixture review.',
            'is_approved' => false,
        ]);

        $this->get('/product/'.$product->slug)
            ->assertOk()
            ->assertSee('Existing fixture product')
            ->assertSee('Visible approved fixture review.')
            ->assertDontSee('Hidden unapproved fixture review.');
    }

    public function test_service_propagates_original_failure_and_rolls_back_an_actual_insert(): void
    {
        $data = $this->productData('Rolled back fixture product');
        $failure = new RuntimeException('Controlled relation failure.');
        $service = new ProductService($this->failAfterInsert($failure));
        $transactionLevel = DB::transactionLevel();

        try {
            $service->storeProductData($data);
            $this->fail('Product creation must propagate its persistence failure.');
        } catch (RuntimeException $error) {
            $this->assertSame($failure, $error);
        }

        $this->assertDatabaseMissing('products', ['name' => $data['name']]);
        $this->assertDatabaseCount('product_images', 0);
        $this->assertSame($transactionLevel, DB::transactionLevel());
    }

    public function test_admin_http_failure_returns_to_create_and_never_announces_success(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $data = $this->productData('HTTP rollback fixture');
        $repository = $this->failAfterInsert(new RuntimeException('Controlled persistence failure.'));
        $this->app->instance(ProductRepositoryInterface::class, $repository);
        Alert::spy();
        $transactionLevel = DB::transactionLevel();

        $this->post(route('admin.products.store'), $data)
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('admin.products.create'));

        Alert::shouldHaveReceived('error')->once();
        Alert::shouldNotHaveReceived('success');
        $this->assertDatabaseMissing('products', ['name' => $data['name']]);
        $this->assertSame($transactionLevel, DB::transactionLevel());
    }

    public function test_valid_admin_create_still_persists_and_announces_success(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $data = $this->productData('Successful HTTP fixture');
        Alert::spy();

        $this->post(route('admin.products.store'), $data)
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('admin.products.index'));

        Alert::shouldHaveReceived('success')->once();
        Alert::shouldNotHaveReceived('error');
        $this->assertDatabaseHas('products', ['name' => $data['name'], 'stock' => 3]);
        $this->assertDatabaseCount('products', 1);
    }
}
