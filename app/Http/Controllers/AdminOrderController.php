<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(15);

        return view('pages.admin.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items');

        return view('pages.admin.order.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => ['required', Rule::in(Order::$statuses)],
        ]);

        DB::transaction(function () use ($order, $data) {
            $locked = Order::lockForUpdate()->findOrFail($order->id);
            $allowed = $locked->allowedNextStatuses();
            if ($data['status'] !== $locked->status && ! in_array($data['status'], $allowed, true)) {
                throw ValidationException::withMessages(['status' => 'Perubahan status tidak diizinkan. Pembayaran hanya melalui simulasi pembayaran.']);
            }
            $locked->update(['status' => $data['status']]);
        });

        return redirect()
            ->route('admin.orders.show', $order)
            ->with('status', 'success')
            ->with('message', 'Status order diperbarui.');
    }
}
