@extends('layouts.app')
<title>The Water Level - Register</title>
<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Large Return Button Style.css') }}">
<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/User Auth Styles/Register Style.css') }}">

@section('content')
<div class="container">

	<a href="{{ url('/') }}">
		<img src="Company Logo.png" alt="The Water Level Logo; Retornar al Sitio de Login">
	</a>

	<form method="POST" action="{{ route('register') }}">
		@csrf

		<div>
			<label for="name">Nombre:</label>
			<div>
				<input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name">
				@error('name')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div>
			<label for="email">E-Mail:</label>
			<div>
				<input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
				@error('email')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div>
			<label for="password">Password:</label>
			<div>
				<input id="password" type="password" name="password" required autocomplete="new-password">
				@error('confirm_password')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div>
			<label for="password-confirm">Confirmar&nbsp&nbsp&nbsp&nbspPassword:</label>
			<div>
				<input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
				@error('password')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div class="form-check">
			<label class="form-check-label" for="admin-user">¿Es un Administrador de Empresa?</label>
			<input class="form-check-input-admin-user" type="checkbox" name="admin_user" id="admin-user" {{ old('admin-user') ? 'checked' : '' }}>
		</div>
		
		<button type="submit" class="btn btn-primary">
			REGISTRARSE
		</button>

	</form>
	
</div>
@endsection
