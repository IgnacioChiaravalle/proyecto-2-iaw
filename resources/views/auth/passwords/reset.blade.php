@extends('layouts.app')
<title>The Water Level - Restablecer Contraseña</title>
<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
<script src = "{{ url('/js/TypeSwapper.js') }}" type = "text/javascript"></script>
<script src = "{{ url('/js/SubmitEnabler.js') }}" type = "text/javascript"></script>
<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/User Auth Styles/Request Password Recovery Style.css') }}"/>

@section('content')
@if (Session::has('message'))
	<script type="text/javascript">alert("{{ Session::get('message') }}");</script>	
@endif

<div class="container">
	
	<h1>Restablecé tu Contraseña</h1>

	<form method="POST" action="{{url('resetpassword')}}">
		@csrf

		<input type="hidden" name="token" value="{{ $token }}">

		<div class="form-group row">
			<label for="email">E-Mail:</label>
			<div>
				<input type="email" class="default-field" name="email" value="Dirección de Correo Electrónico" required autocomplete="email" onkeypress="clearFieldIfDefault(this); activateField(this); enable('submit-btn-confirm-password-change')" onclick="clearFieldIfDefault(this); activateField(this); enable('submit-btn-confirm-password-change')">
				@error('email')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div>
			<label for="password">Nuevo Password:</label>

			<div>
				<input type="text" class="default-field" value="Contraseña" name="password" required autocomplete="new-password" onkeypress="clearFieldIfDefault(this); activateField(this); enable('submit-btn-confirm-password-change'); swapType(this)" onclick="clearFieldIfDefault(this); activateField(this); enable('submit-btn-confirm-password-change'); swapType(this)">
				@error('password')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div>
			<label for="password-confirm">Confirmá tu Nuevo Password:</label>
			<div>
				<input type="text" class="default-field" value="Contraseña" name="password_confirmation" required autocomplete="new-password" onkeypress="clearFieldIfDefault(this); activateField(this); enable('submit-btn-confirm-password-change'); swapType(this)" onclick="clearFieldIfDefault(this); activateField(this); enable('submit-btn-confirm-password-change'); swapType(this)">
				@error('password')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<button type="submit" id="submit-btn-confirm-password-change" class="disabled-submit" disabled="disabled">
			Guardar el Nuevo Password
		</button>

	</form>

</div>
@endsection
