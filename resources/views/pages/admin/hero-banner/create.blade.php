@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('admin.hero-banners.store') }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="Hero Banner Name"
                                    title="Hero Banner Name" class="form-control" isRequired="true"
                                    value="{{ old('name') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <x-input name="tagline" type="text" placeholder="Hero Banner Tagline"
                                    title="Hero Banner Tagline" class="form-control" isRequired="true"
                                    value="{{ old('name') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">Hero Banner Tagline Description <span
                                            class="text-danger">*</span></label>
                                    <textarea type="text" id="email-id-vertical" class="{{ 'form-control' }}" name="tagline_description"
                                        placeholder="Hero Banner Tagline Description" required>{{ old('tagline_description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="is_active">Active Status <span class="text-danger">*</span></label>
                                    <select class="form-select" id="inputGroupSelect02" name="is_active">
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="is_priority">Is Priority <span class="text-danger">*</span></label>
                                    <select class="form-select" id="inputGroupSelect02" name="is_priority">
                                        <option value="1">Priority</option>
                                        <option value="0">Not Priority</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class='form-group'>
                                    <label for="images">Hero Banner File media <span class="text-danger">*</span></label>
                                    <input type="file" name="media" class="form-control" value="{{ old('media') }}">
                                    @error('media')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
