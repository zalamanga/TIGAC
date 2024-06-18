@extends('layouts.admin.main')
@section('content')
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">Manage Product Category</div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
