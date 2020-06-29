<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Stock de Juegos</title>
	<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
	<script src = "{{ url('/js/SubmitEnabler.js') }}" type = "text/javascript"></script>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Return Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee General Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee Stock Game Style.css') }}"/>
	
</head>
<body>

	@if (Session::has('message'))
		<script type="text/javascript">alert("{{ Session::get('message') }}");</script>
	@endif

	<a href="{{ url('employeesite') }}">
		<img src="../../../../Company Logo.png" alt="The Water Level Logo; Retornar al Sitio Principal del Empleado" class="return-btn">
	</a>

	<a href="{{ url('/stockgames') }}">
		<h1>Stock de Juegos</h1>
	</a>

	<?php $id = $_SERVER['REQUEST_URI']; ?>
	<form method="POST" action="{{url('searchgame')}}" enctype="multipart/form-data">
		@csrf
		<div class="search-div">
			<label for="nombre" class="search-label">Buscá acá el Nombre de un Juego:</label>
			<div>
				<input id="nombre" type="text" class="{{old('nombre') ? 'active-field' : 'default-field'}}" name="nombre" value="{{old('nombre')}}" placeholder="Nombre de un Juego" required autocomplete="nombre" onkeypress="clearFieldIfDefault(this); activateField(this); enable('{{ $id }}')" onclick="clearFieldIfDefault(this); activateField(this); enable('{{ $id }}')">
				@error('nombre')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>	
		<button type="submit" id="{{ $id }}" class="submit disabled-submit" disabled="disabled">
			BUSCAR
		</button>
	</form>

	<?php
		$remove = "/-1";
		$add = "/1";
		$bar = "/";
		$used = "/used";
		$new = "/new";
	?>

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
					
					<?php $url = "stockgames/getfullgamedata/" . $gDC[0][0]; ?>
					<td class="attribute clickable" onclick="location.href='{{ $bar . $url }}'">{{ $gDC[0][0] }}</td> <!-- Name of Game -->

					<?php $url = "stockgames/filterbyyear/" . $gDC[0][1]; ?>
					<td class="attribute clickable" onclick="location.href='{{ $bar . $url }}'">{{ $gDC[0][1] }}</td> <!-- Release Year -->
					
					@if ($gDC[0][2] != null) <!-- ESRB Rating -->
						<?php $url = "stockgames/filterbyesrb/" . $gDC[0][2]; ?>
						<td class="attribute clickable" onclick="location.href='{{ $bar . $url }}'">{{ $gDC[0][2] }}</td>
					@else
						<?php $url = "stockgames/filterbyesrb/null"; ?>
						<td class="attribute clickable" onclick="location.href='{{ $bar . $url }}'">No Disponible</td>
					@endif

					<?php $url = "stockgames/filterbynewprice/" . floor($gDC[0][3]) . "/" . (($gDC[0][3] - floor($gDC[0][3])) * 100); ?>
					<td class="attribute clickable" onclick="location.href='{{ $bar . $url }}'">{{ $gDC[0][3] }}</td> <!-- Price of New Copies -->

					<?php $url = "stockgames/filterbyusedprice/" . floor($gDC[0][4]) . "/" . (($gDC[0][4] - floor($gDC[0][4])) * 100); ?>
					<td class="attribute clickable" onclick="location.href='{{ $bar . $url }}'">{{ $gDC[0][4] }}</td> <!-- Price of Used Copies -->

					<td>
						@foreach ($gDC[1] as $devOfGame) <!-- Write each developer in a separate row -->
							<?php $url = "stockgames/filterbydeveloper/" . $devOfGame; ?>
							<table class="inner-table sub-row">
								<tr>
									<td class="clickable" onclick="location.href='{{ $bar . $url }}'">{{ $devOfGame }}</td>
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
								<?php $url = "stockgames/filterbyconsole/" . $consoleAttributesList[0]; ?>
								<tr>
									<td class="clickable" onclick="location.href='{{ $bar . $url }}'">{{ $consoleAttributesList[0] }}</td>
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
								<?php $url = "changegamestock/" . $gDC[0][0] . "/" . $consoleAttributesList[0]; ?>
								<tr>
									<td class="stock-value">
										<div>	
											<button class="stock-handler btn-left" onclick="location.href='{{ $bar . $url . $new . $remove }}'">&#8595</button>
											<label class="stock-label">{{ $consoleAttributesList[1] }}</label>
											<button class="stock-handler btn-left" onclick="location.href='{{ $bar . $url . $new . $add }}'">&#8593</button>
										</div>
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
								<?php $url = "changegamestock/" . $gDC[0][0] . "/" . $consoleAttributesList[0]; ?>
								<tr>
									<td class="stock-value">
										<div>
											<button class="stock-handler btn-left" onclick="location.href='{{ $bar . $url . $used . $remove }}'">&#8595</button>
											<label class="stock-label">{{ $consoleAttributesList[2] }}</label>
											<button class="stock-handler btn-left" onclick="location.href='{{ $bar . $url . $used . $add }}'">&#8593</button>
										</div>
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