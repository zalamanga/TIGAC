<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderLookupController extends Controller
{
    public function show()
    {
        return view('pages.frontend.order-lookup.index', ['order' => null]);
    }

    public function lookup(Request $request)
    {
        $data = $request->validate([
            'order_number' => 'required|string|max:255',
            'email'        => 'required|email|max:255',
        ]);

        $order = Order::where('order_number', $data['order_number'])
            ->where('customer_email', $data['email'])
            ->with('items')
            ->first();

        if (! $order) {
            return back()
                ->withInput()
                ->with('status', 'error')
                ->with('message', 'Pesanan tidak ditemukan. Periksa nomor pesanan dan email.');
        }

        $request->session()->put('checkout.last_order', $order->order_number);

        return view('pages.frontend.order-lookup.index', compact('order'));
    }
}
