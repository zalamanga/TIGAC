@extends('layouts.auth')
@push('styles')
    <link rel="stylesheet" crossorigin href="{{ asset('compiled/css/auth.css') }}" />
@endpush

@section('content')
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="{{ route('pages.frontend.index') }}" class="navbar-brand"><img src="{{ asset('images/logo.png') }}" alt="TIGAC logo" /></a>
                </div>
                <h1 class="auth-title">Reset.</h1>
                <p class="auth-subtitle mb-5">Enter your email to receive a password reset link.</p>

                @if (session('status'))
                    <div class="alert alert-success" role="status">{{ session('status') }}</div>
                @endif

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required autocomplete="email" maxlength="255" />
                        @error('email')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Send reset link</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p><a class="font-bold" href="{{ route('login') }}">Back to login</a></p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
@endsection
