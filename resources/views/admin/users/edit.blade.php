@extends('admin.layouts.app')

@section('title')
    Editar usuario
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="name">Nombre</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="email">Correo electrónico</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password">Contraseña (Opcional)</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button class="btn btn-primary"><i class="align-middle" data-feather="check"></i> Guardar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
