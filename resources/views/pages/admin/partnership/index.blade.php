@extends('layouts.admin.main')
@section('title_admin', 'Partnership Page')
@section('content')
    <a href="{{ route('admin.partnerships.create') }}" class="btn btn-primary mb-3">Add New Partnership</a>
    @if (session('status') == 'success')
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">Manage Partnership</div>
                <div class="card-body table-responsive">
                    {{ $dataTable->table() }}
                    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
                </div>
            </div>
        </div>
    </section>
@endsection
