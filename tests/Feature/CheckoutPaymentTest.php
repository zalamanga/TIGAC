<?php

namespace Tests\Feature;

use App\Mail\OrderPaid;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class CheckoutPaymentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Mail::fake();
    }

    private function product(?int $stock = 3): Product
    {
        $category = ProductCategory::create(['name' => 'Demo', 'is_active' => '1']);

        return Product::create([
            'name' => 'Demo Product', 'description' => 'Test only',
            'price' => 10000, 'stock' => $stock, 'is_active' => '1',
            'product_category_id' => $category->id,
        ]);
    }

    private function checkout(Product $product, int $quantity = 2): Order
    {
        $this->post('/cart/add/'.$product->slug, ['quantity' => $quantity])->assertRedirect('/cart');
        $this->post('/checkout', [
            'customer_name' => 'Demo Customer', 'customer_email' => 'demo@example.test',
            'customer_phone' => '0800000000', 'shipping_address' => 'Test address',
            'shipping_method' => 'regular',
        ])->assertRedirect();

        return Order::with('items')->sole();
    }

    public function test_payment_decrements_stock_and_sends_one_notification_on_repeated_requests(): void
    {
        $product = $this->product();
        $order = $this->checkout($product);
        $this->assertSame(3, $product->fresh()->stock);

        $this->post('/payment/'.$order->order_number.'/pay')->assertRedirect();
        $this->post('/payment/'.$order->order_number.'/pay')->assertRedirect();

        $this->assertSame(1, $product->fresh()->stock);
        $this->assertSame(Order::STATUS_PAID, $order->fresh()->status);
        Mail::assertSent(OrderPaid::class, 1);
    }

    public function test_payment_rechecks_stock_and_rolls_back_without_sending_mail(): void
    {
        $product = $this->product();
        $order = $this->checkout($product);
        $product->update(['stock' => 1]);

        $this->postJson('/payment/'.$order->order_number.'/pay')->assertUnprocessable()->assertJsonValidationErrors('payment');

        $this->assertSame(1, $product->fresh()->stock);
        $this->assertSame(Order::STATUS_PENDING, $order->fresh()->status);
        Mail::assertNothingSent();
    }

    public function test_insufficient_stock_on_later_item_rolls_back_all_stock_changes(): void
    {
        $product = $this->product(5);
        $order = $this->checkout($product);
        $second = $product->replicate();
        $second->name = 'Second Demo Product';
        $second->stock = 1;
        $second->save();
        $order->items()->create([
            'product_id' => $second->id, 'product_name' => $second->name,
            'price' => 10000, 'quantity' => 2, 'subtotal' => 20000,
        ]);

        $this->postJson('/payment/'.$order->order_number.'/pay')->assertUnprocessable();

        $this->assertSame(5, $product->fresh()->stock);
        $this->assertSame(1, $second->fresh()->stock);
        $this->assertSame(Order::STATUS_PENDING, $order->fresh()->status);
        Mail::assertNothingSent();
    }

    public function test_logged_in_customer_cannot_read_another_sessions_order(): void
    {
        $order = $this->checkout($this->product());
        $this->flushSession();
        $this->actingAs(User::factory()->create());
        $this->get('/payment/'.$order->order_number)->assertNotFound();
        $this->post('/payment/'.$order->order_number.'/pay')->assertNotFound();
        Mail::assertNothingSent();
    }

    public function test_checkout_uses_current_database_price_instead_of_old_cart_price(): void
    {
        $product = $this->product();
        $this->post('/cart/add/'.$product->slug, ['quantity' => 2]);
        $product->update(['price' => 12000]);
        $this->post('/checkout', [
            'customer_name' => 'Demo Customer', 'customer_email' => 'demo@example.test',
            'customer_phone' => '0800000000', 'shipping_address' => 'Test address',
            'shipping_method' => 'regular',
        ])->assertRedirect();
        $order = Order::with('items')->sole();
        $this->assertEquals(24000, $order->subtotal);
        $this->assertEquals(39000, $order->total);
        $this->assertEquals(12000, $order->items->sole()->price);
    }

    public function test_unknown_shipping_method_cannot_create_order(): void
    {
        $product = $this->product();
        $this->post('/cart/add/'.$product->slug);
        $this->postJson('/checkout', [
            'customer_name' => 'Demo', 'customer_email' => 'demo@example.test',
            'customer_phone' => '0800', 'shipping_address' => 'Demo',
            'shipping_method' => 'free',
        ])->assertUnprocessable()->assertJsonValidationErrors('shipping_method');
        $this->assertDatabaseCount('orders', 0);
    }

    public function test_null_stock_remains_unlimited_after_payment(): void
    {
        $product = $this->product(null);
        $order = $this->checkout($product);
        $this->post('/payment/'.$order->order_number.'/pay')->assertRedirect();
        $this->assertNull($product->fresh()->stock);
    }

    public function test_cart_cannot_exceed_quantity_limit_by_repeated_adds(): void
    {
        $product = $this->product(null);
        $this->post('/cart/add/'.$product->slug, ['quantity' => 99]);
        $this->post('/cart/add/'.$product->slug, ['quantity' => 1])->assertSessionHas('status', 'error');
        $this->assertSame(99, session('cart')[$product->id]['quantity']);
    }

    public function test_admin_cannot_reset_paid_order_to_pending(): void
    {
        $order = $this->checkout($this->product());
        $this->post('/payment/'.$order->order_number.'/pay');
        $admin = User::factory()->create();
        $admin->is_admin = true;
        $admin->save();

        $this->actingAs($admin)->putJson('/admin/orders/'.$order->id.'/status', ['status' => 'pending'])
            ->assertUnprocessable()->assertJsonValidationErrors('status');
        $this->assertSame(Order::STATUS_PAID, $order->fresh()->status);
    }

    public function test_knowing_a_buyers_email_is_not_enough_to_submit_a_review(): void
    {
        $product = $this->product();
        $order = $this->checkout($product);
        $this->post('/payment/'.$order->order_number.'/pay');
        $this->flushSession();

        $this->postJson('/product/'.$product->slug.'/reviews', [
            'name' => 'Demo', 'email' => 'demo@example.test', 'rating' => 5, 'comment' => 'Test review',
        ])->assertUnprocessable()->assertJsonValidationErrors('email');
        $this->assertDatabaseCount('product_reviews', 0);
    }

    public function test_verified_paid_order_session_can_submit_a_review(): void
    {
        $product = $this->product();
        $order = $this->checkout($product);
        $this->post('/payment/'.$order->order_number.'/pay');
        $this->post('/product/'.$product->slug.'/reviews', [
            'name' => 'Demo', 'email' => 'demo@example.test', 'rating' => 5, 'comment' => 'Test review',
        ])->assertRedirect('/product/'.$product->slug);
        $this->assertDatabaseCount('product_reviews', 1);
    }

    public function test_pending_order_cannot_display_a_successful_payment(): void
    {
        $order = $this->checkout($this->product());
        $this->get('/payment/'.$order->order_number.'/success')->assertRedirect('/payment/'.$order->order_number);
        $this->assertSame(Order::STATUS_PENDING, $order->fresh()->status);
    }

    public function test_cancelled_order_cannot_be_paid_or_display_success(): void
    {
        $product = $this->product();
        $order = $this->checkout($product);
        $order->update(['status' => Order::STATUS_CANCELLED]);
        $this->get('/payment/'.$order->order_number)->assertRedirect('/cek-pesanan');
        $this->get('/payment/'.$order->order_number.'/success')->assertRedirect('/cek-pesanan');
        $this->post('/payment/'.$order->order_number.'/pay')->assertRedirect('/cek-pesanan');
        $this->assertSame(3, $product->fresh()->stock);
        $this->assertSame(Order::STATUS_CANCELLED, $order->fresh()->status);
        Mail::assertNothingSent();
    }
}
