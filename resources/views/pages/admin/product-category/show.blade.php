@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ (Route::is('admin.product.product-category.edit')) ?  route('admin.product.product-category.update', $productCategory->id) : route('admin.product.product-category.store') }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf
                            @if ((Route::is('admin.product.product-category.edit')))
                                @method('PUT')
                            @endif

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="category Name" title="Name"
                                    class="{{ $productCategory && Route::is('admin.product.product-category.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="true"
                                    value="{{ $productCategory ? $productCategory->name : old('name') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">Description</label>
                                    <textarea type="text" id="email-id-vertical"
                                        class="{{ $productCategory && Route::is('admin.product.product-category.show') ? 'form-control-plaintext' : 'form-control' }}"
                                        name="description" placeholder="Category Description">{{ $productCategory ? $productCategory->description : old('description') }}</textarea>
                                </div>
                            </div>
                            @if (!Route::is('admin.product.product-category.show'))
                                <div class="col-12">
                                    <div class='form-check'>
                                        <div class="checkbox">
                                            <input type="checkbox" id="checkbox3" class='form-check-input'
                                                data-parsley-required="true" required>
                                            <label for="checkbox3">Data yang diinput sudah benar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light me-1 mb-1">Reset</button>
                                    <a href="{{ route('admin.product.product-category.index') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>
                                </div>
                            @else
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.product.product-category.index') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
