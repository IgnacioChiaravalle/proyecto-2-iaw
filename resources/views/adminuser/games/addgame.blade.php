<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Agregar Juego</title>
	<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
	<script src = "{{ url('/js/TypeSwapper.js') }}" type = "text/javascript"></script>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Admin Game Styles/Add Game Style.css') }}"/>

</head>
<body>
	<h1>
		Agregar un Juego al Catálogo
	</h1>

	<form method="POST" action="{{url('addgame')}}" enctype="multipart/form-data">
		@csrf

		<div>
			<label for="nombre">Nombre del Juego:</label>
			<div>
				<input id="nombre" type="text" class="{{old('nombre') ? 'active-field' : 'default-field'}}" name="nombre" value="{{old('nombre') ? old('nombre') : 'Nombre del Juego'}}" required autocomplete="nombre" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
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
				<input id="desarrolladores" type="text" class="{{old('desarrolladores') ? 'active-field' : 'default-field'}}" name="desarrolladores" value="{{old('desarrolladores') ? old('desarrolladores') : 'Compañías Desarrolladoras del Juego (se separan por \';\')'}}" required autocomplete="desarrolladores" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
				@error('desarrolladores')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div class="value-set">

			<div class="value-set-item value-set-left">
				<label for="año">Año de Lanzamiento:</label>
				<div>
					<input id="año" type="text" class="value-set-input {{old('año') ? 'active-field' : 'default-field'}}" name="año" value="{{old('año') ? old('año') : 0}}" required autocomplete="año" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('año')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="value-set-item value-set-right">
				<label for="ESRB">Rating ESRB (Opcional):</label>
				<div>
					<input id="ESRB" type="text" class="value-set-input {{old('ESRB') ? 'active-field' : 'default-field'}}" name="ESRB" value="{{old('ESRB') ? old('ESRB') : 'Rating ESRB'}}" autocomplete="ESRB" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('ESRB')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

		</div>

		<div class="image-selection-set">

			<div class="image-selection-set-item image-selection-set-left">
				<label for="portada">Portada:</label>
				<div>
					<input id="portada" type="file" class="image-selector {{old('portada') ? 'active-field' : 'default-field'}}" name="portada" value="{{old('portada') ? old('portada') : null}}" required autocomplete="portada" onselect = "activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('portada')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="image-selection-set-item image-selection-set-right">
				<label for="contraportada">Contraportada (Opcional):</label>
				<div>
					<input id="contraportada" type="file" class="image-selector {{old('contraportada') ? 'active-field' : 'default-field'}}" name="contraportada" value="{{old('contraportada') ? old('contraportada') : null}}" autocomplete="contraportada" onselect = "activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('contraportada')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

		</div>

		<div class="value-set">

			<div class="value-set-item value-set-left">
				<label for="precio-nuevo">Precio de las Copias Nuevas:</label>
				<div class="pricetag">
					<input id="precio-nuevo" type="text" class="value-set-input {{old('precio-nuevo') ? 'active-field' : 'default-field'}}" name="precio-nuevo" value="{{old('precio-nuevo') ? old('precio-nuevo') : 0}}" required autocomplete="precio-nuevo" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('precio-nuevo')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
					<img src="Coin.png" alt="Moneda" class="coin">
					<img src="Coin.png" alt="Moneda" class="coin">
				</div>
			</div>

			<div class="value-set-item value-set-right">
				<label for="precio-usado">Precio de las Copias Usadas:</label>
				<div class="pricetag">
					<input id="precio-usado" type="text" class="value-set-input {{old('precio-usado') ? 'active-field' : 'default-field'}}" name="precio-usado" value="{{old('precio-usado') ? old('precio-usado') : 0}}" required autocomplete="precio-usado" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
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
				<input id="consolas" type="text" class="{{old('consolas') ? 'active-field' : 'default-field'}}" name="consolas" value="{{old('consolas') ? old('consolas') : 'Consolas de Disponibilidad (se separan por \';\', escribiendo \'consola-nuevas-usadas\' para cada una)'}}" required autocomplete="consolas" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(7, 'submit-btn-addgame')">
				@error('consolas')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>		


		<button type="submit" id="submit-btn-addgame" class="submit disabled-submit" disabled="disabled">
			Confirmar
		</button>


	</form>

</body>
</html>