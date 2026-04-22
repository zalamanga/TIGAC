@extends('layouts.frontend.main')
@section('title','Pembayaran')
@section('content')
<section class="container my-5 py-3" style="max-width: 720px;">
    <div class="text-center mb-4">
        <h1 class="fw-bold">Pembayaran</h1>
        <p class="text-secondary mb-0">Selesaikan pembayaran untuk pesanan berikut</p>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-secondary">Nomor Pesanan</span>
                <span class="fw-semibold">{{ $order->order_number }}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-secondary">Nama</span>
                <span>{{ $order->customer_name }}</span>
            </div>
            <div class="d-flex justify-content-between mb-3">
                <span class="text-secondary">Status</span>
                <span class="badge {{ $order->statusBadgeClass() }}">{{ strtoupper($order->status) }}</span>
            </div>

            <hr>

            <h6 class="fw-bold mb-2">Item Pesanan</h6>
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
                <span>Ongkos kirim</span>
                <span>Rp{{ number_format($order->shipping_cost, 0, '.', '.') }}</span>
            </div>
            <div class="d-flex justify-content-between fw-bold fs-5">
                <span>Total</span>
                <span>Rp{{ number_format($order->total, 0, '.', '.') }}</span>
            </div>
        </div>
    </div>

    <div class="card bg-light">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Dummy Payment Gateway</h5>
            <p class="mb-3">
                Silakan transfer ke rekening berikut (simulasi — transaksi <strong>tidak nyata</strong>):
            </p>
            <div class="p-3 bg-white rounded border mb-3">
                <div class="d-flex justify-content-between mb-1">
                    <span class="text-secondary">Bank</span>
                    <span class="fw-semibold">TIGAC VIRTUAL BANK</span>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <span class="text-secondary">Nomor Rekening</span>
                    <span class="fw-semibold">0000-{{ substr($order->order_number, -4) }}-1234</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="text-secondary">Atas Nama</span>
                    <span class="fw-semibold">TIGAC.ID</span>
                </div>
            </div>
            <p class="text-secondary small mb-3">
                Setelah "transfer" simulasi, klik tombol di bawah untuk menandai pembayaran sebagai lunas.
            </p>
            <form method="POST" action="{{ route('pages.frontend.payment.pay', $order->order_number) }}">
                @csrf
                <button type="submit" class="btn btn-success w-100 text-white">
                    Saya Sudah Bayar
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
