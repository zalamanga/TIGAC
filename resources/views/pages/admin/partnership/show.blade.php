@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('admin.partnerships.update', $partnership->id) }}"
                    method="POST" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="Partner Name" title="Partner Name"
                                    class="{{ Route::is('admin.partnerships.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="true" value="{{ old('name', $partnership->name) }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Partner Description</label>
                                    <textarea type="text" id="description"
                                        class="{{ Route::is('admin.partnerships.show') ? 'form-control-plaintext' : 'form-control' }}" name="description"
                                        placeholder="Partner Description">{{ old('description', $partnership->description) }}</textarea>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="is_active">Active Status <span class="text-danger">*</span></label>
                                    @if (Route::is('admin.partnerships.show'))
                                        <input type="text" value="{{ $partnership->is_active == '1' ? 'Yes' : 'No' }}"
                                            class="form-control-plaintext">
                                    @else
                                        <select class="form-select" id="is_active" name="is_active">
                                            <option value="1" {{ $partnership->is_active === '1' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="0" {{ $partnership->is_active === '0' ? 'selected' : '' }}>
                                                Not
                                                Active</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <x-input name="external_link" type="text" placeholder="Partner External Link"
                                    title="Partner Name"
                                    class="{{ Route::is('admin.partnerships.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="true" value="{{ old('external_link', $partnership->external_link) }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class='form-group'>
                                    <label for="logo">Partner Logo <span class="text-danger">*</span></label>
                                    @if (Route::is('admin.partnerships.show'))
                                        <div class="card rounded-0" style="width: 18rem;">
                                            <img src="{{ asset('storage/' . $partnership->logo) }}"
                                                class="card-img-top rounded-0" alt="{{ $partnership->name }}">
                                            <div class="card-body">
                                                <p class="card-text text-center">{{ $partnership->name }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="card rounded-0" style="width: 18rem;">
                                            <img src="{{ asset('storage/' . $partnership->logo) }}"
                                                class="card-img-top rounded-0" alt="{{ $partnership->name }}">
                                            <div class="card-body">
                                                <p class="card-text text-center">{{ $partnership->name }}</p>
                                            </div>
                                        </div>
                                        <input type="file" name="logo" class="form-control"
                                            value="{{ old('logo') }}">
                                        @error('logo')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    @endif
                                </div>
                            </div>
                            @if (Route::is('admin.partnerships.show'))
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.partnerships.edit', $partnership->id) }}"
                                        class="btn btn-primary me-1 mb-1">Edit</a>
                                    <button type="reset" class="btn btn-light me-1 mb-1">Reset</button>
                                    <a href="{{ route('admin.product.product-variant.index') }}"
                                        class="btn btn-light-secondary me-1 mb-1">Back</a>
                                </div>
                            @else
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
                                    <a href="{{ route('admin.product.product-variant.index') }}"
                                        class="btn btn-light-secondary me-1 mb-1">Back</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
