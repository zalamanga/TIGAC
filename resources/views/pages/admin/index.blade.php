@extends('layouts.admin.main')
@section('content')
    <section class="row">
      <div class="col-12 col-lg-9">
        <div class="row">
          <x-profile-statistics
              title="Total Products"
              statistics="10.000"
              colorTheme="purple"
              icon="bi bi-stack"
          ></x-profile-statistics>
        </div>
    </section>
@endsection