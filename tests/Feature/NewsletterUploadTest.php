<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class NewsletterUploadTest extends TestCase
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
        Storage::fake('public');
    }

    public function test_admin_can_upload_an_image_to_public_storage(): void
    {
        $response = $this->actingAs($this->admin())->postJson('/newsletter-upload-image', [
            'file' => UploadedFile::fake()->image('banner.png', 32, 24),
        ])->assertOk()->assertJsonStructure(['location']);

        $location = $response->json('location');
        $this->assertIsString($location);
        $this->assertStringStartsWith('/storage/newsletter/', $location);
        Storage::disk('public')->assertExists(substr($location, strlen('/storage/')));
        $this->assertCount(1, Storage::disk('public')->allFiles());
    }

    public function test_the_five_megabyte_limit_is_inclusive(): void
    {
        $this->actingAs($this->admin())->postJson('/newsletter-upload-image', [
            'file' => UploadedFile::fake()->image('banner.jpg')->size(5120),
        ])->assertOk()->assertJsonStructure(['location']);

        $this->assertCount(1, Storage::disk('public')->allFiles());
    }

    public function test_guests_cannot_upload_images(): void
    {
        $this->postJson('/newsletter-upload-image', [
            'file' => UploadedFile::fake()->image('banner.png'),
        ])->assertUnauthorized();

        Storage::disk('public')->assertDirectoryEmpty('/');
    }

    public function test_regular_users_cannot_upload_images(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => false]))
            ->postJson('/newsletter-upload-image', [
                'file' => UploadedFile::fake()->image('banner.png'),
            ])->assertForbidden();

        Storage::disk('public')->assertDirectoryEmpty('/');
    }

    public function test_an_image_is_required(): void
    {
        $this->actingAs($this->admin())->postJson('/newsletter-upload-image')
            ->assertUnprocessable()->assertJsonValidationErrors('file');

        Storage::disk('public')->assertDirectoryEmpty('/');
    }

    public function test_a_text_file_with_an_image_extension_is_rejected(): void
    {
        $path = tempnam(sys_get_temp_dir(), 'tigac-invalid-image-');
        file_put_contents($path, 'This is not an image.');
        try {
            $this->actingAs($this->admin())->postJson('/newsletter-upload-image', [
                'file' => new UploadedFile($path, 'banner.png', 'image/png', UPLOAD_ERR_OK, true),
            ])->assertUnprocessable()->assertJsonValidationErrors('file');
        } finally {
            if (is_file($path)) {
                unlink($path);
            }
        }

        Storage::disk('public')->assertDirectoryEmpty('/');
    }

    public function test_svg_images_are_rejected(): void
    {
        $this->actingAs($this->admin())->postJson('/newsletter-upload-image', [
            'file' => UploadedFile::fake()->createWithContent(
                'banner.svg',
                '<svg xmlns="http://www.w3.org/2000/svg" width="1" height="1"><rect width="1" height="1"/></svg>'
            ),
        ])->assertUnprocessable()->assertJsonValidationErrors('file');

        Storage::disk('public')->assertDirectoryEmpty('/');
    }

    public function test_images_over_five_megabytes_are_rejected(): void
    {
        $this->actingAs($this->admin())->postJson('/newsletter-upload-image', [
            'file' => UploadedFile::fake()->image('banner.png')->size(5121),
        ])->assertUnprocessable()->assertJsonValidationErrors('file');

        Storage::disk('public')->assertDirectoryEmpty('/');
    }

    private function admin(): User
    {
        return User::factory()->create(['is_admin' => true]);
    }
}
