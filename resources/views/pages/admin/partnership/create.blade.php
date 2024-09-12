@extends('layouts.admin.main')
@section('title_admin', 'Partnership Page Create')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('admin.partnerships.store') }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="Partner Name" title="Partner Name"
                                    class="form-control" isRequired="true" value="{{ old('name') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Partner Description</label>
                                    <textarea type="text" id="description" class="{{ 'form-control' }}" name="description"
                                        placeholder="Partner Description">{{ old('tagline_description') }}</textarea>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label for="is_active">Active Status <span class="text-danger">*</span></label>
                                    <select class="form-select" id="is_active" name="is_active">
                                        <option value="1">Active</option>
                                        <option value="0">Not Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <x-input name="external_link" type="text" placeholder="Partner External Link"
                                    title="Partner Name" class="form-control" isRequired="true"
                                    value="{{ old('external_link') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class='form-group'>
                                    <label for="logo">Partner Logo <span class="text-danger">*</span></label>
                                    <input type="file" name="logo" class="form-control" value="{{ old('logo') }}">
                                    @error('logo')
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
                                <a href="{{ route('admin.partnerships.index') }}"
                                    class="btn btn-light-secondary me-1 mb-1">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
