@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form action="" class="dropzone" id="image-upload">
                    <div class="form-group row">
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
                                <label for="email-id-vertical">Product Category <span class="text-danger">*</span></label>
                                <select class="form-select" id="inputGroupSelect02">
                                    @foreach ($productCategories as $productCategory)
                                        <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email-id-vertical">Base Price <span class="text-danger">*</span></label>
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
                                <label for="email-id-vertical">Discount in Percent</label>
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
                </form>
            </div>
        </div>
    </div>

@endsection
