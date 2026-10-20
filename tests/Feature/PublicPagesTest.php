<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public static function publicPages(): array
    {
        return array_map(fn ($path) => [$path], ['/', '/product', '/cart', '/cek-pesanan', '/faq', '/login', '/register']);
    }

    #[DataProvider('publicPages')]
    public function test_public_pages_open_with_a_fresh_database(string $path): void
    {
        $this->get($path)->assertOk();
    }

    public function test_auth_pages_link_to_working_registration_and_password_reset_forms(): void
    {
        $this->get('/login')->assertOk()
            ->assertSee('href="'.route('password.request').'"', false)
            ->assertSee('href="'.route('register').'"', false);
        $this->get('/register')->assertOk()->assertSee('href="'.route('login').'"', false);
        $this->get(route('password.request'))->assertOk()
            ->assertSee('action="'.route('password.email').'"', false)
            ->assertSee('name="email"', false)
            ->assertSee('href="'.route('login').'"', false);
    }

    public function test_password_reset_notification_and_form_can_change_the_password(): void
    {
        Notification::fake();
        $user = User::factory()->create(['email' => 'reset@example.test']);

        $this->from(route('password.request'))->post(route('password.email'), ['email' => $user->email])
            ->assertRedirect(route('password.request'))->assertSessionHas('status');

        $token = null;
        Notification::assertSentTo($user, ResetPassword::class, function ($notification) use (&$token) {
            $token = $notification->token;

            return is_string($token) && $token !== '';
        });
        $this->assertNotNull($token);

        $this->get(route('password.reset', ['token' => $token, 'email' => $user->email]))
            ->assertOk()->assertSee('action="'.route('password.update').'"', false)
            ->assertSee('name="token"', false)->assertSee($token);

        $newPassword = 'Changed-test-password-123!';
        $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => $newPassword,
            'password_confirmation' => $newPassword,
        ])->assertRedirect(route('login'));

        $this->assertTrue(Hash::check($newPassword, $user->fresh()->password));
        $this->post('/login', ['email' => $user->email, 'password' => $newPassword])->assertRedirect('/');
    }
}
