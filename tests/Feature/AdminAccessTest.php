<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    private const PASSWORD = 'Test-only-password-123!';

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
        Mail::fake();
        Notification::fake();
    }

    public function test_guests_must_log_in_before_accessing_admin_pages(): void
    {
        foreach (['/admin', '/admin/orders', '/userManagement'] as $path) {
            $this->get($path)->assertRedirect(route('login'));
        }
    }

    public function test_regular_users_cannot_access_admin_pages_or_uploads(): void
    {
        $this->actingAs($this->user());

        foreach (['/admin', '/admin/orders', '/userManagement'] as $path) {
            $this->get($path)->assertForbidden();
        }
        $this->post('/newsletter-upload-image')->assertForbidden();
    }

    public function test_admin_can_access_dashboard(): void
    {
        $this->actingAs($this->user(true))->get('/admin')->assertOk();
    }

    public function test_public_registration_cannot_grant_admin_or_follow_admin_intended_url(): void
    {
        $this->withSession(['url.intended' => '/admin'])->post('/register', [
            'name' => 'Registered Member',
            'email' => 'member@example.test',
            'password' => self::PASSWORD,
            'password_confirmation' => self::PASSWORD,
            'is_admin' => true,
        ])->assertRedirect('/');

        $user = User::where('email', 'member@example.test')->firstOrFail();
        $this->assertFalse($user->is_admin);
        $this->assertAuthenticatedAs($user);
        $this->get('/admin')->assertForbidden();
    }

    public function test_admin_flag_is_not_mass_assignable(): void
    {
        $user = new User(['is_admin' => true]);

        $this->assertFalse($user->is_admin);
        $this->assertNotContains('is_admin', $user->getFillable());
    }

    public function test_regular_user_login_goes_to_public_home(): void
    {
        $user = $this->user();

        $this->withSession(['url.intended' => '/admin/orders'])->post('/login', [
            'email' => $user->email,
            'password' => self::PASSWORD,
        ])->assertRedirect('/');

        $this->get('/admin')->assertForbidden();
    }

    public function test_admin_login_goes_to_dashboard(): void
    {
        $user = $this->user(true);

        $this->post('/login', [
            'email' => $user->email,
            'password' => self::PASSWORD,
        ])->assertRedirect('/admin');
    }

    public function test_authenticated_regular_users_visiting_guest_pages_go_to_public_home(): void
    {
        $this->actingAs($this->user());

        foreach (['/login', '/register'] as $path) {
            $this->get($path)->assertRedirect('/');
        }
    }

    public function test_authenticated_admins_visiting_guest_pages_go_to_dashboard(): void
    {
        $this->actingAs($this->user(true));

        foreach (['/login', '/register'] as $path) {
            $this->get($path)->assertRedirect('/admin');
        }
    }

    public function test_health_endpoint_is_public_and_contains_no_user_data(): void
    {
        $this->get('/up')->assertOk()->assertExactJson(['status' => 'ok']);
        $this->get('/linkstorage')->assertNotFound();
    }

    public function test_subscriber_resource_exposes_only_store(): void
    {
        $routes = collect(Route::getRoutes())->filter(
            fn ($route) => str_starts_with((string) $route->getName(), 'pages.frontend.subscriber.')
        );

        $this->assertCount(1, $routes);
        $this->assertSame(['POST'], $routes->first()->methods());
    }

    public function test_checkout_payment_lookup_and_review_posts_have_rate_limits(): void
    {
        $limits = [
            'pages.frontend.checkout.store' => 'throttle:10,1',
            'pages.frontend.payment.pay' => 'throttle:30,1',
            'pages.frontend.order-lookup.lookup' => 'throttle:10,1',
            'pages.frontend.product.reviews.store' => 'throttle:5,1',
        ];

        foreach ($limits as $name => $middleware) {
            $route = Route::getRoutes()->getByName($name);
            $this->assertNotNull($route);
            $this->assertContains($middleware, $route->gatherMiddleware());
        }
    }

    public function test_public_subscription_saves_only_validated_email(): void
    {
        $this->post('/subscriber', [
            'mail_customer' => 'subscriber@example.test',
            'email' => 'ignored@example.test',
            'is_admin' => true,
        ])->assertRedirect();

        $this->assertDatabaseHas('subscribers', ['email' => 'subscriber@example.test']);
        $this->assertDatabaseCount('subscribers', 1);
        $this->assertDatabaseCount('users', 0);
        $this->post('/subscriber', [
            'mail_customer' => 'subscriber@example.test',
        ])->assertSessionHasErrors('mail_customer');
    }

    public function test_admin_command_creates_admin_with_a_hashed_password(): void
    {
        $this->artisan('app:create-admin')
            ->expectsQuestion('Email akun admin', 'new-admin@example.test')
            ->expectsQuestion('Nama admin', 'Development Admin')
            ->expectsQuestion('Password admin (minimal 12 karakter)', self::PASSWORD)
            ->expectsQuestion('Ulangi password admin', self::PASSWORD)
            ->expectsOutput('Akun admin dibuat.')
            ->assertExitCode(0);

        $user = User::where('email', 'new-admin@example.test')->firstOrFail();
        $this->assertTrue($user->is_admin);
        $this->assertNotSame(self::PASSWORD, $user->password);
        $this->assertTrue(Hash::check(self::PASSWORD, $user->password));
    }

    public function test_existing_user_promotion_requires_confirmation(): void
    {
        $user = $this->user();

        $this->artisan('app:create-admin')
            ->expectsQuestion('Email akun admin', $user->email)
            ->expectsConfirmation('Akun sudah ada. Berikan akses admin kepada akun ini?', 'no')
            ->expectsOutput('Promosi dibatalkan.')
            ->assertExitCode(0);

        $this->assertFalse($user->fresh()->is_admin);
    }

    public function test_explicit_promotion_preserves_existing_password(): void
    {
        $user = $this->user();
        $passwordHash = $user->password;

        $this->artisan('app:create-admin')
            ->expectsQuestion('Email akun admin', $user->email)
            ->expectsConfirmation('Akun sudah ada. Berikan akses admin kepada akun ini?', 'yes')
            ->expectsOutput('Akses admin diberikan. Password akun tidak diubah.')
            ->assertExitCode(0);

        $this->assertTrue($user->fresh()->is_admin);
        $this->assertSame($passwordHash, $user->fresh()->password);
    }

    public function test_admin_command_rejects_password_confirmation_mismatch(): void
    {
        $this->artisan('app:create-admin')
            ->expectsQuestion('Email akun admin', 'new-admin@example.test')
            ->expectsQuestion('Nama admin', 'Development Admin')
            ->expectsQuestion('Password admin (minimal 12 karakter)', self::PASSWORD)
            ->expectsQuestion('Ulangi password admin', 'A-different-password-123!')
            ->assertExitCode(1);

        $this->assertDatabaseCount('users', 0);
    }

    public function test_admin_command_refuses_noninteractive_use(): void
    {
        $this->artisan('app:create-admin', ['--no-interaction' => true])
            ->expectsOutput('Perintah ini memerlukan terminal interaktif.')
            ->assertExitCode(1);

        $this->assertDatabaseCount('users', 0);
    }

    private function user(bool $admin = false): User
    {
        return User::factory()->create([
            'password' => Hash::make(self::PASSWORD),
            'is_admin' => $admin,
        ]);
    }
}
