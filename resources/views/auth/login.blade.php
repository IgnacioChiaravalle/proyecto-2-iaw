@extends('layouts.app')
<title>The Water Level - Login</title>
<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
<script src = "{{ url('/js/TypeSwapper.js') }}" type = "text/javascript"></script>
<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/User Auth Styles/Login Style.css') }}"/>

@section('content')
@if (Session::has('message'))
	<script type="text/javascript">alert("{{ Session::get('message') }}");</script>
@endif

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				
				<form action="{{ route('register') }}">
					<button type="submit" class="register-btn">Registrarse</button>
				</form>
				
				<h1>
					¡¡Bienvenido al Administrador de Stock de<br>
					The Water Level!!
				</h1>

				<div class="card-body">
					<form class="login-form" method="POST" action="{{ route('login') }}">
						@csrf

						<label id="description">Por favor, ingrese sus datos de usuario para continuar:</label><br>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">E-Mail:</label>

							<div class="col-md-6">
								<input id="email" type="email" class="{{old('email') ? 'active-field' : 'default-field'}} form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') ? old('email') : 'Dirección de Correo Electrónico'}}" required autocomplete="email" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-login')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-login')">

								@error('email')
									<label class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</label>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">Contraseña:</label>

							<div class="col-md-6">
								<input id="password" type="text" class="default-field form-control @error('password') is-invalid @enderror" value="Contraseña" name="password" required autocomplete="current-password" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-login'); swapType(this)" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-login'); swapType(this)">

								@error('password')
									<label class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</label>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 offset-md-4">
								<div class="form-check-and-restore-password">
									<label class="form-check-label" for="remember">¿Deseás que el sitio recuerde tus Datos de Login?&nbsp&nbsp</label>
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									
									@if (Route::has('password.request'))
										<a href="{{ route('password.request') }}">
											¿Olvidaste tu contraseña?
										</a>
									@endif
								</div>
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" id="submit-btn-login" class="submit disabled-submit" disabled="disabled">
									Confirmar
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
