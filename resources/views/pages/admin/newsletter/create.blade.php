@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('admin.newsletters.store') }}"p method="POST"
                    enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf
                            @if (Route::is('admin.newsletters.edit'))
                                @method('PUT')
                            @endif

                            <div class="col-12">
                                <x-input name="title" type="text" placeholder="Newsletter Title"
                                    title="Newsletter Title" class="form-control" isRequired="true"
                                    value="{{ old('title') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="content">Content <span class="text-danger">*</span></label>
                                    <textarea type="text" class="form-control richtextarea" name="content" placeholder="Newsletter Content" required>{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class='form-group'>
                                    <label for="thumbnail">Newsletter Thumbnail <span class="text-danger">*</span></label>
                                    <input type="file" name="thumbnail" class="form-control"
                                        value="{{ old('thumbnail') }}">
                                    @error('thumbnail')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="thumbnail_short_description">Thumbnail Short Description <span
                                            class="text-danger">*</span></label>
                                    <textarea type="text" id="thumbnail_short_description" class="form-control" name="thumbnail_short_description"
                                        placeholder="Thumbnail Short Description" required>{{ old('content') }}</textarea>
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
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
