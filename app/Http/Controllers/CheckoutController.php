<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CheckoutController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function show()
    {
        if ($this->cart->isEmpty()) {
            return redirect()
                ->route('pages.frontend.cart.show')
                ->with('status', 'error')
                ->with('message', 'Keranjang kosong.');
        }

        if ($error = $this->checkStock()) {
            return redirect()
                ->route('pages.frontend.cart.show')
                ->with('status', 'error')
                ->with('message', $error);
        }

        return view('pages.frontend.checkout.index', [
            'items'           => $this->cart->all(),
            'subtotal'        => $this->cart->subtotal(),
            'shippingMethods' => config('shipping.methods'),
        ]);
    }

    public function store(Request $request)
    {
        if ($this->cart->isEmpty()) {
            return redirect()
                ->route('pages.frontend.cart.show')
                ->with('status', 'error')
                ->with('message', 'Keranjang kosong.');
        }

        if ($error = $this->checkStock()) {
            return redirect()
                ->route('pages.frontend.cart.show')
                ->with('status', 'error')
                ->with('message', $error);
        }

        $methodKeys = array_keys(config('shipping.methods'));

        $data = $request->validate([
            'customer_name'    => 'required|string|max:255',
            'customer_email'   => 'required|email|max:255',
            'customer_phone'   => 'required|string|max:20',
            'shipping_address' => 'required|string|max:2000',
            'shipping_method'  => ['required', Rule::in($methodKeys)],
            'notes'            => 'nullable|string|max:2000',
        ]);

        $subtotal        = $this->cart->subtotal();
        $shippingMethod  = $data['shipping_method'];
        $shippingCost    = (int) config("shipping.methods.{$shippingMethod}.cost", 0);
        $total           = $subtotal + $shippingCost;

        $order = DB::transaction(function () use ($data, $subtotal, $shippingCost, $shippingMethod, $total) {
            $order = Order::create([
                'order_number'     => $this->generateOrderNumber(),
                'customer_name'    => $data['customer_name'],
                'customer_email'   => $data['customer_email'],
                'customer_phone'   => $data['customer_phone'],
                'shipping_address' => $data['shipping_address'],
                'notes'            => $data['notes'] ?? null,
                'subtotal'         => $subtotal,
                'shipping_cost'    => $shippingCost,
                'shipping_method'  => $shippingMethod,
                'total'            => $total,
                'status'           => Order::STATUS_PENDING,
                'payment_method'   => 'dummy',
            ]);

            foreach ($this->cart->all() as $item) {
                OrderItem::create([
                    'order_id'     => $order->id,
                    'product_id'   => $item['product_id'],
                    'product_name' => $item['name'],
                    'price'        => $item['price'],
                    'quantity'     => $item['quantity'],
                    'subtotal'     => $item['price'] * $item['quantity'],
                ]);
            }

            return $order;
        });

        $this->cart->clear();

        $request->session()->put('checkout.last_order', $order->order_number);

        return redirect()->route('pages.frontend.payment.show', $order->order_number);
    }

    private function generateOrderNumber(): string
    {
        do {
            $number = 'ORD-' . now()->format('YmdHis') . '-' . str_pad((string) random_int(0, 999), 3, '0', STR_PAD_LEFT);
        } while (Order::where('order_number', $number)->exists());

        return $number;
    }

    private function checkStock(): ?string
    {
        foreach ($this->cart->all() as $item) {
            $product = Product::find($item['product_id']);
            if (! $product) {
                return "Produk '{$item['name']}' tidak tersedia lagi.";
            }
            if (! is_null($product->stock) && $product->stock < $item['quantity']) {
                return "Stok '{$product->name}' tidak cukup (tersisa {$product->stock}).";
            }
        }

        return null;
    }
}
