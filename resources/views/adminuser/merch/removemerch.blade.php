<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>The Water Level - Remover Merchandising</title>
	<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
	<script src = "{{ url('/js/TypeSwapper.js') }}" type = "text/javascript"></script>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Return Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Admin General Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Admin Merch Style.css') }}"/>
	
</head>
<body>

	@if (Session::has('success'))
		<script type="text/javascript">alert("{{ Session::get('success') }}");</script>
	@endif
	@if (Session::has('error'))
		<script type="text/javascript">alert("{{ Session::get('error') }}");</script>
	@endif

	<a href="{{ url('/adminsite') }}">
		<img src="Company Logo.png" alt="The Water Level Logo; Retornar al Sitio Principal del Administrador" class="return-btn">
	</a>

	<h1>
		Remover un Artículo de Merchandising del Catálogo
	</h1>

	<form method="POST" action="{{url('removemerch')}}" enctype="multipart/form-data">
		@csrf

		<div>
			<label for="nombre">Inserte aquí el Nombre del Artículo de Merchandising a remover:</label>
			<div>
				<input id="nombre" type="text" class="{{old('nombre') ? 'active-field' : 'default-field'}}" name="nombre" value="{{old('nombre')}}" placeholder="Nombre del Artículo" required autocomplete="nombre" onkeypress="clearFieldIfDefault(this); activateField(this); checkAllActive(1, 'submit-btn-editgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(1, 'submit-btn-editgame')">
				@error('nombre')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>	


		<button type="submit" id="submit-btn-editgame" class="submit disabled-submit" disabled="disabled">
			Remover Artículo
		</button>


	</form>


</body>
</html>