@extends('layouts.frontend.main')
@section('title','FaQ Page')
@section('content')
    <section class="container my-3 my-xl-5 pb-5">
        <div class="mb-3 mb-md-5 mb-lg-4 px-xl-5" style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="--bs-breadcrumb-divider-color: #222d68 !important">
                <li class="breadcrumb-item fw-bold display-4">F.A.Q</li>
                <li class="breadcrumb-item display-4"> Frequently Asked Questions</li>
            </ol>
        </div>
        <div class="accordion accordion-flush px-xl-5 mb-5 pb-xl-3" id="accordionPanelsStayOpenExample">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button px-0 fw-semibold fs-3 text-uppercase bg-white text-black"
                            type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-{{ $loop->index }}"
                            aria-expanded="true" aria-controls="panelsStayOpen-{{ $loop->index }}">
                            {{ $faq->question }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-{{ $loop->index }}" class="accordion-collapse collapse show">
                        <div
                            class="accordion-body pt-0 px-0 text-black fs-5 {{ !$loop->last ? 'border-bottom border-2' : '' }}">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h3 class="text-center fs-3 text-black fw-semibold mb-5">Jika kamu masih ada pertanyaan lain silakan menghubungi
            kami </h3>
        <div class="text-center">
            <a type="button"
                class="btn btn-lg btn-danger text-white mx-auto d-inline-flex align-items-center justify-content-between py-3 gap-3"
                href="https://wa.me/6281188882305" target="_blank">CONTACT US
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
            </a>
        </div>

    </section>
@endsection
