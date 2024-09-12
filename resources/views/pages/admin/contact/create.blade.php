@extends('layouts.admin.main')
@section('title_admin', 'Contact Page Create')
@section('content')
    {{-- @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('admin.contacts.store') }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="ex: Instagram" title="Contact Name"
                                    class="form-control" isRequired="true" value="{{ old('name') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <x-input name="link" type="text" placeholder="ex: Instagram.com/TIGAC"
                                    title="Contact Link" class="form-control" isRequired="true" value="{{ old('link') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class='form-group'>
                                    <label for="logo">Contact Logo <span class="text-danger">*</span></label>
                                    <input type="file" name="logo" placeholder="ex: Instagram Logo"
                                        class="form-control" value="{{ old('logo') }}">
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
