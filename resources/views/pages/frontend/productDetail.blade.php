@php
    $relatedProductChunks = $relatedProducts->chunk(4);
@endphp

@extends('layouts.frontend.main')
@section('title','Product Detail Page')
@section('content')
    <section class="container mt-3 mb-5 pb-3 my-md-4">
        <div class="mb-4" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="--bs-breadcrumb-divider-color: #bfbfbf">
                <li class="breadcrumb-item" style="color: #bfbfbf">Home</li>
                <li class="breadcrumb-item" style="color: #bfbfbf">Product</li>
                <li class="breadcrumb-item" style="color: #bfbfbf">Tigac</li>
                <li class="breadcrumb-item" aria-current="page">{{ $product->name }}</li>
            </ol>
        </div>

        <div class="d-flex flex-column flex-lg-row gap-3 gap-lg-2 gap-xl-5 mb-5">
            <div class="card-product-detail-item d-flex align-items-center justify-content-center p-4">
                @if($product->images->first() == null)
                    <img src="{{ asset('images/Picture_Not_Yet_Available.png') }}" alt="{{ $product->name }}"
                    class="img-fluid">
                @else
                    <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}"
                    class="img-fluid">
                @endif
            </div>

            <div style="max-width: 589px">
                <h1 class="display-7 fw-semibold">{{ $product->name }}</h1>
                <div class="d-flex gap-2 align-items-center mb-2">
                    {{-- <p class="bg-body-tertiary fs-5 py-1 px-3 fw-semibold m-0" style="color: #4ABA1E">Frësh</p> --}}
                    <p class="bg-body-tertiary fs-7 py-1 px-3 fw-semibold m-0" style="color: #4ABA1E">{{ $product->variants->first() != null ? $product->variants->first()->name .'' : ''}}</p>
                    <p class="fs-7 text-secondary m-0 fw-medium">{{ $product->productCategory->name }}</p>
                </div>
                <h2 class="display-7 fw-bold mb-3">Rp{{ number_format($product->price, 0, '.', '.') }},-</h2>
                <div class="text-secondary mb-3 fs-7 lh-1" id="productDetail">
                    {!! $product->description !!}
                </div>
                @if (session('status') === 'success')
                    <div class="alert alert-success py-2">{{ session('message') }}</div>
                @endif
                <form method="POST" action="{{ route('pages.frontend.cart.add', $product->slug) }}"
                      class="d-flex gap-2 align-items-center">
                    @csrf
                    <input type="number" name="quantity" value="1" min="1" max="99"
                           class="form-control" style="width: 80px; height: 3.5rem;">
                    <button type="submit" class="btn btn-lg btn-dark border-0 text-white"
                            style="min-width: 12.5rem; height: 3.5rem;">
                        <span class="fs-5">Tambah ke Keranjang</span>
                    </button>
                </form>
            </div>
        </div>
        {{-- Reviews --}}
        <div class="mb-5">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h4 class="fw-bold fs-2 text-black m-0">Ulasan Pembeli</h4>
                @if ($reviews->isNotEmpty())
                    <div class="text-secondary">
                        <span class="fs-4 fw-bold text-dark">{{ number_format($averageRating, 1) }}</span>
                        / 5 ({{ $reviews->count() }} ulasan)
                    </div>
                @endif
            </div>

            @if (session('review_status') === 'success')
                <div class="alert alert-success">{{ session('review_message') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-4">
                <div class="col-12 col-lg-7">
                    @if ($reviews->isEmpty())
                        <div class="text-center text-secondary py-4 border rounded-4">
                            Belum ada ulasan untuk produk ini. Jadilah yang pertama!
                        </div>
                    @else
                        @foreach ($reviews as $review)
                            <div class="border-bottom py-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <div>
                                        <strong>{{ $review->name }}</strong>
                                        <span class="badge bg-success-subtle text-success small ms-1">
                                            ✓ Pembeli Terverifikasi
                                        </span>
                                    </div>
                                    <small class="text-secondary">
                                        {{ $review->created_at->diffForHumans() }}
                                    </small>
                                </div>
                                <div class="text-warning mb-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        {{ $i <= $review->rating ? '★' : '☆' }}
                                    @endfor
                                </div>
                                <p class="mb-0 text-secondary">{{ $review->comment }}</p>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-12 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fw-bold mb-1">Tulis Ulasan</h5>
                            <p class="small text-secondary mb-3">
                                Hanya pembeli terverifikasi yang dapat menulis ulasan. Gunakan email yang sama dengan email pemesanan.
                            </p>
                            <form method="POST"
                                  action="{{ route('pages.frontend.product.reviews.store', $product->slug) }}">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label small">Nama</label>
                                    <input type="text" name="name" class="form-control" required maxlength="100"
                                           value="{{ old('name') }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Email (yang dipakai saat checkout)</label>
                                    <input type="email" name="email" class="form-control" required maxlength="255"
                                           value="{{ old('email') }}">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label small">Rating</label>
                                    <select name="rating" class="form-select" required>
                                        @for ($i = 5; $i >= 1; $i--)
                                            <option value="{{ $i }}" @selected(old('rating') == $i)>
                                                {{ str_repeat('★', $i) }}{{ str_repeat('☆', 5 - $i) }} ({{ $i }})
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Komentar</label>
                                    <textarea name="comment" rows="4" class="form-control" required maxlength="2000">{{ old('comment') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary border-0 text-white w-100">
                                    Kirim Ulasan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div data-aos="fade-down">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h4 class="fw-bold fs-2 text-black">Related Products</h4>
                <a href="{{ Route('pages.frontend.product') }}"
                    class="d-flex align-items-center gap-2 fs-6 text-danger text-decoration-none">Check all product
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.4697 5.46967C12.7626 5.17678 13.2374 5.17678 13.5303 5.46967L19.5303 11.4697C19.8232 11.7626 19.8232 12.2374 19.5303 12.5303L13.5303 18.5303C13.2374 18.8232 12.7626 18.8232 12.4697 18.5303C12.1768 18.2374 12.1768 17.7626 12.4697 17.4697L17.1893 12.75H0.75C0.33579 12.75 0 12.4142 0 12C0 11.5858 0.33579 11.25 0.75 11.25H17.1893L12.4697 6.53033C12.1768 6.23744 12.1768 5.76256 12.4697 5.46967Z"
                            fill="#EE2D38" />
                    </svg>
                </a>
            </div>
            <div id="carouselProductRelated" class="carousel slide">
                <div class="carousel-inner">
                    @foreach ($relatedProductChunks as $index => $relatedProductChunk)
                        <div class="carousel-item carousel-item-product {{ $loop->index == 0 ? 'active' : '' }}">
                            <div class="d-flex align-items-center justify-content-around flex-nowrap gap-2 gap-md-3">
                                @foreach ($relatedProductChunk as $relatedProduct)
                                    <a href="{{ Route('pages.frontend.product.detail', $relatedProduct->slug) }}"
                                        class="border rounded-4 overflow-hidden card-product-item position-relative d-flex align-items-center justify-content-center shadow-sm">

                                        @if($relatedProduct->images->first() == null)
                                            <img src="{{ asset('images/Picture_Not_Yet_Available.png') }}"
                                            alt="{{ $relatedProduct->name }}" class="img-fluid transition-all">
                                        @else
                                            <img src="{{ asset('storage/' . $relatedProduct->images->first()->image_path) }}"
                                            alt="{{ $relatedProduct->name }}" class="img-fluid transition-all">
                                        @endif
                                        <div class="bg-body-secondary text-secondary position-absolute bottom-0 w-full p-3">
                                            <h3 class="product-title fw-semibold m-0 text-truncate">
                                                {{ $relatedProduct->name }}</h3>
                                            <span
                                                class="d-block fs-7 text-truncate">{{ $relatedProduct->productCategory->name }}
                                                {{ $relatedProduct->variants->first() ? ' - ' . $relatedProduct->variants->first()->name : '' }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev opacity-100 justify-content-start btn-arrow-product-prev"
                    type="button" data-bs-target="#carouselProductRelated" data-bs-slide="prev">
                    <span
                        class="bg-black d-flex align-items-center justify-content-center text-white btn-arrow-product rounded-circle p-lg-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <g clip-path="url(#clip0_2271_1118)">
                                <path
                                    d="M7.828 13L13.192 18.364L11.778 19.778L4 12L11.778 4.22195L13.192 5.63595L7.828 11L20 11V13L7.828 13Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_2271_1118">
                                    <rect width="24" height="24" fill="white"
                                        transform="matrix(-1 0 0 -1 24 24)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next opacity-100 justify-content-end btn-arrow-product-next" type="button"
                    data-bs-target="#carouselProductRelated" data-bs-slide="next">
                    <span
                        class="bg-black d-flex align-items-center justify-content-center text-white btn-arrow-product rounded-circle p-lg-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <g clip-path="url(#clip0_2271_1113)">
                                <path
                                    d="M16.172 11L10.808 5.63605L12.222 4.22205L20 12L12.222 19.778L10.808 18.364L16.172 13H4V11H16.172Z"
                                    fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_2271_1113">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
@endsection
