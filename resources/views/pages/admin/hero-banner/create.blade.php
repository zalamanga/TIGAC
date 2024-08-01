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
                                <x-input name="name" type="text" placeholder="Media Name" title="Name"
                                    class="form-control" isRequired="true" value="{{ old('name') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">Short Description</label>
                                    <textarea type="text" id="email-id-vertical" class="{{ 'form-control' }}" name="description"
                                        placeholder="Media Sjort Description">{{ old('description') }}</textarea>
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
                            <div>
                                <div class="form-group">
                                    <label for="is_youtube_link">Is Youtube Link <span class="text-danger">*</span></label>
                                    <select class="form-select" id="inputGroupSelect02" name="is_youtube_link">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <x-input name="media_link" type="text" placeholder="Media Youtube Link"
                                    title="Media Link" class="form-control" isRequired="false"
                                    value="{{ old('media_link') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class='form-group'>
                                    <label for="images">Media File (not require if the media is youtube video)</label>
                                    <input type="file" name="media" class="form-control" value="{{ old('images') }}">
                                </div>
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
