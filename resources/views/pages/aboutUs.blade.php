@extends('layouts.main')
@section('content')
    <div class="bg-white mb-3 mb-md-5">
        @include('components.sections.about')
    </div>
    <div class="container pb-5 mb-md-2 mb-lg-5">
        @include('components.sections.service')
    </div>
    <div class="container pt-5 pt-lg-0 pb-5 mb-md-5">
        @include('components.sections.feedback')
    </div>
@endsection
