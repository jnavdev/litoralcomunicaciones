@extends('admin.layouts.app')

@section('title')
    Perfil
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="text-muted mb-3">Información básica</h4>
                <form action="{{ route('admin.profile.save_personal_information') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 col-xs-12 mb-3">
                            <label class="form-label" for="name">Nombre</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', auth()->user()->name) }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 col-xs-12 mb-3">
                            <label class="form-label" for="email">Correo electrónico</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', auth()->user()->email) }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary"><i class="align-middle" data-feather="check"></i> Guardar</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="text-muted mb-3">Cambiar contraseña</h4>
                <form action="{{ route('admin.profile.change_password') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 col-xs-12 mb-3">
                            <label class="form-label" for="current_password">Contraseña actual</label>
                            <input type="password" name="current_password" id="current_password"
                                class="form-control @error('current_password') is-invalid @enderror">
                            @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 col-xs-12 mb-3">
                            <label class="form-label" for="new_password">Nueva contraseña</label>
                            <input type="password" name="new_password" id="new_password"
                                class="form-control @error('new_password') is-invalid @enderror">
                            @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary"><i class="align-middle" data-feather="check"></i> Guardar</button>
                </form>
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
