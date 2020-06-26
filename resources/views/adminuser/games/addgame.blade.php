<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Agregar Juego</title>
	<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
	<script src = "{{ url('/js/TypeSwapper.js') }}" type = "text/javascript"></script>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Return Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Admin General Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Admin Game Style.css') }}"/>

</head>
<body>

	@if (Session::has('message'))
		<script type="text/javascript">alert("{{ Session::get('message') }}");</script>
	@endif

	<a href="{{ url('/adminsite') }}">
		<img src="Company Logo.png" alt="The Water Level Logo; Retornar al Sitio Principal del Administrador" class="return-btn">
	</a>

	<h1>
		Agregar un Juego al Catálogo
	</h1>

	<form method="POST" action="{{url('addgame')}}" enctype="multipart/form-data">
		@csrf

		<div>
			<label for="nombre">Nombre del Juego:</label>
			<div>
				<input id="nombre" type="text" class="{{old('nombre') ? 'active-field' : 'default-field'}}" name="nombre" value="{{old('nombre')}}" placeholder="Nombre del Juego" required autocomplete="nombre" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
				@error('nombre')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div>
			<label for="desarrolladores">Desarrolladores:</label>
			<div>
				<input id="desarrolladores" type="text" class="{{old('desarrolladores') ? 'active-field' : 'default-field'}}" name="desarrolladores" value="{{old('desarrolladores')}}" placeholder="Compañías Desarrolladoras del Juego (se separan por ';')" required autocomplete="desarrolladores" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
				@error('desarrolladores')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div class="value-set">

			<div class="value-set-div value-set-left">
				<label for="año">Año de Lanzamiento:</label>
				<div>
					<input id="año" type="number" class="value-set-input {{old('año') ? 'active-field' : 'default-field'}}" name="año" value="{{old('año')}}" placeholder=0 required autocomplete="año" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('año')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="value-set-div value-set-right">
				<label for="ESRB">Rating ESRB (Opcional):</label>
				<div>
					<input id="ESRB" type="text" class="value-set-input {{old('ESRB') ? 'active-field' : 'default-field'}}" name="ESRB" value="{{old('ESRB')}}" placeholder="Rating ESRB" autocomplete="ESRB" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('ESRB')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

		</div>

		<div class="image-selection-set">

			<div class="image-selection-set-div image-selection-set-left">
				<label for="portada">Portada:</label>
				<div>
					<input id="portada" type="file" class="image-selector {{old('portada') ? 'active-field' : 'default-field'}}" name="portada" required autocomplete="portada" onkeypress = "activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('portada')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="image-selection-set-div image-selection-set-right">
				<label for="contraportada">Contraportada (Opcional):</label>
				<div>
					<input id="contraportada" type="file" class="image-selector {{old('contraportada') ? 'active-field' : 'default-field'}}" name="contraportada" autocomplete="contraportada" onkeypress = "activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('contraportada')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

		</div>

		<div class="value-set">

			<div class="value-set-div value-set-left">
				<label for="precio-nuevo">Precio de las Copias Nuevas:</label>
				<div class="pricetag-div">
					<input id="precio-nuevo" type="number" step=".01" class="value-set-input {{old('precio-nuevo') ? 'active-field' : 'default-field'}}" name="precio-nuevo" value="{{old('precio-nuevo')}}" placeholder=0 required autocomplete="precio-nuevo" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('precio-nuevo')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
					<img src="Coin.png" alt="Moneda" class="coin">
					<img src="Coin.png" alt="Moneda" class="coin">
				</div>
			</div>

			<div class="value-set-div value-set-right">
				<label for="precio-usado">Precio de las Copias Usadas:</label>
				<div class="pricetag-div">
					<input id="precio-usado" type="number" step=".01" class="value-set-input {{old('precio-usado') ? 'active-field' : 'default-field'}}" name="precio-usado" value="{{old('precio-usado')}}" placeholder=0 required autocomplete="precio-usado" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('precio-usado')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
					<img src="Coin.png" alt="Moneda" class="coin">
					<img src="Coin.png" alt="Moneda" class="coin">
				</div>
			</div>

		</div>

		<div>
			<label for="consolas">Consolas en las que está Disponible, y Cantidad de cada tipo de Copias en cada una:</label>
			<div>
				<input id="consolas" type="text" class="{{old('consolas') ? 'active-field' : 'default-field'}}" name="consolas" value="{{old('consolas')}}" placeholder="Consolas de Disponibilidad (se separan por ';', escribiendo 'consola-nuevas-usadas' para cada una)" required autocomplete="consolas" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
				@error('consolas')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>		


		<button type="submit" id="submit-btn-addgame" class="submit disabled-submit" disabled="disabled">
			Agregar Juego
		</button>


	</form>

</body>
</html>