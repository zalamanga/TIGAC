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
                <form class="form form-vertical" action="{{ route('admin.newsletters.update', $newsletter->id) }}"
                    method="POST" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf
                            @if (Route::is('admin.newsletters.edit', $newsletter->id))
                                @method('PUT')
                            @endif

                            <div class="col-12">
                                <x-input name="title" type="text" placeholder="Newsletter Title"
                                    title="Newsletter Title"
                                    class="{{ Route::is('admin.newsletters.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="true" value="{{ old('title', $newsletter->title) }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                @if (Route::is('admin.newsletters.show'))
                                    <div class='form-group'>
                                        <label for="thumbnail">Newsletter Thumbnail <span
                                                class="text-danger">*</span></label>
                                        @error('thumbnail')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="card rounded-0" style="width: 18rem;">
                                        <img src="{{ asset('storage/' . $newsletter->thumbnail) }}"
                                            class="card-img-top rounded-0"
                                            alt="{{ $newsletter->thumbnail_short_description }}">
                                        <div class="card-body">
                                            <p class="card-text text-center">{{ $newsletter->thumbnail_short_description }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="content">Content <span class="text-danger">*</span></label>
                                            <div>
                                                {!! $newsletter->content !!}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class='form-group'>
                                        <label for="thumbnail">Newsletter Thumbnail</label>
                                        <input type="file" name="thumbnail" class="form-control"
                                            value="{{ old('thumbnail') }}">
                                        @error('thumbnail')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="thumbnail_short_description">Thumbnail Short Description <span
                                                    class="text-danger">*</span></label>
                                            <textarea type="text" id="thumbnail_short_description" class="form-control" name="thumbnail_short_description"
                                                placeholder="Thumbnail Short Description" required>{{ old('thumbnail_short_description', $newsletter->thumbnail_short_description) }}</textarea>
                                        </div>
                                    </div>
                                    <div class="card rounded-0" style="width: 18rem;">
                                        <img src="{{ asset('storage/' . $newsletter->thumbnail) }}"
                                            class="card-img-top rounded-0"
                                            alt="{{ $newsletter->thumbnail_short_description }}">
                                        <div class="card-body">
                                            <p class="card-text text-center">{{ $newsletter->thumbnail_short_description }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="content">Content <span class="text-danger">*</span></label>
                                            <textarea rows="30" type="text" class="form-control richtextarea" name="content"
                                                placeholder="Newsletter Content">{{ old('content', $newsletter->content) }}</textarea>
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
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                @if (Route::is('admin.newsletters.show'))
                                    <a href="{{ route('admin.newsletters.edit', $newsletter->id) }}"
                                        class="btn btn-primary me-1 mb-1">Edit</a>
                                    <a href="{{ route('admin.newsletters.index') }}"
                                        class="btn btn-light-secondary me-1 mb-1">Back</a>
                                @else
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
