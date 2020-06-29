<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Empleado de Empresa</title>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Swap Site Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Logout Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee General Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee Site Style.css') }}"/>

</head>
<body>

	@if (Auth::user()->admin == 1)
		<a href="{{ url('/adminsite') }}" class="swap-site-btn">Ir al Sitio del<br>Administrador</a>
	@endif
	
	<a href="{{ url('/logout') }}" class="logout-btn">
		<label class="username-label">{{ Auth::user()->name }}<br></label>
		<label class="logout-label">Cerrar Sesión</label>	
	</a>

	<h1>
		The Water Level - Empleado de la Empresa
	</h1>

	<div>
		<a href="{{ url('/stockgames') }}" class="stock games">Videojuegos</a>
		<a href="{{ url('/stockmerch') }}" class="stock merch">Merchandising</a>
	</div>

</body>
</html>