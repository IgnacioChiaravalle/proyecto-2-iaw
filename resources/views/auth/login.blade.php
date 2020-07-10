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
				
	<a href="{{ url('/register') }}">
		<button type="submit" class="register-btn">Registrarse</button>
	</a>
	
	<h1>
		¡¡Bienvenido al Administrador de Stock de<br>
		The Water Level!!
	</h1>

	<form class="login-form" method="POST" action="{{ route('login') }}">
		@csrf

		<label id="description">Por favor, ingrese sus datos de usuario para continuar:</label><br>

		<div>
			<label for="email">E-Mail:</label>
			<div>
				<input type="email" class="{{old('email') ? 'active-field' : 'default-field'}} form-control" name="email" value="{{old('email') ? old('email') : 'Dirección de Correo Electrónico'}}" required autocomplete="email" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-login')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-login')">
				@error('email')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div>
			<label for="password">Contraseña:</label>
			<div>
				<input id="password" type="text" class="default-field form-control" value="Contraseña" name="password" required autocomplete="current-password" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-login'); swapType(this)" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-login'); swapType(this)">
				@error('password')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div class="form-check-and-restore-password">
			<label class="form-check-label" for="remember">¿Deseás que el sitio recuerde tus Datos de Login?&nbsp&nbsp</label>
			<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

			<a href="{{url('requestpasswordreset')}}">¿Olvidaste tu contraseña?</a>
		</div>

		<button type="submit" id="submit-btn-login" class="submit disabled-submit" disabled="disabled">
			Confirmar
		</button>

	</form>

</div>
@endsection
