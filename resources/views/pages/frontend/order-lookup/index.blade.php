@extends('layouts.frontend.main')
@section('title','Cek Pesanan')
@section('content')
<section class="container my-5 py-3" style="max-width: 720px;">
    <h1 class="fw-bold mb-4">Cek Pesanan</h1>

    @if (session('status') === 'error')
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <form method="POST" action="{{ route('pages.frontend.order-lookup.lookup') }}">
                @csrf
                <div class="row g-2">
                    <div class="col-md-6">
                        <label class="form-label">Nomor Pesanan</label>
                        <input type="text" name="order_number" class="form-control"
                               placeholder="ORD-..." value="{{ old('order_number') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email') }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary border-0 text-white mt-3">Cek Status</button>
            </form>
        </div>
    </div>

    @if ($order)
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold m-0">{{ $order->order_number }}</h5>
                        <small class="text-secondary">{{ $order->created_at->format('d M Y H:i') }}</small>
                    </div>
                    <span class="badge {{ $order->statusBadgeClass() }} fs-6">
                        {{ strtoupper($order->status) }}
                    </span>
                </div>

                <hr>

                <h6 class="fw-bold mb-2">Item</h6>
                <ul class="list-unstyled mb-3">
                    @foreach ($order->items as $item)
                        <li class="d-flex justify-content-between mb-1">
                            <span>{{ $item->product_name }} × {{ $item->quantity }}</span>
                            <span>Rp{{ number_format($item->subtotal, 0, '.', '.') }}</span>
                        </li>
                    @endforeach
                </ul>

                <hr>

                <div class="d-flex justify-content-between mb-1">
                    <span>Subtotal</span>
                    <span>Rp{{ number_format($order->subtotal, 0, '.', '.') }}</span>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <span>Ongkos Kirim</span>
                    <span>Rp{{ number_format($order->shipping_cost, 0, '.', '.') }}</span>
                </div>
                <div class="d-flex justify-content-between fw-bold fs-5">
                    <span>Total</span>
                    <span>Rp{{ number_format($order->total, 0, '.', '.') }}</span>
                </div>

                @if ($order->status === \App\Models\Order::STATUS_PENDING)
                    <div class="alert alert-warning mt-3 mb-0">
                        Pesanan belum dibayar.
                        <a href="{{ route('pages.frontend.payment.show', $order->order_number) }}"
                           class="alert-link">Klik di sini untuk bayar.</a>
                    </div>
                @elseif ($order->paid_at)
                    <div class="alert alert-success mt-3 mb-0">
                        Dibayar pada {{ $order->paid_at->format('d M Y H:i') }}
                    </div>
                @endif
            </div>
        </div>
    @endif
</section>
@endsection
