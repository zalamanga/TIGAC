@extends('layouts.admin.main')
@section('content')
    {{-- @if ($errors->any())
        {{ dd($errors->all()) }}
    @endif --}}

    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical"
                    action="{{ Route::is('admin.hero-banners.show', $heroBanner->id) ? route('admin.hero-banners.show', $heroBanner->id) : route('admin.hero-banners.update', $heroBanner->id) }}"
                    method="POST" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="Hero Banner Name"
                                    title="Hero Banner Name"
                                    class="{{ Route::is('admin.hero-banners.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="true" value="{{ old('name', $heroBanner->name) }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <x-input name="tagline" type="text" placeholder="Hero Banner Tagline"
                                    title="Hero Banner Tagline"
                                    class="{{ Route::is('admin.hero-banners.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="true" value="{{ old('name', $heroBanner->tagline) }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">Hero Banner Tagline Description <span
                                            class="text-danger">*</span></label>
                                    <textarea type="text" id="email-id-vertical"
                                        class="{{ Route::is('admin.hero-banners.show') ? 'form-control-plaintext' : 'form-control' }}"
                                        name="tagline_description" placeholder="Hero Banner Tagline Description" required>{{ old('tagline_description', $heroBanner->tagline_description) }}</textarea>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="is_active">Is For Product Page <span class="text-danger">*</span></label>
                                    <select
                                        class="{{ Route::is('admin.hero-banners.show') ? 'form-control-plaintext' : 'form-select' }}"
                                        id="inputGroupSelect02" name="is_for_product_page">
                                        <option value="1"
                                            {{ $heroBanner->is_for_product_page == '1' ? 'selected' : '' }}>Yes
                                        </option>
                                        <option value="0"
                                            {{ $heroBanner->is_for_product_page == '0' ? 'selected' : '' }}>No
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="is_active">Active Status <span class="text-danger">*</span></label>
                                    <select
                                        class="{{ Route::is('admin.hero-banners.show') ? 'form-control-plaintext' : 'form-select' }}"
                                        id="inputGroupSelect02" name="is_active">
                                        <option value="1" {{ $heroBanner->is_active == '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ $heroBanner->is_active == '0' ? 'selected' : '' }}>Not
                                            Active
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="is_priority">Is Priority <span class="text-danger">*</span></label>
                                    <select
                                        class="{{ Route::is('admin.hero-banners.show') ? 'form-control-plaintext' : 'form-select' }}"
                                        id="inputGroupSelect02" name="is_priority">
                                        <option value="1" {{ $heroBanner->is_priority == '1' ? 'selected' : '' }}>
                                            Priority</option>
                                        <option value="0" {{ $heroBanner->is_priority == '0' ? 'selected' : '' }}>Not
                                            Priority</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class='form-group'>
                                    <label for="images">Hero Banner File media <span class="text-danger">*</span></label>
                                    @if (Route::is('admin.hero-banners.edit') || Route::is('admin.hero-banners.show'))
                                        <div class="card rounded-0" style="width: 18rem;">
                                            <img src="{{ asset('storage/' . $heroBanner->media_path) }}"
                                                class="card-img-top rounded-0" alt="{{ $heroBanner->name }}">
                                            <div class="card-body">
                                                <p class="card-text text-center">{{ $heroBanner->name }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if (Route::is('admin.hero-banners.edit'))
                                        <input type="file" name="media" class="form-control"
                                            value="{{ old('media', $heroBanner->media) }}">
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
                            @endif
                            <div class="col-12 d-flex justify-content-end">
                                @if (Route::is('admin.hero-banners.show'))
                                    <a href="{{ route('admin.hero-banners.edit', $heroBanner->id) }}" type="submit"
                                        class="btn btn-primary me-1 mb-1">Edit</a>
                                @else
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                @endif
                                <button type="reset" class="btn btn-light me-1 mb-1">Reset</button>
                                <a href="{{ route('admin.hero-banners.index') }}"
                                    class="btn btn-light-secondary me-1 mb-1">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
