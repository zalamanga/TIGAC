<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        $order->update(['status' => $data['status']]);

        return redirect()
            ->route('admin.orders.show', $order)
            ->with('status', 'success')
            ->with('message', 'Status order diperbarui.');
    }
}
