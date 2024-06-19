@extends('layouts.admin.main')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-vertical">Name</label>
                                    <input type="text" id="first-name-vertical" class="form-control" name="name"
                                        placeholder="Category Name" data-parsley-required="true" required >
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email-id-vertical">Description</label>
                                    <textarea type="text" id="email-id-vertical" class="form-control" name="description"
                                        placeholder="Category Description"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class='form-check'>
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox3" class='form-check-input' data-parsley-required="true" required>
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
