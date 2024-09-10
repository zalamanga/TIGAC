@php

@endphp

@extends('layouts.frontend.main')
@section('content')
    <section class="container mt-3 mt-xl-4 pb-5">
        <h1 class="tagline-xxl w-100 fw-semibold mb-3 px-xl-5" data-aos="fade-right">Newsletter</h1>
        <div class="d-flex flex-column flex-md-row justify-content-start px-xl-5 w-full gap-5 gap-md-4  gap-xl-5 flex-wrap" data-aos="fade-down">
            @foreach ($newsletters as $newsletter)
                <div class="card-newsletter-item overflow-hidden">
                    <img src="{{ asset('storage/' . $newsletter->thumbnail) }}"
                        alt="{{ $newsletter->thumbnail_short_description }}"
                        class="img-fluid object-fit-cover rounded-4 mb-3 card-newsletter-img">
                    <h3 class="fw-semibold mb-3 fw-medium card-newsletter-title text-ellipsis-3">{{ $newsletter->title }}
                    </h3>
                    <div class="text-ellipsis-4 mb-4 fs-5 text-black">{!! $newsletter->content !!}</div>
                    <a href="#" class="text-black fs-5 fw-semibold">Read More</a>
                </div>
            @endforeach
        </div>
    </section>
@endsection()
