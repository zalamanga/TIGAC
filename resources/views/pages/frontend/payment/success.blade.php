@extends('layouts.frontend.main')
@section('title','Pembayaran Berhasil')
@section('content')
<section class="container my-5 py-3" style="max-width: 720px;">
    <div class="text-center mb-4">
        <div class="mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" fill="#198754"
                 viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
        </div>
        <h1 class="fw-bold">Pembayaran Berhasil</h1>
        <p class="text-secondary">
            Terima kasih! Pesanan Anda sedang kami proses.
        </p>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <span class="text-secondary">Nomor Pesanan</span>
                <span class="fw-semibold">{{ $order->order_number }}</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <span class="text-secondary">Status</span>
                <span class="badge {{ $order->statusBadgeClass() }}">{{ strtoupper($order->status) }}</span>
            </div>
            @if ($order->paid_at)
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-secondary">Dibayar pada</span>
                    <span>{{ $order->paid_at->format('d M Y, H:i') }}</span>
                </div>
            @endif
            <div class="d-flex justify-content-between">
                <span class="text-secondary">Total</span>
                <span class="fw-bold">Rp{{ number_format($order->total, 0, '.', '.') }}</span>
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="{{ route('pages.frontend.product') }}" class="btn btn-primary border-0 text-white">
            Belanja Lagi
        </a>
        <a href="{{ route('pages.frontend.index') }}" class="btn btn-link">Kembali ke Beranda</a>
    </div>
</section>
@endsection
