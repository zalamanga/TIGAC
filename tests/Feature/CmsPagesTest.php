<?php

namespace Tests\Feature;

use App\Models\Masterpiece;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CmsPagesTest extends TestCase
{
    use RefreshDatabase;

    private const LIST_ROUTES = [
        'admin.product.product-category.index',
        'admin.product.product-variant.index',
        'userManagement.index',
        'admin.products.index',
        'admin.hero-banners.index',
        'admin.newsletters.index',
        'admin.partnerships.index',
        'admin.contacts.index',
        'admin.masterpieces.index',
        'admin.programs.index',
        'admin.video-home-banners.index',
        'admin.faqs.index',
    ];

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

    public function test_admin_can_open_all_cms_lists_with_an_empty_catalog(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]));

        foreach (self::LIST_ROUTES as $name) {
            $response = $this->get(route($name));

            $this->assertSame(200, $response->getStatusCode(), 'GET '.$name);
        }
    }

    public function test_cms_lists_return_datatables_json(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]));

        foreach (self::LIST_ROUTES as $name) {
            $response = $this->getJson(route($name, [
                'draw' => 1,
                'start' => 0,
                'length' => 10,
            ]), ['X-Requested-With' => 'XMLHttpRequest']);

            $this->assertSame(200, $response->getStatusCode(), 'AJAX GET '.$name);
            $response->assertJsonStructure(['draw', 'recordsTotal', 'recordsFiltered', 'data'])
                ->assertJsonPath('draw', 1)
                ->assertJsonCount($name === 'userManagement.index' ? 1 : 0, 'data');
        }
    }

    public function test_guests_must_log_in_before_opening_cms_lists(): void
    {
        foreach (self::LIST_ROUTES as $name) {
            $this->get(route($name))->assertRedirect(route('login'));
        }
    }

    public function test_regular_users_cannot_open_cms_lists(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => false]));

        foreach (self::LIST_ROUTES as $name) {
            $this->get(route($name))->assertForbidden();
        }
    }

    public function test_admin_can_open_masterpiece_details_and_edit_page(): void
    {
        $this->actingAs(User::factory()->create(['is_admin' => true]));
        $masterpiece = Masterpiece::create([
            'name' => 'Test Masterpiece',
            'detail_link' => '/product/test-masterpiece',
            'thumbnail' => 'fixtures/masterpiece.png',
            'is_active' => true,
        ]);

        foreach (['admin.masterpieces.show', 'admin.masterpieces.edit'] as $name) {
            $this->get(route($name, $masterpiece))->assertOk()->assertSee('Test Masterpiece');
        }
    }
}
