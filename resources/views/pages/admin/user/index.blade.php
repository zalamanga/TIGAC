@extends('layouts.admin.main')
@section('title_admin', 'User Page')
@section('content')
    <a href="{{ route('userManagement.create') }}" class="btn btn-primary mb-3">Add New User</a>
    @if (session('status') == 'success')
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">Manage User</div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
                </div>
            </div>
        </div>
    </section>
@endsection
