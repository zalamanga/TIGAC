@extends('layouts.frontend.main')
@section('title','Vaporistar Page')
@section('content')
    <section>
        <div class="bg-vaporistar d-flex align-items-center justify-content-center mb-4">
            <img src="{{ asset('images/new/vaporistar.png') }}" alt="vaporistar" class="img-fluid">
        </div>
        <div class="container pb-4 mb-4 mb-lg-5">
            <div class="mb-5">
                <h1 class="fw-semibold tagline-xxl mb-3 text-center">Are you the <span
                        class="text-ogg fst-italic fw-semibold">One</span> we
                    are looking for?
                </h1>
                <p class="text-center fw-medium mx-auto fs-4 lh-lg text-black" style="max-width: 1200px">
                    Vaporistar adalah program rewards yang diberikan kepada vaporista toko vape
                    yang telah mempromosikan produk TIGAC & TCALL*
                </p>
            </div>
            <div class="mb-4">
                <h2 class="text-center fw-semibold tagline-xxl mb-3 border-bottom border-3 pb-2"
                    style="border-color: #B5B5B5 !important;">Must to Know</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item pb-3 mb-3 text-capitalize text-black fw-medium fs-4">Akan Ada 200 Orang Yang
                        Terpilih.</li>
                    <li class="list-group-item pb-3 mb-3 text-capitalize text-black fw-medium fs-4">Fee akan diberikan
                        ketika vaporista sudah mengikuti semua brief dan rules yang ada.</li>
                    <li class="list-group-item pb-3 mb-3 text-capitalize text-black fw-medium fs-4">Wajib posting dengan
                        total 20 konten dalam 1 bulan (5 Konten dalam 1 minggu).</li>
                    <li class="list-group-item pb-3 mb-3 text-capitalize text-black fw-medium fs-4">Rata-rata minimal
                        300-1000 views, dan 50 likes selama satu bulan terakhir dan memiliki followers aktif.</li>
                </ul>
            </div>
            <h3 class="text-center fs-2 fw-semibold text-black mx-auto mb-5 pb-2" style="max-width: 850px">Join the Vaporistar
                program now, elevate your value to the next level, and become a star!</h3>
            <button type="button"
                class="btn btn-lg mx-auto btn-danger border-0 d-flex align-items-center justify-content-between gap-2 text-white"
                style="min-width: 13rem; height: 3.5rem;">
                <span class="fs-6">JOIN US TODAY</span>
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
