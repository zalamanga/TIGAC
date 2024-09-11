@extends('layouts.admin.main')
@section('content')
    @if (session('status') == 'success')
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">Manage Program</div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
                </div>
            </div>
        </div>
    </section>
@endsection
