@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                {{ Route::is('admin.products.show') ? 'Product Detail Page' : 'Add New Product' }}
            </div>
        </div>
    </div>
@endsection
