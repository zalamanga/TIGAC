@extends('layouts.admin.main')
@section('title_admin', ' Video Home Banner Page')
@section('content')
    <a href="{{ route('admin.video-home-banners.create') }}" class="btn btn-primary mb-3">Add New Video Home Banner</a>
    @if (session('status') == 'success')
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">Manage Video Home Banner</div>
                <div class="card-body table-responsive">
                    {{ $dataTable->table() }}
                    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
                </div>
            </div>
        </div>
    </section>
@endsection
