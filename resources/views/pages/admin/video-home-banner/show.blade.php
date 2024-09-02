@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('admin.video-home-banners.update', $videoHomeBanner->id) }}"
                    method="POST" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="Video Home Banner Name"
                                    title="Video Home Banner Name"
                                    class="{{ Route::is('admin.video-home-banners.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="true" value="{{ old('name', $videoHomeBanner->name) }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">Video Home Banner Description</label>
                                    <textarea type="text" id="email-id-vertical"
                                        class="{{ Route::is('admin.video-home-banners.show') ? 'form-control-plaintext' : 'form-control' }}"
                                        name="description" placeholder="Video Home Banner Description">{{ old('description', $videoHomeBanner->description) }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <video class="img-fluid rounded-4 video-product" controls loop>
                                    <source src="{{ asset('storage/' . $videoHomeBanner->video_path) }}" type="video/mp4">
                                </video>
                                @if (Route::is('admin.video-home-banners.edit'))
                                    <div class='form-group'>
                                        <label for="images">Video Home Banner File</label>
                                        <input type="file" name="video" class="form-control"
                                            value="{{ old('video', $videoHomeBanner->video_path) }}">
                                        @error('video')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
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
                                <a href="{{ route('admin.video-home-banners.edit', $videoHomeBanner->id) }}" type="reset"
                                    class="btn btn-light me-1 mb-1">Edit</a>
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
