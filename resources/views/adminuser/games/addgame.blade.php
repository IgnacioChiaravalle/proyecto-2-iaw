<!doctype html>
<html>
<head>

	<meta charset="utf-7">
	<title>The Water Level - Agregar Juego</title>
	<script src = "{{ url('/js/InputFieldClearer.js') }}" type = "text/javascript"></script>
	<script src = "{{ url('/js/TypeSwapper.js') }}" type = "text/javascript"></script>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Admin Game Styles/Add Game Style.css') }}"/>

</head>
<body>

	<h1>
		Agregar un Juego al Catálogo
	</h1>

	<form method="POST" action="{{ route('register') }}"> <!-- Change when ready -->

		<div>
			<label for="name">Nombre del Juego:</label>
			<div>
				<input id="name" type="text" class="{{old('name') ? 'active-field' : 'default-field'}}" name="name" value="{{old('name') ? old('name') : 'Nombre del Juego'}}" required autocomplete="name" onselect = "clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')">
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
				<input id="devs" type="text" class="{{old('devs') ? 'active-field' : 'default-field'}}" name="devs" value="{{old('devs') ? old('devs') : 'Compañías Desarrolladoras del Juego (se separan por \';\')'}}" required autocomplete="devs" onselect = "clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')">
				@error('desarrolladores')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div class="value-set">

			<div class="value-set-left">
				<label for="year">Año de Lanzamiento:</label>
				<div>
					<input id="year" type="text" class="{{old('year') ? 'active-field' : 'default-field'}}" name="year" value="{{old('year') ? old('year') : 0}}" required autocomplete="year" onselect = "clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('año')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="value-set-right">
				<label for="esrb">Rating ESRB:</label>
				<div>
					<input id="esrb" type="text" class="{{old('esrb') ? 'active-field' : 'default-field'}}" name="esrb" value="{{old('esrb') ? old('esrb') : 'Rating ESRB'}}" required autocomplete="esrb" onselect = "clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('ESRB')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

		</div>

		<div class="value-set">

			<div class="value-set-left">
				<label for="cover">Portada:</label>
				<div>
					<input id="cover" type="file" class="image-selector" name="cover" value="{{old('cover') ? old('cover') : null}}" required autocomplete="cover">
					@error('portada')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="value-set-right">
				<label for="countercover">Contraportada (Opcional):</label>
				<div>
					<input id="countercover" type="file" class="image-selector" name="countercover" value="{{old('countercover') ? old('countercover') : null}}" autocomplete="countercover">
					@error('contraportada')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

		</div>

		<div class="value-set">

			<div class="value-set-left">
				<label for="pricenew">Precio de las Copias Nuevas:</label>
				<div>
					<input id="pricenew" type="text" class="{{old('pricenew') ? 'active-field' : 'default-field'}}" name="pricenew" value="{{old('pricenew') ? old('pricenew') : 0}}" required autocomplete="pricenew" onselect = "clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('precio (nuevo)')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="value-set-right">
				<label for="priceused">Precio de las Copias Usadas:</label>
				<div>
					<input id="priceused" type="text" class="{{old('priceused') ? 'active-field' : 'default-field'}}" name="priceused" value="{{old('priceused') ? old('priceused') : 0}}" required autocomplete="priceused" onselect = "clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')">
					@error('precio (usado)')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

		</div>

		<div>
			<label for="consoles">Consolas en las que Está Disponible:</label>
			<div>
				<input id="consoles" type="text" class="{{old('consoles') ? 'active-field' : 'default-field'}}" name="consoles" value="{{old('consoles') ? old('consoles') : 'Consolas de Disponibilidad (se separan por \';\')'}}" required autocomplete="consoles" onselect = "clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')" onclick="clearFieldIfDefault(this); checkAllActive(7, 'submit-btn-addgame')">
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

		</div>			THIS SHOULD BE ON ANOTHER SITE. ON SUBMIT, REDIRECT TO THIS SITE ONCE FOR EVERY CONSOLE LISTED. -->