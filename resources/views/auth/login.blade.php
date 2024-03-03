<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="{{ asset('assets/admin/img/icons/icon-48x48.png') }}" />

	<title>{{ config('app.name') }} - Entrar a panel de administración</title>

	<link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Litoral Comunicaciones</h1>
							<p class="lead">
								Entrar a panel de administración
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form method="POST" action="{{ route('login') }}">
                                        @csrf

										<div class="mb-3">
											<label class="form-label" for="email">Correo electrónico</label>
											<input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="Ingrese su correo electrónico" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
										<div class="mb-3">
											<label class="form-label" for="password">Contraseña</label>
											<input class="form-control form-control-lg @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Ingrese su contraseña" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
										<div>
											<div class="form-check align-items-center">
												<input id="remember" type="checkbox" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }} checked>
												<label class="form-check-label text-small" for="remember">Recordar</label>
											</div>
										</div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Entrar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="{{ asset('assets/admin/') }}js/app.js"></script>
</body>

</html>
