@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Bienvenido {{ auth()->user()->name }}!</h5>
            </div>
        </div>
    </div>
@endsection
