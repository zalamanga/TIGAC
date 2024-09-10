@extends('layouts.frontend.main')
@section('content')
    <section class="container mt-4 mb-5 pb-lg-4">
        <div class="row align-items-start justify-content-center">
            <img src="{{ asset('images/new/about tigac.png') }}" alt="about tigac"
                class="col-12 col-md-5 col-lg-6 img-fluid rounded-5 position-relative img-about object-fit-cover">
            <div class="mt-4 mt-lg-5 col-12 col-md-7 col-lg-6">
                <div class="d-flex align-items-center gap-3 w-full mb-3 mb-lg-5" data-aos="fade-right">
                    <h1 class="fw-bold m-0 about-title">What <span class="text-ogg fw-bold fst-italic">is</span></h1>
                    <img src="{{ asset('images/logo-3.png') }}" alt="logo tigac"
                        class="img-fluid object-fit-contain img-logo-about">
                </div>
                <div class="text-black mb-lg-3 mb-xl-5 pb-3" data-aos="fade-left">
                    <p class="mb-3 mb-lg-4 pb-3 lh-lg fs-6">
                        TIGAC merupakan sebuah brand E-Liquid yang sudah dikenal dalam komunitas vapers sebagai pemimpin
                        brand E-Liquid di Indonesia. TIGAC telah membawa standar keunggulan dalam distribusi E-Juice.
                    </p>
                    <p class="mb-3 mb-lg-4 pb-3 lh-lg fs-6">
                        Melalui komitmen yang kuat terhadap keunggulan dan inovasi, TIGAC telah menjadi salah satu brand
                        E-Juice premium terkemuka di Indonesia. Dedikasi TIGAC untuk meberikan E-Juice berkualitas tinggi
                        dan pengalaman vaping yang luar biasa secara konsisten telah mengukuhkan posisi TIGAC di hati para
                        konsumen.
                    </p>
                    <p class="mb-3 mb-lg-4 pb-3 lh-lg fs-6">
                        Fokus TIGAC pada kualitas, keamanan, dan kepuasan kepada pelanggan telah membangun reputasi yang
                        kuat, sebagai brand E-Juice premium TIGAC telah di percaya, oleh komunitas vaping. TIGAC berkomitmen
                        untuk melebihi harapan pelanggan setianya dan secara konsisten memberikan pengalaman yang luar biasa
                        untuk pelanggan setianya. Sebagai pemimpin di industri ini, TIGAC mematuhi pedoman yang ketat untuk
                        memastikan kualitas dan keselamatan untuk setiap produk TIGAC.
                    </p>
                    <p class="mb-3 mb-lg-4 pb-3 lh-lg fs-6">
                        Setiap varian yang telah ada di pasar, E-Juice TIGAC telah melewati serangkaian pengujian dan
                        pengendalian kualitas yang ketat sebelum dijual ke pasaran. Komitmen TIGAC terhadap kualitas dan
                        keunggulan pada setiap produknya, memastikan bahwa setiap botol E-Juice TIGAC dapat memberikan
                        pengalaman vaping yang konsisten dan luar biasa bagi para konsumen TIGAC, sehingga mereka dapat
                        menikmati dengan percaya diri setiap kali mereka menikmatinya.
                    </p>
                </div>
                <button type="button"
                    class="btn btn-lg btn-danger border-0 d-flex align-items-center justify-content-between gap-2 text-white"
                    style="min-width: 13rem; height: 3.5rem;"
                    data-aos="fade-down">
                    <span class="fs-6">CONTACT US</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 35 35"
                        fill="currentColor">
                        <g clip-path="url(#clip0_1_30)">
                            <path
                                d="M23.215 16.3871L15.616 8.78814L17.6192 6.78497L28.638 17.8038L17.6192 28.8226L15.616 26.8195L23.215 19.2205H5.97137V16.3871H23.215Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_30">
                                <rect width="34" height="34" fill="white"
                                    transform="translate(0.304688 0.803833)" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>
        </div>
    </section>
@endsection
