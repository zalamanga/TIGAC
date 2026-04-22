@php
    $nonCollaborationProductChunks = $nonCollaborationProducts->chunk(4);
    $collaborationProductChunks = $collaborationProducts->chunk(4);
@endphp

@extends('layouts.frontend.main')
@section('title','Product Page')
@section('content')

    {{-- Search & filter --}}
    <section class="container pt-4">
        <form method="GET" action="{{ route('pages.frontend.product') }}" class="row g-2 mb-4">
            <div class="col-12 col-md-6">
                <input type="text" name="q" value="{{ $search }}" class="form-control"
                       placeholder="Cari produk...">
            </div>
            <div class="col-8 col-md-4">
                <select name="category" class="form-select">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                                @selected((string) $selectedCategoryId === (string) $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-4 col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-primary border-0 text-white flex-fill">Cari</button>
                @if ($filteredProducts)
                    <a href="{{ route('pages.frontend.product') }}" class="btn btn-outline-secondary">Reset</a>
                @endif
            </div>
        </form>

        @if ($filteredProducts)
            <h2 class="fw-semibold mb-3">Hasil Pencarian
                <small class="text-secondary fs-6">({{ $filteredProducts->total() }} produk)</small>
            </h2>
            @if ($filteredProducts->isEmpty())
                <div class="text-center py-5 border rounded-4 text-secondary">
                    Tidak ada produk yang cocok.
                </div>
            @else
                <div class="row g-3 mb-4">
                    @foreach ($filteredProducts as $fp)
                        <div class="col-6 col-md-4 col-lg-3">
                            <a href="{{ route('pages.frontend.product.detail', $fp->slug) }}"
                               class="d-block border rounded-4 overflow-hidden shadow-sm text-decoration-none position-relative">
                                @if ($fp->images->first())
                                    <img src="{{ asset('storage/' . $fp->images->first()->image_path) }}"
                                         alt="{{ $fp->name }}" class="img-fluid w-100" style="aspect-ratio: 1; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/Picture_Not_Yet_Available.png') }}"
                                         alt="{{ $fp->name }}" class="img-fluid w-100" style="aspect-ratio: 1; object-fit: cover;">
                                @endif
                                @if (!is_null($fp->stock) && $fp->stock <= 0)
                                    <span class="position-absolute top-0 end-0 m-2 badge bg-danger">Habis</span>
                                @endif
                                <div class="p-3 bg-body-secondary text-secondary">
                                    <h3 class="fw-semibold fs-6 m-0 text-truncate text-dark">{{ $fp->name }}</h3>
                                    <span class="d-block small text-truncate">{{ $fp->productCategory->name ?? '-' }}</span>
                                    <span class="d-block fw-semibold text-dark mt-1">
                                        Rp{{ number_format($fp->price, 0, '.', '.') }}
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mb-4">{{ $filteredProducts->links() }}</div>
            @endif
        @endif
    </section>

    {{-- Section 1 start --}}
    <section>
        <div id="carouselBannerProduct" class="carousel slide mb-4" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-indicators">
                @foreach($productPageHeroBanners as $productPageHeroBanner)
                <button type="button" data-bs-target="#carouselBannerProduct" data-bs-slide-to="{{ $loop->index }}"
                    class="{{ $loop->index == 0 ? 'active' : '' }}" aria-label="Slide {{ $loop->index + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($productPageHeroBanners as $productPageHeroBanner)
                    <div class="carousel-item carousel-item-banner {{ $loop->index == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $productPageHeroBanner->media_path) }}" class="d-block w-100"
                            alt="{{ $productPageHeroBanner->tagline }}">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBannerProduct"
                data-bs-slide="prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="64" viewBox="0 0 44 64" fill="none">
                    <!-- SVG content -->
                </svg> <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselBannerProduct"
                data-bs-slide="next">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="64" viewBox="0 0 44 64" fill="none">
                    <!-- SVG content -->
                </svg> <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    {{-- Section 1 end --}}

    {{-- Section 2 start --}}
    <section>
        <div class="container pb-3 pb-md-4 py-lg-5">
            <h1 class="fw-semibold text-center mb-3 mb-lg-5 tagline-lg" data-aos="fade-down">This is our
                <span class="text-capitalize text-ogg fw-semibold fst-italic lh-sm">masterpiece</span>, combining experience & quality.
            </h1>
            <div class="mb-3">
                <img src="{{ asset('images/logo-3.png') }}" alt="Logo" class="img-fluid mb-4 img-logo" />

                <div id="carouselProduct" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000" data-aos="fade-left">
                    <div class="carousel-inner">
                        @foreach ($nonCollaborationProductChunks as $index => $nonCollaborationProductChunk)
                            <div class="carousel-item carousel-item-product {{ $index == 0 ? 'active' : '' }}">
                                <div class="d-flex align-items-center justify-content-around flex-nowrap gap-2 gap-md-3">
                                    @foreach ($nonCollaborationProductChunk as $nonCollaborationProduct)
                                        <a href="{{ Route('pages.frontend.product.detail', $nonCollaborationProduct->slug) }}"
                                            class="border rounded-4 overflow-hidden card-product-item position-relative d-flex align-items-center justify-content-center shadow-sm"
                                            data-aos="flip-left">
                                            @if($nonCollaborationProduct->images->first() == null)
                                                <img src="{{ asset('images/Picture_Not_Yet_Available.png') }}"
                                                alt="{{ $nonCollaborationProduct->name }}"
                                                class="img-fluid transition-all">
                                            @else
                                                <img src="{{ asset('storage/' . $nonCollaborationProduct->images->first()->image_path) }}"
                                                alt="{{ $nonCollaborationProduct->name }}"
                                                class="img-fluid transition-all">
                                            @endif
                                            <div class="bg-body-secondary text-secondary position-absolute bottom-0 w-full p-3">
                                                <h3 class="product-title fw-semibold m-0 text-truncate">
                                                    {{ $nonCollaborationProduct->name }}
                                                </h3>
                                                <span class="d-block fs-7 text-truncate">{{ $nonCollaborationProduct->productCategory->name }}
                                                    {{ $nonCollaborationProduct->variants->first() ? ' - ' . $nonCollaborationProduct->variants->first()->name : '' }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev opacity-100 justify-content-start btn-arrow-product-prev" type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                        <span class="bg-black d-flex align-items-center justify-content-center text-white btn-arrow-product rounded-circle p-lg-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <!-- SVG content -->
                            </svg>
                        </span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next opacity-100 justify-content-end btn-arrow-product-next" type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                        <span class="bg-black d-flex align-items-center justify-content-center text-white btn-arrow-product rounded-circle p-lg-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <!-- SVG content -->
                            </svg>
                        </span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- Section 2 end --}}

    {{-- Section 3 start --}}
    <section>
        <div class="container pb-2 pb-md-3 py-lg-5 mb-5" data-aos="fade-down">
            <div class="mb-3">
                <img src="{{ asset('images/new/logo-tcall.png') }}" alt="Logo-tcall" class="img-fluid mb-4"
                    width="300" />

                <div id="carouselProductCollaboration" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($collaborationProductChunks as $index => $collaborationProductChunk)
                            <div class="carousel-item carousel-item-product {{ $index == 0 ? 'active' : '' }}">
                                <div class="d-flex align-items-center justify-content-around flex-nowrap gap-2 gap-md-3">
                                    @foreach ($collaborationProductChunk as $collaborationProduct)
                                        <a href="{{ Route('pages.frontend.product.detail', $collaborationProduct->slug) }}"
                                            class="border rounded-4 overflow-hidden card-product-item position-relative d-flex align-items-center justify-content-center shadow-sm"
                                            data-aos="flip-right">
                                            @if($collaborationProduct->images->first() == null)
                                                <img src="{{ asset('images/Picture_Not_Yet_Available.png') }}"
                                                alt="{{ $collaborationProduct->name }}" class="img-fluid transition-all">
                                            @else
                                                <img src="{{ asset('storage/' . $collaborationProduct->images->first()->image_path) }}"
                                                alt="{{ $collaborationProduct->name }}" class="img-fluid transition-all">
                                            @endif
                                            <div
                                                class="bg-body-secondary text-secondary position-absolute bottom-0 w-full p-3">
                                                <h3 class="product-title fw-semibold m-0 text-truncate">
                                                    {{ $collaborationProduct->name }}</h3>
                                                <span
                                                    class="d-block fs-7 text-truncate">{{ $collaborationProduct->productCategory->name }}
                                                    {{ $collaborationProduct->variants->first() ? ' - ' . $collaborationProduct->variants->first()->name : '' }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev opacity-100 justify-content-start btn-arrow-product-prev"
                        type="button" data-bs-target="#carouselProductCollaboration" data-bs-slide="prev">
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
                    <button class="carousel-control-next opacity-100 justify-content-end btn-arrow-product-next"
                        type="button" data-bs-target="#carouselProductCollaboration" data-bs-slide="next">
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
        </div>
    </section>
    {{-- Section 3 end --}}
@endsection
