@extends('layouts.admin.main')
@section('title_admin', 'Masterpiece Page Create')
@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('admin.masterpieces.store') }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="Masterpiece Name"
                                    title="Masterpiece Name" class="form-control" isRequired="true"
                                    value="{{ old('name') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <x-input name="detail_link" type="text"
                                    placeholder="Thumbnail Link (ex: link to product detail)" title="Detail Link"
                                    class="form-control" isRequired="true" value="{{ old('detail_link') }}">
                                </x-input>
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
                            <div class="col-12">
                                <div class='form-group'>
                                    <label for="images">Masterpiece Thumbnail <span class="text-danger">*</span></label>
                                    <input type="file" name="thumbnail" class="form-control"
                                        value="{{ old('thumbnail') }}">
                                    @error('thumbnail')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <x-input name="thumbnail_short_description" type="text"
                                    placeholder="Thumbnail short description" title="Thumbnail Short Description"
                                    class="form-control" isRequired="false"
                                    value="{{ old('thumbnail_short_description') }}">
                                </x-input>
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
