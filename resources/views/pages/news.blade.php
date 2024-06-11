@extends('layouts.main')
@section('content')
    <div class="container mt-md-4 mb-3 mb-md-5">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 px-1 mb-md-5">
            <h2 class="fw-bold text-white">Our News</h2>
                <form action="#" class="d-flex align-items-center gap-2">
                    <input type="text" class="form-control fs-7 py-2" placeholder="Search...">
                    <button class="btn btn-primary py-2 fs-7">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>
                    </button>
                </form>
        </div>
        <div class="row justify-content-center justify-content-lg-start gap-md-4">
            @for ($i = 0; $i < 8; $i++)
                <div class="card col-11 col-md-5 col-lg-3 p-0 mb-4 mb-md-0 mb-lg-2 news-item">
                    <img src="{{ asset('images/logo.png') }}" alt="watch" class="card-img-top">
                    <div class="card-body">
                        <a href="#" class="card-title mb-1 fs-5 text-decoration-none fw-bold link">Card title</a>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                            card's content.</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
