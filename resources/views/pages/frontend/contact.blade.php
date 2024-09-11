@extends('layouts.frontend.main')
@section('title','Contact Page')
@section('content')
    {{-- Section 1: Header --}}
    <section class="mt-3 mb-3 container text-center">
        <h1 class="fw-bold mb-3 display-1">Contact Us</h1>
        <h2 class="fw-semibold mb-3 display-4">Drop Us An Email</h2>
    </section>

    {{-- Section 2: Contact Form --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="" class="d-flex flex-column gap-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control fs-6 p-3 bg-light" placeholder="Your name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control fs-6 p-3 bg-light" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <input type="text" class="form-control fs-6 p-3 bg-light" placeholder="Phone number" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <textarea class="form-control fs-6 p-3 bg-light" rows="10" placeholder="Your message" required></textarea>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-4 mb-4">
                            <button type="submit" class="btn btn-lg btn-primary text-white w-100" style="border-radius: 10px;" type="submit">Send Message</button>
                        </div>
                        <div class="col-md-4 mb-4">
                            <a type="button" class="btn btn-lg btn-danger text-white w-100" style="border-radius: 10px;" href="https://wa.me/6289651147065" target="_blank">Chat on WhatsApp</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
