@extends('layouts.main')
@section('content')
    <div class="mb-3 mt-lg-3 mb-lg-5 container">
        @include('components.sections.hero')
    </div>
    <div class="mb-3 mb-lg-5 container">
        @include('components.sections.products')
    </div>
    <div class="bg-white mb-3 mb-lg-5">
        @include('components.sections.about')
    </div>
    <div class="container pt-3 pt-lg-0 pb-5 mb-md-5">
        @include('components.sections.news')
    </div>
    <div class="container pb-5 mb-md-5">
        @include('components.sections.service')
    </div>
    <div class="bg-white overflow-hidden mb-md-5">
        @include('components.sections.reason')
    </div>
    <div class="container pt-5 pt-lg-0 pb-5 mb-md-5">
        @include('components.sections.brands')
    </div>
    <div class="container pt-5 pt-lg-0 pb-5 mb-md-5">
        @include('components.sections.feedback')
    </div>
@endsection

