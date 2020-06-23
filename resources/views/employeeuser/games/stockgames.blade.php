<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Stock de Juegos</title>
	<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
	<script src = "{{ url('/js/TypeSwapper.js') }}" type = "text/javascript"></script>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Return Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee General Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee Game Style.css') }}"/>

</head>
<body>

	@if (Session::has('message'))
		<script type="text/javascript">alert("{{ Session::get('message') }}");</script>
	@endif

	<a href="{{ url('/employeesite') }}">
		<img src="Company Logo.png" alt="The Water Level Logo; Retornar al Sitio Principal del Empleado" class="return-btn">
	</a>

	<h1>
		Stock de Juegos
	</h1>

	<form method="POST" action="{{url('searchgame')}}" enctype="multipart/form-data"> <!-- TODO -->
		@csrf
		<div class="search-div">
			<label for="nombre" class="search-label">Buscá acá el Nombre de un Juego:</label>
			<div>
				<input id="nombre" type="text" class="{{old('nombre') ? 'active-field' : 'default-field'}}" name="nombre" value="{{old('nombre')}}" placeholder="Nombre de un Juego" required autocomplete="nombre" onkeypress="clearFieldIfDefault(this); activateField(this); checkAllActive(1, 'submit-btn-searchgame')" onclick="clearFieldIfDefault(this); activateField(this); checkAllActive(1, 'submit-btn-searchgame')">
				@error('nombre')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>	
		<button type="submit" id="submit-btn-searchgame" class="submit disabled-submit" disabled="disabled">
			BUSCAR
		</button>
	</form>


	<table class="main-table">
		<tr class="table-header-row">
			<td class="table-header-cell">Juego</td>
			<td class="table-header-cell">Año de Lanzamiento</td>
			<td class="table-header-cell">Rating ESRB</td>
			<td class="table-header-cell">Precio Nuevo</td>
			<td class="table-header-cell">Precio Usado</td>
			<td class="table-header-cell">Desarrolladores</td>
			<td class="table-header-cell">Consola</td>
			<td class="table-header-cell">Copias Nuevas</td>
			<td class="table-header-cell">Copias Usadas</td>
		</tr>

		@isset ($gameDevsConsoles)
			@foreach ($gameDevsConsoles as $gDC)
				<tr class="table-inner-row">

					@foreach ($gDC[0] as $gameAttribute) <!-- Fill all game attributes -->
						@if ($gameAttribute != null)
							<td class="game-attribute clickable" onclick="">{{ $gameAttribute }}</td>
						@else
							<td class="game-attribute clickable" onclick="">No Disponible</td>
						@endif
					@endforeach

					<td>
						@foreach ($gDC[1] as $devOfGame) <!-- Write each developer in a separate row -->
							<table class="inner-table sub-row">
								<tr>
									<td class="clickable" onclick="">{{ $devOfGame }}</td>
								</tr>
							</table>
							@if ($devOfGame != $gDC[1][count($gDC[1])-1]) <!-- If not working on the last developer -->
								<hr>
							@endif
						@endforeach
					</td>
					
					<td>
						@foreach($gDC[2] as $consoleAttributesList)
							<table class="inner-table sub-row">
								<tr>
									<td class="clickable" onclick="">{{ $consoleAttributesList[0] }}</td>
								</tr>
							</table>
							@if ($consoleAttributesList != $gDC[2][count($gDC[2])-1]) <!-- If not working on the last console -->
								<hr>
							@endif
						@endforeach
					</td>
					<td>
						@foreach($gDC[2] as $consoleAttributesList)
							<table class="inner-table sub-row">
								<tr>
									<td class="stock-value">
										<button class="stock-handler btn-left">&#8595</button>
										<label class="stock-label">{{ $consoleAttributesList[1] }}</label>
										<button class="stock-handler btn-right">&#8593</button>
									</td>
								</tr>
							</table>
							@if ($consoleAttributesList != $gDC[2][count($gDC[2])-1]) <!-- If not working on the last console -->
								<hr>
							@endif
						@endforeach
					</td>
					<td>
						@foreach($gDC[2] as $consoleAttributesList)
							<table class="inner-table sub-row">
								<tr>
									<td class="stock-value">
										<button class="stock-handler btn-left">&#8595</button>
										<label class="stock-label">{{ $consoleAttributesList[2] }}</label>
										<button class="stock-handler btn-right">&#8593</button>
									</td>
								</tr>
							</table>
							@if ($consoleAttributesList != $gDC[2][count($gDC[2])-1]) <!-- If not working on the last console -->
								<hr>
							@endif
						@endforeach
					</td>

				</tr>
			@endforeach
		@endisset
		
	</table>

</body>
</html>