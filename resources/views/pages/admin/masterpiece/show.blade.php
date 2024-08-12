@extends('layouts.admin.main')
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
                <form class="form form-vertical" action="{{ route('admin.masterpieces.update', $masterpiece->id) }}"
                    method="POST" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="Masterpiece Name"
                                    title="Masterpiece Name"
                                    class="{{ Route::is('admin.masterpieces.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="true" value="{{ old('name', $masterpiece->name) }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <x-input name="detail_link" type="text"
                                    placeholder="Thumbnail Link (ex: link to product detail)" title="Detail Link"
                                    class="{{ Route::is('admin.masterpieces.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="true" value="{{ old('detail_link', $masterpiece->detail_link) }}">
                                </x-input>
                            </div>
                            <div class="col-4">
                                @if (Route::is('admin.masterpieces.show'))
                                    <label for="is_active">Active Status <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control-plaintext"
                                        value="{{ $masterpiece->is_active == '1' ? 'Active' : 'Not Active' }}">
                                @else
                                    <div class="form-group">
                                        <label for="is_active">Active Status <span class="text-danger">*</span></label>
                                        <select class="form-select" id="inputGroupSelect02" name="is_active">
                                            <option value="1" {{ $masterpiece->is_active == '1' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="0" {{ $masterpiece->is_active == '0' ? 'selected' : '' }}>
                                                Not Active</option>
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                @if (Route::is('admin.masterpieces.show'))
                                    <div class="card rounded-0" style="width: 18rem;">
                                        <img src="{{ asset('storage/' . $masterpiece->thumbnail) }}"
                                            class="card-img-top rounded-0"
                                            alt="{{ $masterpiece->thumbnail_short_description }}">
                                        <div class="card-body">
                                            <p class="card-text text-center">
                                                {{ $masterpiece->thumbnail_short_description }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="card rounded-0" style="width: 18rem;">
                                        <img src="{{ asset('storage/' . $masterpiece->thumbnail) }}"
                                            class="card-img-top rounded-0"
                                            alt="{{ $masterpiece->thumbnail_short_description }}">
                                        <div class="card-body">
                                            <p class="card-text text-center">
                                                {{ $masterpiece->thumbnail_short_description }}</p>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label for="images">Masterpiece Thumbnail</label>
                                        <input type="file" name="thumbnail" class="form-control"
                                            value="{{ old('thumbnail') }}">
                                        @error('thumbnail')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif

                            </div>
                            <div class="col-12">
                                <x-input name="thumbnail_short_description" type="text"
                                    placeholder="Thumbnail short description" title="Thumbnail Short Description"
                                    class="{{ Route::is('admin.masterpieces.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="false" value="{{ old('thumbnail_short_description') }}">
                                </x-input>
                            </div>

                            @if (Route::is('admin.masterpieces.show'))
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.masterpieces.edit', $masterpiece->id) }}"
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
