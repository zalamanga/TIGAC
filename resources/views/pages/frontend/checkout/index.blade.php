@extends('layouts.frontend.main')
@section('title','Checkout')
@section('content')
<section class="container my-5 py-3">
    <h1 class="fw-bold mb-4">Checkout</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('pages.frontend.checkout.store') }}">
        @csrf
        <div class="row g-4">
            <div class="col-12 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Data Pemesan</h5>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="customer_name" value="{{ old('customer_name') }}"
                                   class="form-control" required maxlength="255">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="customer_email" value="{{ old('customer_email') }}"
                                       class="form-control" required maxlength="255">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nomor HP</label>
                                <input type="text" name="customer_phone" value="{{ old('customer_phone') }}"
                                       class="form-control" required maxlength="20">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Pengiriman</label>
                            <textarea name="shipping_address" rows="3" class="form-control" required maxlength="2000">{{ old('shipping_address') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Metode Pengiriman</label>
                            @foreach ($shippingMethods as $key => $method)
                                <div class="form-check border rounded p-3 mb-2 ms-0 ps-5">
                                    <input class="form-check-input" type="radio" name="shipping_method"
                                           value="{{ $key }}" id="ship_{{ $key }}"
                                           @checked(old('shipping_method', array_key_first($shippingMethods)) === $key)>
                                    <label class="form-check-label w-100 d-flex justify-content-between"
                                           for="ship_{{ $key }}">
                                        <span>{{ $method['label'] }}</span>
                                        <span class="fw-semibold">Rp{{ number_format($method['cost'], 0, '.', '.') }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-0">
                            <label class="form-label">Catatan (opsional)</label>
                            <textarea name="notes" rows="2" class="form-control" maxlength="2000">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">Pesanan Anda</h5>
                        <ul class="list-unstyled mb-3">
                            @foreach ($items as $item)
                                <li class="d-flex justify-content-between mb-2">
                                    <span>{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                                    <span>Rp{{ number_format($item['price'] * $item['quantity'], 0, '.', '.') }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal</span>
                            <span>Rp{{ number_format($subtotal, 0, '.', '.') }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Ongkos kirim</span>
                            <span id="shippingCostDisplay">Rp0</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-5 mb-3">
                            <span>Total</span>
                            <span id="totalDisplay">Rp{{ number_format($subtotal, 0, '.', '.') }}</span>
                        </div>
                        <script>
                            (function () {
                                const subtotal = {{ $subtotal }};
                                const costs = @json(collect($shippingMethods)->map(fn($m) => $m['cost']));
                                const fmt = n => 'Rp' + Number(n).toLocaleString('id-ID');
                                const shipEl = document.getElementById('shippingCostDisplay');
                                const totalEl = document.getElementById('totalDisplay');

                                function update() {
                                    const picked = document.querySelector('input[name="shipping_method"]:checked');
                                    if (!picked) return;
                                    const cost = costs[picked.value] || 0;
                                    shipEl.textContent = fmt(cost);
                                    totalEl.textContent = fmt(subtotal + cost);
                                }

                                document.querySelectorAll('input[name="shipping_method"]')
                                    .forEach(el => el.addEventListener('change', update));
                                update();
                            })();
                        </script>

                        <div class="alert alert-info small mb-3">
                            Metode pembayaran: <strong>Dummy Gateway</strong> (simulasi — tidak ada transaksi nyata)
                        </div>

                        <button type="submit" class="btn btn-primary border-0 text-white w-100">
                            Lanjut ke Pembayaran
                        </button>
                        <a href="{{ route('pages.frontend.cart.show') }}" class="btn btn-link w-100 mt-2">
                            Kembali ke Keranjang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
@endsection
