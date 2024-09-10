@php

@endphp

@extends('layouts.frontend.main')
@section('content')
    <section>
        <div class="bg-main mb-5 d-flex align-items-center justify-content-center position-relative overflow-hidden"
            style="height: 342px"
            data-aos="fade-down">
            <img src="{{ asset('images/new/Graphics 1.png') }}" alt="graphic 1" class="position-absolute start-0">
            <h1 class="fw-normal tagline-xxl text-white text-center position-relative px-2 px-md-0"
                style="max-width: 1200px; z-index: 2">You Can <span class="text-ogg fw-normal fst-italic">Discover</span> Our
                Masterpiece Through Our Partners.</h1>
        </div>

        <div class="container pt-md-2 pt-lg-3 pt-xl-5 mb-5 pb-5">
            <div class="w-full d-flex justify-content-center gap-4 gap-lg-5 my-5 flex-wrap">
                @foreach ($partnerships as $partnership)
                    <div
                        class="card-partnership-item d-flex align-items-center justify-content-center overflow-hidden p-2 p-md-4"
                        data-aos="fade-left">
                        {{-- <img src="{{ file_exists(public_path('storage/' . $partnership->logo)) ? asset('storage/' . $partnership->logo) : asset('images/new/partnership') . '/' . $partnership->name . '.png' }}"
                            alt="{{ $partnership->name }}" class="img-fluid w-full h-full object-fit-contain"> --}}
                        <img src="{{ asset('storage/' . $partnership->logo) }}"
                            alt="{{ $partnership->name }}" class="img-fluid w-full h-full object-fit-contain">
                    </div>
                @endforeach
            </div>
            {{-- <div class="mx-auto mb-5 pb-2 pb-lg-5" style="max-width: 300px">
                <ul class="list-style-none d-flex gap-3 text-secondary justify-content-center fs-3">
                    <li class="fw-bold text-black">1</li>
                    <li class="fw-semibold">2</li>
                    <li class="fw-semibold">3</li>
                    <li class="fw-semibold">4</li>
                    <li class="fw-semibold">5</li>
                    <li class="fw-semibold">...</li>
                </ul>
            </div> --}}
            <h2 class="fw-semibold text-secondary text-center mx-auto mb-5" style="max-width: 1200px"
            data-aos="fade-right">
                Tired of stagnant profits and unclear deals? Boost your earnings with TIGAC! Get extra earnings, amazing
                deals, and total transparency. Join with TIGAC today and watch your business thrive.
            </h2>
            <button type="button"
                class="btn btn-lg mx-auto btn-danger border-0 d-flex align-items-center justify-content-between gap-2 text-white mb-lg-5"
                style="min-width: 13rem; height: 3.5rem;"
                data-aos="fade-down">
                <span class="fs-6">JOIN US PARTNERS</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 35 35"
                    fill="currentColor">
                    <g clip-path="url(#clip0_1_30)">
                        <path
                            d="M23.215 16.3871L15.616 8.78814L17.6192 6.78497L28.638 17.8038L17.6192 28.8226L15.616 26.8195L23.215 19.2205H5.97137V16.3871H23.215Z"
                            fill="white" />
                    </g>
                    <defs>
                        <clipPath id="clip0_1_30">
                            <rect width="34" height="34" fill="white" transform="translate(0.304688 0.803833)" />
                        </clipPath>
                    </defs>
                </svg>
            </button>
        </div>
    </section>
@endsection
