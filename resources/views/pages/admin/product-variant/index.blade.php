@extends('layouts.admin.main')
@section('content')
    <a href="{{ route('admin.product.product-category.create') }}" class="btn btn-primary mb-3">Add New Variant</a>
    @if (session('status') == 'success')
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">Manage Product Variant</div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
                </div>
            </div>
        </div>
    </section>
@endsection
