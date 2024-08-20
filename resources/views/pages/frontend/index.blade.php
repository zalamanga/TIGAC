@php
    $videoUrl =
        'https://s3-figma-videos-production-sig.figma.com/video/1377240793861400146/TEAM/21ed/4f21/-0976-456b-83fc-01bd435a3264?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=oF6yT6m4lUEZ4USosBVA6MxjLMv5oBdNrrMBP6qgs429qadQag6QZ0~Wb0q9n3Uj5J8bkvft3~YaqlqaRTzpUxXAwUhM~Uj4rDIhmLDMsCk7t7YN3mMAVNqk1iM6nd6vA20cp4FqRYnRtgEFKgA3ugdOD1Iq~T9TXzZgmr8LiaRLwkZMbCkTKxTp7GnTJUk4Xi772LuStqnNoo9vcvgw~WefwezqclfIBit~7eWKl2Fn6Qu2N6EHnP7yeDnUoVsn~mx~ERuqKjrcK0mZEU~GitRMYAIJ~yyBbtACIfZ8JT0j2JsSHZozCMEK30k5EHmStbRyaOs-DA7uTe~6bv6knw__';
@endphp

@extends('layouts.frontend.main')
@section('content')
    {{-- section 1 start --}}
    {{-- <section class="mt-3 mb-3 container">
        <center>
            <h1 class="fw-semibold mb-3">Welcome to TIGAC World</h1>
        </center>

        <video class="img-fluid rounded-4" controls autoplay loop>
            <source src="{{ $videoUrl }}" type="video/mp4">
        </video>

    </section> --}}
    <section class="mt-3 mb-3 container">
        <center>
            <h1 class="fw-semibold mb-3">Welcome to TIGAC World</h1>
        </center>
        {{-- <video src="{{ $videoUrl }}" autoplay loop muted class="img-fluid rounded-4"></video> --}}

        <video class="img-fluid rounded-4 video-product" controls autoplay loop>
            <source src="{{ $videoUrl }}" type="video/mp4">
        </video>
    </section>

    {{-- section 1 end --}}

    {{-- section 2 start --}}
    <section class="bg-main h-screen d-flex align-items-center mb-3 position-relative overflow-hidden">
        <img src="{{ asset('images/new/Graphics 1.png') }}" alt="graphic" class="position-absolute img-fluid start-0"
            style="z-index: 1; bottom: -10%">
        <div class="position-relative container d-flex flex-column-reverse flex-lg-row justify-content-center align-content-center gap-lg-3 pb-5 pb-lg-0"
            style="z-index: 2">
            <div class="d-flex flex-column justify-content-center">
                <h1 class="text-white display-2 fw-semibold mb-3">Flavorful Vibes, Stylish Rides</h1>
                <p class="fs-6 text-white" style="max-width: 500px">Our stylish design redefines elegance, blending fashion
                    seamlessly with functionality to
                    enhance your vaping experience.</p>
                <div class="mt-4">
                    <button class="btn btn-lg btn-light d-flex align-items-center justify-content-between gap-2"
                        style="min-width: 13rem; height: 3.5rem;">
                        <span class="fs-6">GET STARTED</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 35 35"
                            fill="none">
                            <g clip-path="url(#clip0_1_30)">
                                <path
                                    d="M23.215 16.3871L15.616 8.78814L17.6192 6.78497L28.638 17.8038L17.6192 28.8226L15.616 26.8195L23.215 19.2205H5.97137V16.3871H23.215Z"
                                    fill="black" />
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
            <img src="{{ asset('images/new/3D Stick rev 1.png') }}" alt="3D stick rev" class="img-fluid">
        </div>
    </section>
    {{-- section 2 end --}}

    {{-- section 3 start --}}
    <section class="bg-white w-full container-fluid py-5 overflow-hidden">
        <div
            class="row flex-column flex-md-row align-items-center justify-content-between gap-3 gap-md-0 container-masterpiece">
            <div class="col col-md-5 col-lg-4 h-full d-flex flex-column justify-content-center"
                style="height: 80vh !important">
                <h1 class="display-4 fw-semibold" style="line-height: 1em;">Our Masterpiece</h1>
                <p class="text-black" style="max-width: 390px">This is our masterpiece, combining experience and quality.
                </p>
                <div class="mt-3">
                    <button
                        class="btn btn-lg btn-primary border-0 d-flex align-items-center justify-content-between gap-2 text-white"
                        style="min-width: 13rem; height: 3.5rem;">
                        <span class="fs-6">MORE INFORMATION</span>
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
            <div class="col col-md-7 col-lg-8 position-relative" style="z-index: 2; ">
                <div id="masterpiece-container"
                    class="row align-items-center justify-content-start gap-3 flex-nowrap overflow-hidden px-2 px-md-0">
                    @foreach ($masterpieceBanners as $masterpieceBanner)
                        <div
                            class="col-3 p-0 position-relative rounded-4 overflow-hidden shadow card-masterpiece-item {{ $loop->index === count($masterpieceBanners) - 1 ? 'me-3' : '' }}">
                            <img src="{{ asset('storage/' . $masterpieceBanner->thumbnail) }}"
                                alt="{{ $masterpieceBanner->name }}" class="img-fluid w-full h-full"
                                style="object-fit: cover">
                            <div class="position-absolute bottom-0 px-3 pb-5">
                                <h3 class="fw-semibold fs-5 text-white">{{ $masterpieceBanner->name }}</h3>
                                <button
                                    class="btn btn-sm text-white p-0 fs-7 d-flex align-items-center justify-content-center gap-2">Learn
                                    more <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                        viewBox="0 0 17 17" fill="none">
                                        <g clip-path="url(#clip0_200_255)">
                                            <path
                                                d="M11.4552 7.79167L7.65568 3.99217L8.65726 2.99058L14.1667 8.5L8.65726 14.0094L7.65568 13.0078L11.4552 9.20833H2.83334V7.79167H11.4552Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_200_255">
                                                <rect width="17" height="17" rx="8.5" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg></button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button id="btn-next-masterpiece"
                    class="position-absolute top-50 btn btn-black rounded-circle bg-black text-white d-flex align-items-center justify-content-center"
                    style="width: 65px; height: 65px; right: 14%; filter: opacity(0.85);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 17 17"
                        fill="none">
                        <g clip-path="url(#clip0_200_255)">
                            <path
                                d="M11.4552 7.79167L7.65568 3.99217L8.65726 2.99058L14.1667 8.5L8.65726 14.0094L7.65568 13.0078L11.4552 9.20833H2.83334V7.79167H11.4552Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_200_255">
                                <rect width="17" height="17" rx="8.5" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
                <button id="btn-prev-masterpiece"
                    class="position-absolute d-none top-50 btn btn-black rounded-circle bg-black text-white d-flex align-items-center justify-content-center "
                    style="width: 65px; height: 65px; right: 14%; filter: opacity(0.85); rotate: 180deg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 17 17"
                        fill="none">
                        <g clip-path="url(#clip0_200_255)">
                            <path
                                d="M11.4552 7.79167L7.65568 3.99217L8.65726 2.99058L14.1667 8.5L8.65726 14.0094L7.65568 13.0078L11.4552 9.20833H2.83334V7.79167H11.4552Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_200_255">
                                <rect width="17" height="17" rx="8.5" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </div>
        </div>
    </section>
    {{-- Section 3 end --}}

    {{-- Section 4 start --}}
    <section class="bg-main pb-5 pb-md-0 position-relative overflow-hidden" style="max-height: 100vh">
        <div class="position-absolute bottom-0 end-0" style="z-index: 1">
            <svg xmlns="http://www.w3.org/2000/svg" width="292" height="453" viewBox="0 0 292 453" fill="none">
                <path
                    d="M405.67 45.7902L278.34 205.254C278.1 205.559 277.97 205.93 277.97 206.311C277.97 207.367 278.95 208.186 280.05 208.043L480.91 182.726C482.01 182.584 482.99 183.402 482.99 184.459V268.364C482.99 269.411 482.03 270.22 480.94 270.096L280.03 247.302C278.94 247.178 277.98 247.987 277.98 249.034C277.98 249.434 278.12 249.824 278.38 250.129L406.97 403.111C407.67 403.949 407.43 405.186 406.45 405.719L324.56 450.251C323.61 450.765 322.4 450.384 321.96 449.423L241.79 271.381C241.5 270.743 240.84 270.325 240.1 270.325H239.77C239.05 270.325 238.4 270.724 238.1 271.343L151.22 450.708C150.76 451.669 149.51 452.012 148.57 451.45L74.66 407.023C73.74 406.471 73.53 405.291 74.19 404.472L201.54 248.825C201.79 248.52 201.93 248.14 201.93 247.749C201.93 246.693 200.96 245.884 199.86 246.017L3.07 270.077C1.97 270.21 1 269.401 1 268.345V184.449C1 183.393 1.97 182.584 3.07 182.717L198.51 206.758C199.61 206.891 200.58 206.082 200.58 205.026C200.58 204.636 200.45 204.264 200.2 203.96L74.24 48.3694C73.56 47.5319 73.82 46.3137 74.78 45.7902L154.02 2.52413C154.96 2.01019 156.17 2.38137 156.61 3.32359L239.47 180.128C239.76 180.756 240.42 181.166 241.15 181.166H241.47C242.2 181.166 242.86 180.756 243.15 180.119L324.67 2.04826C325.1 1.09652 326.31 0.715829 327.26 1.22977L405.12 43.2205C406.09 43.744 406.35 44.9527 405.68 45.7997L405.67 45.7902Z"
                    stroke="#334A8F" stroke-width="0.87" stroke-miterlimit="10" />
            </svg>
        </div>
        <div class="position-relative row w-full align-items-center justify-content-between gap-4 gap-md-0"
            style="z-index: 2">
            <div class="col-12 col-md-6">
                <img src="{{ asset('images/new/girl 1.png') }}" alt="girl hold vape" class="w-full h-full">
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-lg-center h-full ps-lg-5 px-4 px-md-0">
                <h1 class="display-3 fw-semibold text-white">Everyone Matters</h1>
                <p class="text-white fs-4" style="max-width: 600px">Finding your inner value, because everyone is
                    precious.</p>
                <div class="mt-4">
                    <a href="{{ Route('pages.frontend.consumer.program') }}"
                        class="btn btn-lg btn-light d-inline-flex align-items-center justify-content-between gap-2"
                        style="min-width: 13rem; height: 3.5rem;">
                        <span class="fs-6">GAIN YOUR BENEFIT</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 35 35"
                            fill="none">
                            <g clip-path="url(#clip0_1_30)">
                                <path
                                    d="M23.215 16.3871L15.616 8.78814L17.6192 6.78497L28.638 17.8038L17.6192 28.8226L15.616 26.8195L23.215 19.2205H5.97137V16.3871H23.215Z"
                                    fill="black" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1_30">
                                    <rect width="34" height="34" fill="white"
                                        transform="translate(0.304688 0.803833)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    {{-- Section 4 end --}}

    {{-- Section 5 start --}}
    <section class="bg-white d-flex align-items-center justify-content-center h-full container py-5"
        style="min-height: 80vh">
        <div class="text-center text-black">
            <h1 class="fw-semibold">WHO WE ARE</h1>
            <p style="max-width: 1166px" class="lh-lg fs-4 mb-5">TIGAC is a well-known E-Juice brand within the vaping
                community, recognized as a leader in the E-Juice
                industry.
                Through a strong commitment to excellence and innovation, TIGAC has become one of the leading national
                distributors of premium E-Juices. Our dedication to producing high-quality E-Juices that consistently
                deliver an exceptional vaping experience has solidified our place in the hearts of consumers.
            </p>
            <button class="btn btn-lg py-3 border-0 btn-primary px-5" type="button">DISCOVER ABOUT US</button>
        </div>
    </section>
    {{-- Section 5 end --}}

    {{-- Section 6 start --}}
    <section class="py-5 bg-danger position-relative overflow-hidden" style="height: 48vh">
        <img src="{{ asset('images/new/torus 1.png') }}" alt="torus 1" class="position-absolute img-fluid start-0"
            style="z-index: 1; bottom: -20%">
        <img src="{{ asset('images/new/torus 2.png') }}" alt="torus 2" class="position-absolute img-fluid end-0"
            style="z-index: 1; bottom: -20%">
        <div class="d-flex align-items-center justify-content-center flex-column h-full text-white position-relative"
            style="z-index: 2">
            <h4 class="mb-3">START A PROJECT</h4>
            <h1 class="mb-5 display-4 fw-semibold">Let's work together</h1>
            <button class="btn mx-auto btn-lg btn-light d-flex align-items-center justify-content-between gap-2 px-4"
                style="min-width: 13rem; height: 3.5rem;">
                <span class="fs-6">GET IN TOUCH</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 35 35"
                    fill="none">
                    <g clip-path="url(#clip0_1_30)">
                        <path
                            d="M23.215 16.3871L15.616 8.78814L17.6192 6.78497L28.638 17.8038L17.6192 28.8226L15.616 26.8195L23.215 19.2205H5.97137V16.3871H23.215Z"
                            fill="black" />
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
    </section>
    {{-- Section 6 end --}}

    {{-- Section 7 start --}}
    <section class="py-5 container d-flex align-items-center justify-content-center" style="min-height: 40vh">
        <div class="row w-full align-items-center justify-content-center justify-content-lg-between">
            <img src="{{ asset('images/new/logo-tcall.png') }}" alt="logo-tcall" class="col-2 img-fluid"
                style="width: 370px">
            <img src="{{ asset('images/new/logo-jaxel.png') }}" alt="logo-jaxel" class="col-2 img-fluid"
                style="aspect-ratio: 1/1; object-fit:contain; width: 100px">
            <img src="{{ asset('images/new/logo-pocket rocket.png') }}" alt="logo-pocket rocket" class="col-2 img-fluid"
                style="aspect-ratio: 1/1; object-fit:contain; width: 100px">
            <img src="{{ asset('images/new/logo-hompimpa.png') }}" alt="logo-hompimpa" class="col-2 img-fluid"
                style="aspect-ratio: 1/1; object-fit:contain; width: 100px">
            <img src="{{ asset('images/new/logo-allianz.png') }}" alt="logo-allianz" class="col-2 img-fluid"
                style="aspect-ratio: 1/1; object-fit:contain; width: 100px">
            <img src="{{ asset('images/new/logo-treev.png') }}" alt="logo-treev" class="col-2 img-fluid"
                style="aspect-ratio: 1/1; object-fit:contain; width: 100px">
        </div>
    </section>
    {{-- Section 7 end --}}

    {{-- Script --}}
    <script>
        const masterpieceContainer = document.getElementById('masterpiece-container');
        const btnNextMasterpiece = document.getElementById('btn-next-masterpiece');
        const btnPrevMasterpiece = document.getElementById('btn-prev-masterpiece');

        btnNextMasterpiece.addEventListener('click', function() {
            const maxwidth = masterpieceContainer.scrollWidth - masterpieceContainer.clientWidth;
            const currentScrollLeft = 300 + Math.ceil(masterpieceContainer.scrollLeft);

            masterpieceContainer.scrollBy({
                left: 300,
                behavior: 'smooth'
            });

            if (currentScrollLeft > maxwidth) {
                btnNextMasterpiece.classList.add('d-none');
                btnPrevMasterpiece.classList.remove('d-none');
            }
        })

        btnPrevMasterpiece.addEventListener('click', function() {
            masterpieceContainer.scrollBy({
                left: -300,
                behavior: 'smooth'
            });

            if (masterpieceContainer.scrollLeft <= 300) {
                btnPrevMasterpiece.classList.add('d-none');
                btnNextMasterpiece.classList.remove('d-none');
            }
        })
    </script>
@endsection
