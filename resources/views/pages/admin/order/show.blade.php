@extends('layouts.admin.main')
@section('title_admin', 'Order Detail')
@section('content')
    @if (session('status') === 'success')
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-secondary mb-3">&larr; Kembali</a>

    <section class="row">
        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Order {{ $order->order_number }}</span>
                    <span class="badge {{ $order->statusBadgeClass() }}">{{ strtoupper($order->status) }}</span>
                </div>
                <div class="card-body table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-end">Harga</th>
                                <th class="text-end">Qty</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item->product_name }}</td>
                                    <td class="text-end">Rp{{ number_format($item->price, 0, '.', '.') }}</td>
                                    <td class="text-end">{{ $item->quantity }}</td>
                                    <td class="text-end">Rp{{ number_format($item->subtotal, 0, '.', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end">Subtotal</td>
                                <td class="text-end">Rp{{ number_format($order->subtotal, 0, '.', '.') }}</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-end">
                                    Ongkos kirim
                                    <small class="text-secondary">
                                        ({{ config("shipping.methods.{$order->shipping_method}.label", strtoupper($order->shipping_method)) }})
                                    </small>
                                </td>
                                <td class="text-end">Rp{{ number_format($order->shipping_cost, 0, '.', '.') }}</td>
                            </tr>
                            <tr class="fw-bold">
                                <td colspan="3" class="text-end">Total</td>
                                <td class="text-end">Rp{{ number_format($order->total, 0, '.', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Customer</div>
                <div class="card-body">
                    <p class="mb-1"><strong>Nama:</strong> {{ $order->customer_name }}</p>
                    <p class="mb-1"><strong>Email:</strong> {{ $order->customer_email }}</p>
                    <p class="mb-1"><strong>HP:</strong> {{ $order->customer_phone }}</p>
                    <p class="mb-1"><strong>Alamat:</strong><br>{{ $order->shipping_address }}</p>
                    @if ($order->notes)
                        <p class="mb-0"><strong>Catatan:</strong><br>{{ $order->notes }}</p>
                    @endif
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Pembayaran</div>
                <div class="card-body">
                    <p class="mb-1"><strong>Metode:</strong> {{ strtoupper($order->payment_method) }}</p>
                    <p class="mb-1">
                        <strong>Dibayar pada:</strong>
                        {{ $order->paid_at ? $order->paid_at->format('d M Y H:i') : '-' }}
                    </p>
                    <p class="mb-0"><strong>Dibuat:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header">Update Status</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select mb-3">
                            @foreach (\App\Models\Order::$statuses as $s)
                                <option value="{{ $s }}" @selected($order->status === $s)>
                                    {{ strtoupper($s) }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary w-100">Simpan Status</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
