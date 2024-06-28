@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row">
                        <p class="h2">Product Identity Detail</p>
                        <div class="col-4">
                            <x-input name="name" type="text" placeholder="Product Name" title="Name"
                                class="form-control" isRequired="true" value="{{ old('name') }}">
                            </x-input>
                        </div>
                        <div class="col-4">
                            <x-input name="sku" type="text" placeholder="Product SKU" title="SKU"
                                class="form-control" isRequired="false" value="{{ old('sku') }}">
                            </x-input>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="product_category">Product Category <span class="text-danger">*</span></label>
                                <select class="form-select" id="product_category" name="product_category">
                                    @foreach ($productCategories as $productCategory)
                                        <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="price">Base Price <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" class="form-control" name="price" required>
                                    <span class="input-group-text">,00</span>
                                    @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="discount_percent">Discount in Percent</label>
                                <div class="input-group">
                                    <input type="number" max="100" class="form-control" name="discount_percent">
                                    <span class="input-group-text">%</span>
                                    @error('discount_percent')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <x-input name="stock" type="number" placeholder="Product Total Stock" title="Stock"
                                class="form-control" isRequired="true" value="{{ old('stock') }}">
                            </x-input>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email-id-vertical">Active Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="inputGroupSelect02">
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email-id-vertical">Hot Item Status <span class="text-danger">*</span></label>
                                <select class="form-select" id="inputGroupSelect02">
                                    <option value="1">Hot Item</option>
                                    <option value="0">Not Hot Item</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email-id-vertical">Description</label>
                                <textarea type="text" id="email-id-vertical" class="form-control" name="description"
                                    placeholder="Product Description" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="h2">Product Media (Images)</p>
                        <div class="form-group">
                            <label>Desktop Size Media</label>
                            <input type="file" class="form-control" name="images_desktop[]" multiple>
                        </div>
                        <div class="form-group">
                            <label>Tablet Size Media</label>
                            <input type="file" class="form-control" name="images_tablet[]" multiple>
                        </div>
                        <div class="form-group">
                            <label>Mobile Size Media</label>
                            <input type="file" class="form-control" name="images_mobile[]" multiple>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light me-1 mb-1">Reset</button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-light-secondary me-1 mb-1">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
