@extends('layouts.admin.main')
@section('title_admin', 'User Page Show')
@section('content')
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" action="{{ route('userManagement.store') }}" method="POST"
                    enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="row">
                            @csrf

                            <div class="col-12">
                                <x-input name="name" type="text" placeholder="Name" title="Name"
                                     class="form-control" isRequired="true" value="">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <x-input name="email" type="email" placeholder="Email" title="Email"
                                     class="form-control" isRequired="true" value="">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <x-input name="password" type="password" placeholder="*********" title="Password"
                                     class="form-control" isRequired="true" value="">
                                </x-input>
                            </div>
                            <div class="col-12">
                                <x-input name="cpassword" type="password" placeholder="*********" title="Confirmation Password"
                                     class="form-control" isRequired="true" value="">
                                </x-input>
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
