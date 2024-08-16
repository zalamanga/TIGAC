@extends('layouts.frontend.main')

@section('content')
    {{-- Section 1: Header --}}
    <section class="mt-3 mb-3 container text-center">
        <h1 class="fw-bold mb-3 display-4 text-center px-2 px-md-0">How <span class="text-ogg fw-normal fst-italic">to</span> Find Us</h1>
    </section>

    {{-- Section 2: Contact Form --}}
    <div class="container">
    <div class="row justify-content-center">
            <div class="col-md-9 mb-5">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.588673660494!2d106.75247197475024!3d-6.185763493801786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7000bdb3d2b%3A0xf716c812e6b67c9a!2sTIGAC%20Office%20Tower!5e0!3m2!1sid!2sid!4v1723788643699!5m2!1sid!2sid" width="928" height="668" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('images/new/find.png') }}" alt="" style="width:250px;height:250px;">
                <h4 class="fw-semibold mb-3 mt-3">TIGAC OFFICE TOWER</h4>
                <p class="mb-4">Jl. Pesanggrahan No.54, RT.10/RW.5, Meruya Utara, Kec. Kembangan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11610</p>
                <h4 class="fw-bold">Phone <span class="fw-semibold">0811-8888-2305</span></h4>
                <h4 class="fw-bold">Email <span class="fw-semibold">admin@tigac.id</span></h4>
                <h4 class="fw-bold">Open Hour <span class="fw-semibold"> 10 AM - 6 PM</span></h4>

            </div>
        </div>
    </div>
@endsection
