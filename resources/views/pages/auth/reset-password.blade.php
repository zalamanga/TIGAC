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
                <p class="auth-subtitle mb-5">Choose a new password for your account.</p>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}" />
                    <div class="form-group mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control form-control-xl"
                               value="{{ old('email', $request->input('email')) }}" required autocomplete="email" maxlength="255" />
                    </div>
                    <div class="form-group mb-4">
                        <label for="password" class="form-label">New password</label>
                        <input type="password" id="password" name="password" class="form-control form-control-xl"
                               required autocomplete="new-password" />
                    </div>
                    <div class="form-group mb-4">
                        <label for="password_confirmation" class="form-label">Confirm password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-xl"
                               required autocomplete="new-password" />
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Reset password</button>
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
