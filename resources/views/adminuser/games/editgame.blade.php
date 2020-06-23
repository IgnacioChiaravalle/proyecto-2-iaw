<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Editar Juego</title>
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
		Editar los Datos de un Juego del Catálogo
	</h1>

	<form method="POST" action="{{url('editgame')}}" enctype="multipart/form-data">
		@csrf

		<div>
			<label for="nombre">Insertá acá el Nombre del Juego cuyos datos vas a editar:</label>
			<div>
				<input id="nombre" type="text" class="{{old('nombre') ? 'active-field' : 'default-field'}}" name="nombre" value="{{old('nombre')}}" placeholder="Nombre del Juego" required autocomplete="nombre" onkeypress="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')">
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
				<input id="desarrolladores" type="text" class="{{old('desarrolladores') ? 'active-field' : 'default-field'}}" name="desarrolladores" value="{{old('desarrolladores')}}" placeholder="Compañías Desarrolladoras del Juego (se separan por ';')" autocomplete="desarrolladores" onkeypress="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')">
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
					<input id="año" type="text" class="value-set-input {{old('año') ? 'active-field' : 'default-field'}}" name="año" value="{{old('año')}}" placeholder=0 autocomplete="año" onkeypress="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')">
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
					<input id="ESRB" type="text" class="value-set-input {{old('ESRB') ? 'active-field' : 'default-field'}}" name="ESRB" value="{{old('ESRB')}}" placeholder="Rating ESRB" autocomplete="ESRB" onkeypress="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')">
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
					<input id="portada" type="file" class="image-selector {{old('portada') ? 'active-field' : 'default-field'}}" name="portada" autocomplete="portada" onkeypress="activateField(this); checkAllActive(2, 'submit-btn-editgame')" onclick="activateField(this); checkAllActive(2, 'submit-btn-editgame')">
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
					<input id="contraportada" type="file" class="image-selector {{old('contraportada') ? 'active-field' : 'default-field'}}" name="contraportada" autocomplete="contraportada" onkeypress="activateField(this); checkAllActive(2, 'submit-btn-editgame')" onclick="activateField(this); checkAllActive(2, 'submit-btn-editgame')">
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
					<input id="precio-nuevo" type="text" class="value-set-input {{old('precio-nuevo') ? 'active-field' : 'default-field'}}" name="precio-nuevo" value="{{old('precio-nuevo')}}" placeholder=0 autocomplete="precio-nuevo" onkeypress="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')">
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
					<input id="precio-usado" type="text" class="value-set-input {{old('precio-usado') ? 'active-field' : 'default-field'}}" name="precio-usado" value="{{old('precio-usado')}}" placeholder=0 autocomplete="precio-usado" onkeypress="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')">
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
				<input id="consolas" type="text" class="{{old('consolas') ? 'active-field' : 'default-field'}}" name="consolas" value="{{old('consolas')}}" placeholder="Consolas de Disponibilidad (se separan por ';', escribiendo 'consola-nuevas-usadas' para cada una)" autocomplete="consolas" onkeypress="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editgame')">
				@error('consolas')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>		


		<button type="submit" id="submit-btn-editgame" class="submit disabled-submit" disabled="disabled">
			Guardar Cambios
		</button>


	</form>


</body>
</html>