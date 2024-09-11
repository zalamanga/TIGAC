@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical"
                    action="{{ Route::is('admin.faqs.edit') ? route('admin.faqs.update', $faq->id) : route('admin.faqs.store') }}"
                    method="POST" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf
                            @if (Route::is('admin.faqs.edit'))
                                @method('PUT')
                            @endif

                            <div class="col-12">
                                <x-input name="question" type="text" placeholder="Variant question" title="question"
                                    class="{{ $faq && Route::is('admin.faqs.show') ? 'form-control-plaintext' : 'form-control' }}"
                                    isRequired="true" value="{{ $faq ? $faq->question : old('question') }}">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">answer</label>
                                    <textarea type="text" id="email-id-vertical"
                                        class="{{ $faq && Route::is('admin.faqs.show') ? 'form-control-plaintext' : 'form-control' }}" name="answer"
                                        placeholder="Variant answer">{{ $faq ? $faq->answer : old('answer') }}</textarea>
                                    @error('answer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if (!Route::is('admin.faqs.show'))
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
                                    <a href="{{ route('admin.faqs.index') }}"
                                        class="btn btn-light-secondary me-1 mb-1">Back</a>
                                </div>
                            @else
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('admin.faqs.edit', $faq->id) }}"
                                        class="btn btn-primary me-1 mb-1">Edit</a>
                                    <a href="{{ route('admin.faqs.index') }}"
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
