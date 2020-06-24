<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>The Water Level - Editar Merchandising</title>
	<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
	<script src = "{{ url('/js/TypeSwapper.js') }}" type = "text/javascript"></script>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Return Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Admin General Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Admin Merch Style.css') }}"/>
	
</head>
<body>

	@if (Session::has('message'))
		<script type="text/javascript">alert("{{ Session::get('message') }}");</script>
	@endif

	<a href="{{ url('/adminsite') }}">
		<img src="Company Logo.png" alt="The Water Level Logo; Retornar al Sitio Principal del Administrador" class="return-btn">
	</a>

	<h1>
		Editar los Datos de un Artículo de Merchandising del Catálogo
	</h1>

	<form method="POST" action="{{url('editmerch')}}" enctype="multipart/form-data">
		@csrf

		<div>
			<label for="nombre">Insertá acá el Nombre del Artículo de Merchandising cuyos datos vas a editar:</label>
			<div>
				<input id="nombre" type="text" class="{{old('nombre') ? 'active-field' : 'default-field'}}" name="nombre" value="{{old('nombre')}}" placeholder="Nombre del Artículo" required autocomplete="nombre" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')">
				@error('nombre')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div class="description-field">
			<label for="descripción">Descripción:</label>
			<div>
				<input id="descripción" type="text" class="{{old('descripción') ? 'active-field' : 'default-field'}}" name="descripción" value="{{old('descripción')}}" placeholder="Descripción del Artículo" autocomplete="descripción" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')">
				@error('descripción')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div>
			<label for="multimedia-de-origen">Nombre de la Multimedia de Origen:</label>
			<div class="multimedia-div">
				<input id="multimedia-de-origen" type="text" class="value-set-input-left  {{old('multimedia-de-origen') ? 'active-field' : 'default-field'}}" name="multimedia-de-origen" value="{{old('multimedia-de-origen')}}" placeholder="Multimedia de Origen" autocomplete="multimedia-de-origen" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')">
				@error('multimedia-de-origen')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>

		<div class="value-set">

			<div class="value-set-div value-set-left">
				<label for="stock">Stock:</label>
				<div>
					<input id="stock" type="text" class="value-set-input  {{old('stock') ? 'active-field' : 'default-field'}}" name="stock" value="{{old('stock')}}" placeholder=0 autocomplete="stock" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')">
					@error('stock')
						<label class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</label>
					@enderror
				</div>
			</div>

			<div class="value-set-div value-set-right">
				<label for="precio">Precio del Artículo:</label>
				<div class="pricetag-div">
					<input id="precio" type="text" class="value-set-input {{old('precio') ? 'active-field' : 'default-field'}}" name="precio" value="{{old('precio')}}" placeholder=0 autocomplete="precio" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')">
					@error('precio')
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
			<label for="categorías">Categorías del Artículo:</label>
			<div>
				<input id="categorías" type="textarea" class="category {{old('categorías') ? 'active-field' : 'default-field'}}" name="categorías" value="{{old('categorías')}}" placeholder="Categorías del Artículo (se separan por ';')" autocomplete="categorías" onkeypress = "clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(2, 'submit-btn-editmerch')">
				@error('categorías')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>	

		<div class="image-selection">
			<label for="foto">Foto del Artículo:</label>
			<div>
				<input id="foto" type="file" class="image-selector {{old('foto') ? 'active-field' : 'default-field'}}" name="foto" autocomplete="foto" onkeypress = "activateField(this); checkAllActive(2, 'submit-btn-editmerch')" onclick="activateField(this); checkAllActive(2, 'submit-btn-editmerch')">
				@error('foto')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>
	
		<button type="submit" id="submit-btn-editmerch" class="submit disabled-submit" disabled="disabled">
			Guardar Cambios
		</button>


	</form>

</body>
</html>