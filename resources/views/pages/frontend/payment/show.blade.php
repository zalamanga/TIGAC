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
            <h5 class="fw-bold mb-3">Simulasi Pembayaran</h5>
            <p class="mb-3">Mode demo. Tidak ada transfer uang atau koneksi ke bank.
                Tombol di bawah menandai pesanan lunas dan mengurangi stok untuk pengujian.</p>
            @error('payment')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
            <form method="POST" action="{{ route('pages.frontend.payment.pay', $order->order_number) }}">
                @csrf
                <button type="submit" class="btn btn-success w-100 text-white">
                    Simulasikan Pembayaran Lunas
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
