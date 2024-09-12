@extends('layouts.admin.main')
@section('title_admin', 'Hero Banner Page')
@section('content')
    <a href="{{ route('admin.hero-banners.create') }}" class="btn btn-primary mb-3">Add New Hero Banner</a>
    @if (session('status') == 'success')
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">Manage Hero Banner</div>
                <div class="card-body table-responsive">
                    {{ $dataTable->table() }}
                    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
                </div>
            </div>
        </div>
    </section>
@endsection
