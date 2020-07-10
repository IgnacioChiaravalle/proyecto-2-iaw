@extends('layouts.app')
<title>The Water Level - Recuperar Contraseña</title>
<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
<script src = "{{ url('/js/SubmitEnabler.js') }}" type = "text/javascript"></script>
<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Large Return Button Style.css') }}">
<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/User Auth Styles/Request Password Recovery Style.css') }}"/>

@section('content')
@if (Session::has('message'))
	<script type="text/javascript">alert("{{ Session::get('message') }}");</script>
@endif

<div class="container">
	<a href="{{ url('/') }}">
		<img src="Company Logo.png" alt="The Water Level Logo; Retornar al Sitio de Login">
	</a>

	<h1>Recuperá tu<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspContraseña</h1>

	<form method="POST" action="{{url('forgotpassword')}}">
		@csrf

		<div >
			<label for="email">Ingresá tu dirección de e-mail para que podamos enviarte el Link de Recuperación:</label>
			<div>
				<input type="email" class="default-field" value="{{old('email') ? old('email') : 'Dirección de Correo Electrónico'}}" name="email" value="{{ old('email') }}" required autocomplete="email" onselect = "clearFieldIfDefault(this); activateField(this); enable('submit-btn-restore-password')" onclick="clearFieldIfDefault(this); activateField(this); enable('submit-btn-restore-password')">
				@error('email')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<button type="submit" id="submit-btn-restore-password" class="disabled-submit" disabled="disabled">
			Enviar Link de Recuperación
		</button>
	</form>
</div>
@endsection
