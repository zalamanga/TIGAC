@extends('layouts.main')
@section('content')
    <div class="container pt-3 pb-5 mb-5 py-md-5">
        <div class="d-flex gap-3 align-items-center mb-4 mb-md-5">
            <button
                class="badge badge-light transition-all d-flex align-items-center rounded-pill text-bg-light py-2 px-3 gap-2 border-0"
                onclick="window.history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 256 256">
                    <path
                        d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z">
                    </path>
                </svg>
                Back
            </button>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb align-items-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ Route('pages.products') }}"
                            class="text-white-50 text-decoration-none">Products</a></li>
                    <li class="breadcrumb-item active text-capitalize text-white" aria-current="page">
                        {{ $product['category'] }}</li>
                </ol>
            </nav>
        </div>
        <div class="row align-items-start justify-content-between gap-3 gap-md-0">
            <div class="col-12 col-md-6 col-lg-5">
                <img src="{{ asset('images/products/' . $product['image']) }}" alt="{{ $product['name'] }}"
                    class="img-fluid rounded border mb-3 product-detail-image">
                <div class="row align-items-center justify-content-center">
                    @for ($i = 0; $i < 3; $i++)
                        <img src="{{ asset('images/products/' . $product['image']) }}" alt="{{ $product['name'] }}"
                            class="col-2 img-fluid rounded">
                    @endfor
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-7">
                <div class="bg-light d-inline-block py-2 px-3 rounded-pill text-capitalize fs-7 fw-semibold mb-4">
                    {{ $product['category'] }}</div>
                <h1 class="text-white fs-1 fw-bold mb-2">{{ $product['name'] }}</h1>
                <div class="d-flex gap-2 mb-2">
                    <div class="d-flex align-items-center text-warning gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            viewBox="0 0 256 256">
                            <path
                                d="M234.29,114.85l-45,38.83L203,211.75a16.4,16.4,0,0,1-24.5,17.82L128,198.49,77.47,229.57A16.4,16.4,0,0,1,53,211.75l13.76-58.07-45-38.83A16.46,16.46,0,0,1,31.08,86l59-4.76,22.76-55.08a16.36,16.36,0,0,1,30.27,0l22.75,55.08,59,4.76a16.46,16.46,0,0,1,9.37,28.86Z">
                            </path>
                        </svg>
                        <span class="text-white fw-bold">{{ $product['rating'] }}</span>
                    </div>
                    <span class="text-light">20k+ Reviews</span>
                </div>
                <div class="mb-4">
                    <p class="text-white fs-7">{{ $product['description'] }}</p>
                </div>
                <div class="mb-4 d-flex gap-2 align-items-center pb-3 border-bottom">
                    <h2 class="fw-bold fs-1 text-white">
                        Rp.{{ number_format($product['price'] - $product['price'] * 0.1) }}
                    </h2>
                    <h3 class="text-secondary text-decoration-line-through fs-4">
                        Rp.{{ number_format($product['price']) }}
                    </h3>
                    <div class="badge badge-danger text-bg-danger rounded-pill">-10%</div>
                </div>
                <div class="ms-1 row align-items-center gap-3">
                    <div class="col-4 col-md-5 col-lg-3 border rounded p-3 text-white">
                        <h5 class="fs-6 fw-bold mb-2 d-flex align-items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M223.68,66.15,135.68,18h0a15.88,15.88,0,0,0-15.36,0l-88,48.17a16,16,0,0,0-8.32,14v95.64a16,16,0,0,0,8.32,14l88,48.17a15.88,15.88,0,0,0,15.36,0l88-48.17a16,16,0,0,0,8.32-14V80.18A16,16,0,0,0,223.68,66.15ZM128,32h0l80.34,44L128,120,47.66,76ZM40,90l80,43.78v85.79L40,175.82Zm96,129.57V133.82L216,90v85.78Z">
                                </path>
                            </svg>Volume
                        </h5>
                        <p class="fs-7 m-0 p-0">{{ $product['volume'] }}</p>
                    </div>
                    <div class="col-4 col-md-5 col-lg-3 border rounded p-3 text-white">
                        <h5 class="fs-6 fw-bold mb-2 d-flex align-items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M96,104a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H104A8,8,0,0,1,96,104Zm8,40h64a8,8,0,0,0,0-16H104a8,8,0,0,0,0,16Zm128,48a32,32,0,0,1-32,32H88a32,32,0,0,1-32-32V64a16,16,0,0,0-32,0c0,5.74,4.83,9.62,4.88,9.66h0A8,8,0,0,1,24,88a7.89,7.89,0,0,1-4.79-1.61h0C18.05,85.54,8,77.61,8,64A32,32,0,0,1,40,32H176a32,32,0,0,1,32,32V168h8a8,8,0,0,1,4.8,1.6C222,170.46,232,178.39,232,192ZM96.26,173.48A8.07,8.07,0,0,1,104,168h88V64a16,16,0,0,0-16-16H67.69A31.71,31.71,0,0,1,72,64V192a16,16,0,0,0,32,0c0-5.74-4.83-9.62-4.88-9.66A7.82,7.82,0,0,1,96.26,173.48ZM216,192a12.58,12.58,0,0,0-3.23-8h-94a26.92,26.92,0,0,1,1.21,8,31.82,31.82,0,0,1-4.29,16H200A16,16,0,0,0,216,192Z">
                                </path>
                            </svg>Variant
                        </h5>
                        <p class="fs-7 m-0 p-0">{{ implode(', ', $product['variants']) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
