@extends('layouts.admin.main')
@section('content')
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('compiled/jpg/1.jpg') }}" alt="Face 1" />
                        </div>
                        <div class="ms-3 name overflow-hidden">
                            <h5 class="font-bold">{{ $loggedUserData->name }}</h5>
                            <h6 class="text-muted mb-0">{{ $loggedUserData->email }}</h6>
                        </div>
                    </div>
                </div>
                <x-profile-statistics title="Total Products" statistics="10.000" colorTheme="purple"
                    icon="bi bi-stack"></x-profile-statistics>
                <x-profile-statistics title="Total Products" statistics="10.000" colorTheme="purple"
                    icon="bi bi-stack"></x-profile-statistics>
                <x-profile-statistics title="Total Products" statistics="10.000" colorTheme="purple"
                    icon="bi bi-stack"></x-profile-statistics>
                <x-profile-statistics title="Total Products" statistics="10.000" colorTheme="purple"
                    icon="bi bi-stack"></x-profile-statistics>
            </div>
        </div>
    </section>
@endsection
