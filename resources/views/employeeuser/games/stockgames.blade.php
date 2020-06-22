<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Stock de Juegos</title>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Return Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee General Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee Game Style.css') }}"/>

</head>
<body>

	<a href="{{ url('/employeesite') }}">
		<img src="Company Logo.png" alt="The Water Level Logo; Retornar al Sitio Principal del Empleado" class="return-btn">
	</a>

	<h1>
		Stock de Juegos
	</h1>

	<table >
		<tr>
			<td>Juego</td>
			<td>Año de Lanzamiento</td>
			<td>Rating ESRB</td>
			<td>Precio Nuevo</td>
			<td>Precio Usado</td>
			<td>Desarrolladores</td>
			<td>Consola</td>
			<td>Copias Nuevas</td>
			<td>Copias Usadas</td>
		</tr>

		@isset ($gameDevsConsoles)
			@foreach ($gameDevsConsoles as $gDC)
				<tr>

					@foreach ($gDC[0] as $gameAttribute) <!-- Fill all game attributes -->
						@if ($gameAttribute != null)
							<td>{{ $gameAttribute }}</td>
						@else
							<td>No Disponible</td>
						@endif
					@endforeach

					<td>
						<table>
							@foreach ($gDC[1] as $devOfGame) <!-- Write each developer in a separate row -->
								<tr>
									<td>{{ $devOfGame }}</td>
								</tr>	
							@endforeach
						</table>
					</td>
					
					<td>
						@foreach($gDC[2] as $consoleAttributesList)
							<table>
								<tr>
									<td>{{ $consoleAttributesList[0] }}</td>
								</tr>
							</table>
						@endforeach
					</td>
					<td>
						@foreach($gDC[2] as $consoleAttributesList)
							<table>
								<tr>
									<td>{{ $consoleAttributesList[1] }}</td>
								</tr>
							</table>
						@endforeach
					</td>
					<td>
						@foreach($gDC[2] as $consoleAttributesList)
							<table>
								<tr>
									<td>{{ $consoleAttributesList[2] }}</td>
								</tr>
							</table>
						@endforeach
					</td>

				</tr>
			@endforeach
		@endisset
		
	</table>

</body>
</html>