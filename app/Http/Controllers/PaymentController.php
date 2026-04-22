<?php

namespace App\Http\Controllers;

use App\Mail\OrderPaid;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function show(Request $request, string $orderNumber)
    {
        $order = $this->findOrderOrAbort($request, $orderNumber);

        if ($order->status !== Order::STATUS_PENDING) {
            return redirect()->route('pages.frontend.payment.success', $order->order_number);
        }

        return view('pages.frontend.payment.show', compact('order'));
    }

    public function pay(Request $request, string $orderNumber)
    {
        $order = $this->findOrderOrAbort($request, $orderNumber);

        if ($order->status === Order::STATUS_PENDING) {
            DB::transaction(function () use ($order) {
                $order->update([
                    'status'  => Order::STATUS_PAID,
                    'paid_at' => now(),
                ]);

                foreach ($order->items as $item) {
                    if (! $item->product_id) {
                        continue;
                    }
                    $product = Product::lockForUpdate()->find($item->product_id);
                    if ($product && ! is_null($product->stock)) {
                        $product->decrement('stock', $item->quantity);
                    }
                }
            });

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

        return view('pages.frontend.payment.success', compact('order'));
    }

    private function findOrderOrAbort(Request $request, string $orderNumber): Order
    {
        $order = Order::where('order_number', $orderNumber)->with('items')->firstOrFail();

        $isOwnerSession = $request->session()->get('checkout.last_order') === $order->order_number;
        $isAdmin        = $request->user() !== null;

        abort_unless($isOwnerSession || $isAdmin, 404);

        return $order;
    }
}
