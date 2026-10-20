<?php

namespace App\Http\Controllers;

use App\Mail\OrderPaid;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    public function show(Request $request, string $orderNumber)
    {
        $order = $this->findOrderOrAbort($request, $orderNumber);

        if ($order->status === Order::STATUS_CANCELLED) {
            return $this->cancelledOrderRedirect();
        }

        if ($order->status !== Order::STATUS_PENDING) {
            return redirect()->route('pages.frontend.payment.success', $order->order_number);
        }

        return view('pages.frontend.payment.show', compact('order'));
    }

    public function pay(Request $request, string $orderNumber)
    {
        $order = $this->findOrderOrAbort($request, $orderNumber);

        if ($order->status === Order::STATUS_CANCELLED) {
            return $this->cancelledOrderRedirect();
        }

        $paid = DB::transaction(function () use ($order) {
            // Serialize repeat payment requests before checking status or changing stock.
            $lockedOrder = Order::lockForUpdate()->findOrFail($order->id);
            if ($lockedOrder->status !== Order::STATUS_PENDING) {
                return false;
            }

            foreach ($lockedOrder->items()->orderBy('product_id')->get() as $item) {
                $product = $item->product_id
                    ? Product::lockForUpdate()->find($item->product_id)
                    : null;

                if (! $product || (! is_null($product->stock) && $product->stock < $item->quantity)) {
                    throw ValidationException::withMessages([
                        'payment' => 'Produk atau stok berubah. Hubungi pengelola sebelum melanjutkan simulasi pembayaran.',
                    ]);
                }
                if (! is_null($product->stock)) {
                    $product->decrement('stock', $item->quantity);
                }
            }

            $lockedOrder->update(['status' => Order::STATUS_PAID, 'paid_at' => now()]);

            return true;
        });

        if ($paid) {
            try {
                Mail::to($order->customer_email)->send(new OrderPaid($order->fresh('items')));
            } catch (\Throwable $e) {
                Log::warning('Order email notification failed: ' . $e->getMessage(), [
                    'order_number' => $order->order_number,
                ]);
            }
        }

        return redirect()->route('pages.frontend.payment.success', $order->order_number);
    }

    public function success(Request $request, string $orderNumber)
    {
        $order = $this->findOrderOrAbort($request, $orderNumber);

        if ($order->status === Order::STATUS_PENDING) {
            return redirect()->route('pages.frontend.payment.show', $order->order_number);
        }
        if ($order->status === Order::STATUS_CANCELLED) {
            return $this->cancelledOrderRedirect();
        }

        abort_unless(in_array($order->status, [Order::STATUS_PAID, Order::STATUS_PROCESSING, Order::STATUS_SHIPPED, Order::STATUS_COMPLETED], true), 404);

        return view('pages.frontend.payment.success', compact('order'));
    }

    private function cancelledOrderRedirect()
    {
        return redirect()->route('pages.frontend.order-lookup.show')
            ->with('status', 'error')->with('message', 'Pesanan dibatalkan. Simulasi pembayaran tidak tersedia.');
    }

    private function findOrderOrAbort(Request $request, string $orderNumber): Order
    {
        $order = Order::where('order_number', $orderNumber)->with('items')->firstOrFail();

        $isOwnerSession = $request->session()->get('checkout.last_order') === $order->order_number;
        $isAdmin        = (bool) $request->user()?->is_admin;

        abort_unless($isOwnerSession || $isAdmin, 404);

        return $order;
    }
}
