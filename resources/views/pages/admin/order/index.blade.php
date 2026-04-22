@extends('layouts.admin.main')
@section('title_admin', 'Orders')
@section('content')
    @if (session('status') === 'success')
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <section class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Manage Orders</div>
                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Order Number</th>
                                <th>Customer</th>
                                <th class="text-end">Total</th>
                                <th>Status</th>
                                <th>Dibuat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="fw-semibold">{{ $order->order_number }}</td>
                                    <td>
                                        {{ $order->customer_name }}<br>
                                        <small class="text-secondary">{{ $order->customer_email }}</small>
                                    </td>
                                    <td class="text-end">Rp{{ number_format($order->total, 0, '.', '.') }}</td>
                                    <td>
                                        <span class="badge {{ $order->statusBadgeClass() }}">
                                            {{ strtoupper($order->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.orders.show', $order) }}"
                                           class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-secondary py-4">
                                        Belum ada order.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
