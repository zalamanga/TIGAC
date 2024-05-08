@extends('layouts.main')
@section('content')
    <div class="container pt-3 pb-5 py-md-5">
        <div class="row flex-column-reverse flex-lg-row gap-3 gap-lg-0">
            <div class="col-12 col-lg-6 text-white">
                <h2 class="display-2 fw-bolder m-0">CONTACT US</h2>
                <div style="width: 220px; height: 7px" class="bg-primary rounded-pill mb-4"></div>
                <p class="text-start mb-3 fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptate similique, minima deleniti cupiditate facilis nobis natus? Libero perferendis explicabo
                    voluptates cumque aut ipsum ea cum nobis </p>
                <p class="text-start mb-5 fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Voluptate similique, minima deleniti cupiditate facilis nobis natus? Libero perferendis explicabo
                    voluptates cumque aut ipsum ea cum nobis iure voluptas neque sint, tempore quos doloribus molestias
                    voluptate, inventore deleniti! Tempore dolores molestiae cumque quasi sint praesentium ipsum
                    voluptates sapiente aliquid? Earum, repellat.</p>
                <div class="row align-items-start justify-content-center flex-columns gap-4">
                    <div class="col-12 d-flex gap-4 align-items-start">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center size-square">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                viewBox="0 0 256 256">
                                <path
                                    d="M128,24a104,104,0,0,0,0,208c21.51,0,44.1-6.48,60.43-17.33a8,8,0,0,0-8.86-13.33C166,210.38,146.21,216,128,216a88,88,0,1,1,88-88c0,26.45-10.88,32-20,32s-20-5.55-20-32V88a8,8,0,0,0-16,0v4.26a48,48,0,1,0,5.93,65.1c6,12,16.35,18.64,30.07,18.64,22.54,0,36-17.94,36-48A104.11,104.11,0,0,0,128,24Zm0,136a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="m-0 fw-bold fs-4">Tigac@gmail.com</h3>
                    </div>
                    <div class="col-12 d-flex gap-4 align-items-start">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center size-square">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256"><path d="M222.37,158.46l-47.11-21.11-.13-.06a16,16,0,0,0-15.17,1.4,8.12,8.12,0,0,0-.75.56L134.87,160c-15.42-7.49-31.34-23.29-38.83-38.51l20.78-24.71c.2-.25.39-.5.57-.77a16,16,0,0,0,1.32-15.06l0-.12L97.54,33.64a16,16,0,0,0-16.62-9.52A56.26,56.26,0,0,0,32,80c0,79.4,64.6,144,144,144a56.26,56.26,0,0,0,55.88-48.92A16,16,0,0,0,222.37,158.46ZM176,208A128.14,128.14,0,0,1,48,80,40.2,40.2,0,0,1,82.87,40a.61.61,0,0,0,0,.12l21,47L83.2,111.86a6.13,6.13,0,0,0-.57.77,16,16,0,0,0-1,15.7c9.06,18.53,27.73,37.06,46.46,46.11a16,16,0,0,0,15.75-1.14,8.44,8.44,0,0,0,.74-.56L168.89,152l47,21.05h0s.08,0,.11,0A40.21,40.21,0,0,1,176,208Z"></path></svg>
                        </div>
                        <h3 class="m-0 fw-bold fs-4">+62 123 456 789</h3>
                    </div>
                    <div class="col-12 d-flex gap-4 align-items-start">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center size-square">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 256 256"><path d="M128,64a40,40,0,1,0,40,40A40,40,0,0,0,128,64Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,128Zm0-112a88.1,88.1,0,0,0-88,88c0,31.4,14.51,64.68,42,96.25a254.19,254.19,0,0,0,41.45,38.3,8,8,0,0,0,9.18,0A254.19,254.19,0,0,0,174,200.25c27.45-31.57,42-64.85,42-96.25A88.1,88.1,0,0,0,128,16Zm0,206c-16.53-13-72-60.75-72-118a72,72,0,0,1,144,0C200,161.23,144.53,209,128,222Z"></path></svg>
                        </div>
                        <h3 class="m-0 fw-bold fs-4">Jalan kenangan bersama dia yang sulit 
                            <br>terlupakan, No.12 Kav 12-22, Jakarta Barat. (0821)
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <img src="{{ asset('images/about.png') }}" alt="about" class="img-fluid">
            </div>
        </div>
    </div>
@endSection
