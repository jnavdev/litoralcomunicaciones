@extends('admin.layouts.app')

@section('title')
    Usuarios
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-sm btn-success mb-3" href="{{ route('users.create') }}"><i class="align-middle"
                        data-feather="plus"></i> Nuevo registro</a>
                <livewire:user-table />
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session()->has('success_message'))
            Swal.fire({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                title: '{{ session()->get('success_message') }}'
            });
        @endif
    </script>
@endsection
