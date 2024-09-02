@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('admin.video-home-banners.store') }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="Video Home Banner Name"
                                    title="Video Home Banner Name" class="form-control" isRequired="true"
                                    value="{{ old('name') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">Video Home Banner Description</label>
                                    <textarea type="text" id="email-id-vertical" class="{{ 'form-control' }}" name="description"
                                        placeholder="Video Home Banner Description">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class='form-group'>
                                    <label for="images">Video Home Banner File <span class="text-danger">*</span></label>
                                    <input type="file" name="video" class="form-control" value="{{ old('video') }}">
                                    @error('video')
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
                                <a href="{{ route('admin.video-home-banners.index') }}"
                                    class="btn btn-light-secondary me-1 mb-1">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
