@extends('layouts.frontend.main')
@section('content')
    <section class="bg-gradient-main h-screen w-full">
        <div class="position-relative mb-3">
            <img src="{{ asset('images/new/logo-extrac.png') }}" alt="logo-extrac"
                class="img-fluid img-logo-program position-absolute top-0 start-50 translate-middle-x mt-3 mt-md-4">
            <img src="{{ asset('images/new/banner-program.png') }}" alt="banner-program"
                class="img-fluid w-full position-relative start-50 translate-middle-x img-banner-program mb-5">
        </div>
        <div class="text-center container-fluid">
            <h1 class="fw-semibold tagline-xxl mx-auto mb-3" style="max-width: 900px">Extra <span class="fw-semibold text-ogg  fst-italic">Cuan</span> Extra
                <span class="text-ogg fst-italic fw-semibold">Cincai</span> & Extra<span
                    class="text-ogg fst-italic fw-semibold">Cengli</span>
            </h1>
            <p class="text-black fs-4 lh-sm mb-4 mx-auto mb-md-5" style="max-width: 1200px">Maximize your profit with TIGAC - Enjoy extra earnings, unbeatable deals,
                and complete transparency. Partner
                with us now and seet the difference!
            </p>
            <form action="" class="pb-5">
                <h3 class="mb-3 fw-semibold fs-3 text-black">Contact Us for More Detail</h3>
                <div class="row justify-content-center align-items-center flex-column gap-3 mb-3">
                    <div class="col-10 col-md-8 col-lg-7 col-xl-5 ">
                        <input type="text" class="form-control rounded-3 fs-7 bg-white" style="height: 57px; border-radius: 10px;" placeholder="PIC NAME">
                    </div>
                    <div class="col-10 col-md-8 col-lg-7 col-xl-5 ">
                        <input type="text" class="form-control rounded-3 fs-7 bg-white" style="height: 57px; border-radius: 10px;" placeholder="STORE NAME">
                    </div>
                    <div class="col-10 col-md-8 col-lg-7 col-xl-5 ">
                        <input type="text" inputmode="numeric" class="form-control rounded-3 fs-7 bg-white" style="height: 57px; border-radius: 10px;" placeholder="PHONE NUMBER">
                    </div>
                    <div class="col-10 col-md-8 col-lg-7 col-xl-5 ">
                        <input type="email" class="form-control rounded-3 fs-7 bg-white" style="height: 57px; border-radius: 10px;" placeholder="ENTER EMAIL">
                    </div>
                    <div class="col-10 col-md-8 col-lg-7 col-xl-5 ">
                        <input type="text" class="form-control rounded-3 fs-7 bg-white" style="height: 57px; border-radius: 10px;" placeholder="ADDRESS">
                    </div>
                </div>
                <small class="text-danger text-center fw-semibold d-block mb-3">PROGRAM INI HANYA BERLAKU UNTUK TOKO VAPE DAN DISTRIBUTOR</small>
                <button type="submit"
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
                                    <rect width="34" height="34" fill="white"
                                        transform="translate(0.304688 0.803833)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
            </form>
        </div>
    </section>
@endsection
