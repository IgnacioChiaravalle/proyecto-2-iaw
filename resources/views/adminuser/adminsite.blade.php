<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Admininstrador de Empresa</title>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Swap Site Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Logout Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Admin General Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Admin Site Style.css') }}"/>

</head>
<body>
	
	<a href="{{ url('/employeesite') }}" class="swap-site-btn">Ir al Sitio del<br>Empleado</a>

	<a href="{{ url('/logout') }}" class="logout-btn">
		<label class="username-label">{{ Auth::user()->name }}<br></label>
		<label class="logout-label">Cerrar Sesión</label>	
	</a>
	
	<h1>
		The Water Level - Administrador de la Empresa
	</h1>

	<div class="option-set">
		<p>Juegos:</p>
		<div class="links">
			<a href="{{ url('/addgame') }}" class="crud add">Agregar</a>
			<a href="{{ url('/editgame') }}" class="crud edit">Editar</a>
			<a href="{{ url('/removegame') }}" class="crud remove">Remover</a>
		</div>
	</div>

	<div class="option-set">
		<p>Merchandising:</p>
		<div class="links">
			<a href="{{ url('/addmerch') }}" class="crud add">Agregar</a>
			<a href="{{ url('/editmerch') }}" class="crud edit">Editar</a>
			<a href="{{ url('/removemerch') }}" class="crud remove">Remover</a>
		</div>
	</div>

</body>
</html>