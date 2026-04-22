@extends('layouts.frontend.main')
@section('title','Keranjang')
@section('content')
<section class="container my-5 py-3">
    <h1 class="fw-bold mb-4">Keranjang Belanja</h1>

    @if (session('status'))
        <div class="alert alert-{{ session('status') === 'error' ? 'danger' : 'success' }}">
            {{ session('message') }}
        </div>
    @endif

    @if ($items->isEmpty())
        <div class="text-center py-5 border rounded-4">
            <p class="fs-5 text-secondary mb-3">Keranjang Anda masih kosong.</p>
            <a href="{{ route('pages.frontend.product') }}" class="btn btn-primary border-0">Belanja Sekarang</a>
        </div>
    @else
        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-end">Harga</th>
                                    <th style="width: 150px;">Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                @if ($item['image_path'])
                                                    <img src="{{ asset('storage/' . $item['image_path']) }}"
                                                         alt="{{ $item['name'] }}"
                                                         style="width: 64px; height: 64px; object-fit: cover;"
                                                         class="rounded">
                                                @else
                                                    <img src="{{ asset('images/Picture_Not_Yet_Available.png') }}"
                                                         alt="{{ $item['name'] }}"
                                                         style="width: 64px; height: 64px; object-fit: cover;"
                                                         class="rounded">
                                                @endif
                                                <div>
                                                    <a href="{{ route('pages.frontend.product.detail', $item['slug']) }}"
                                                       class="fw-semibold text-decoration-none text-dark">
                                                        {{ $item['name'] }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-end">Rp{{ number_format($item['price'], 0, '.', '.') }}</td>
                                        <td>
                                            <form method="POST"
                                                  action="{{ route('pages.frontend.cart.update', $item['product_id']) }}"
                                                  class="d-flex gap-1">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}"
                                                       min="1" max="99" class="form-control form-control-sm">
                                                <button type="submit" class="btn btn-sm btn-outline-secondary">OK</button>
                                            </form>
                                        </td>
                                        <td class="text-end fw-semibold">
                                            Rp{{ number_format($item['price'] * $item['quantity'], 0, '.', '.') }}
                                        </td>
                                        <td class="text-end">
                                            <form method="POST"
                                                  action="{{ route('pages.frontend.cart.remove', $item['product_id']) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <form method="POST" action="{{ route('pages.frontend.cart.clear') }}" class="mt-3">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Kosongkan Keranjang</button>
                </form>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Ringkasan</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>Rp{{ number_format($subtotal, 0, '.', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3 text-secondary">
                            <span>Ongkos kirim</span>
                            <span>Dihitung saat checkout</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5 mb-3">
                            <span>Total</span>
                            <span>Rp{{ number_format($subtotal, 0, '.', '.') }}</span>
                        </div>
                        <a href="{{ route('pages.frontend.checkout.show') }}"
                           class="btn btn-primary border-0 text-white w-100">
                            Lanjut ke Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>
@endsection
