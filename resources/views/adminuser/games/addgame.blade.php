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

	<a href="{{ url('/adminsite') }}">
	<img src="Company Logo.png" alt="The Water Level Logo; Retornar a la Pantalla Inicial del Administrador" class="side-of-screen">
	</a>

	<form method="POST" action="{{ route('register') }}"> <!-- Change when ready -->

		<div>
			<label for="name">Nombre del Juego:</label>
			<div>
				<input id="name" type="text" class="{{old('name') ? 'active-field' : 'default-field'}}" name="name" value="{{old('name') ? old('name') : 'Nombre del Juego'}}" required autocomplete="name" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')">
				@error('nombre')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div>
			<label for="devs">Desarrolladores:</label>
			<div>
				<input id="devs" type="text" class="{{old('devs') ? 'active-field' : 'default-field'}}" name="devs" value="{{old('devs') ? old('devs') : 'Compañías Desarrolladoras del Juego (se separan por \';\')'}}" required autocomplete="devs" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')">
				@error('desarrolladores')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div class="value-set">

			<div class="value-set-item value-set-left">
				<label for="year">Año de Lanzamiento:</label>
				<div>
					<input id="year" type="text" class="value-set-input {{old('year') ? 'active-field' : 'default-field'}}" name="year" value="{{old('year') ? old('year') : 0}}" required autocomplete="year" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')">
					@error('año')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="value-set-item value-set-right">
				<label for="esrb">Rating ESRB:</label>
				<div>
					<input id="esrb" type="text" class="value-set-input {{old('esrb') ? 'active-field' : 'default-field'}}" name="esrb" value="{{old('esrb') ? old('esrb') : 'Rating ESRB'}}" required autocomplete="esrb" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')">
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
				<label for="cover">Portada:</label>
				<div>
					<input id="cover" type="file" class="image-selector {{old('cover') ? 'active-field' : 'default-field'}}" name="cover" value="{{old('cover') ? old('cover') : null}}" required autocomplete="cover" onselect = "activateField(this); checkAllActive(8, 'submit-btn-addgame')" onclick="activateField(this); checkAllActive(8, 'submit-btn-addgame')">
					@error('portada')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="image-selection-set-item image-selection-set-right">
				<label for="countercover">Contraportada (Opcional):</label>
				<div>
					<input id="countercover" type="file" class="image-selector {{old('countercover') ? 'active-field' : 'default-field'}}" name="countercover" value="{{old('countercover') ? old('countercover') : null}}" autocomplete="countercover" onselect = "activateField(this); checkAllActive(8, 'submit-btn-addgame')" onclick="activateField(this); checkAllActive(8, 'submit-btn-addgame')">
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
				<label for="pricenew">Precio de las Copias Nuevas:</label>
				<div class="pricetag">
					<input id="pricenew" type="text" class="value-set-input {{old('pricenew') ? 'active-field' : 'default-field'}}" name="pricenew" value="{{old('pricenew') ? old('pricenew') : 0}}" required autocomplete="pricenew" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')">
					@error('precio (nuevo)')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
					<img src="Coin.png" alt="Moneda" class="coin">
					<img src="Coin.png" alt="Moneda" class="coin">
				</div>
			</div>

			<div class="value-set-item value-set-right">
				<label for="priceused">Precio de las Copias Usadas:</label>
				<div class="pricetag">
					<input id="priceused" type="text" class="value-set-input {{old('priceused') ? 'active-field' : 'default-field'}}" name="priceused" value="{{old('priceused') ? old('priceused') : 0}}" required autocomplete="priceused" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')">
					@error('precio (usado)')
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
			<label for="consoles">Consolas en las que está Disponible, y Cantidad de cada tipo de Copias en cada una:</label>
			<div>
				<input id="consoles" type="text" class="{{old('consoles') ? 'active-field' : 'default-field'}}" name="consoles" value="{{old('consoles') ? old('consoles') : 'Consolas de Disponibilidad (se separan por \';\', escribiendo \'consola-nuevas-usadas\' para cada una)'}}" required autocomplete="consoles" onselect = "clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(8, 'submit-btn-addgame')">
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

<!--<div class="value-set">

			<div class="value-set-left">
				<label for="copiesnew">Cantidad de Copias Nuevas:</label>
				<div>
					<input id="copiesnew" type="text" class="active-field" name="copiesnew" value="{{old('copiesnew') ? old('copiesnew') : 0}}" required autocomplete="copiesnew">
					@error('copias (nuevas)')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="value-set-right">
				<label for="copiesused">Cantidad de Copias Usadas:</label>
				<div>
					<input id="copiesused" type="text" class="active-field" name="copiesused" value="{{old('copiesused') ? old('copiesused') : 0}}" required autocomplete="copiesused">
					@error('copias (usadas)')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

		</div>			THIS COULD BE ON ANOTHER VIEW. ON SUBMIT, REDIRECT TO THIS VIEW ONCE FOR EVERY CONSOLE LISTED. THE NAME OF THE CONSOLE SHOULD BE SENT TO THE VIEW IF IMPLEMENTED. -->