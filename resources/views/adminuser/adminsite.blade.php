<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{ config('app.name', 'Laravel') }} - Admininstrador de Empresa</title>
	
</head>
<body>
	<h1>
		Administrador de Empresa
	</h1>

	<div>
		<p>Juegos:</p>
		<a href="{{ url('/addgame') }}" class="add">Agregar</a>
		<a href="{{ url('/editgame') }}" class="edit">Editar Datos</a>
		<a href="{{ url('/removegame') }}" class="remove">Remover del Catálogo</a>
	</div>

	<div>
		<p>Merchandising:</p>
		<a href="{{ url('/addmerch') }}" class="add">Agregar</a>
		<a href="{{ url('/editmerch') }}" class="edit">Editar Datos</a>
		<a href="{{ url('/removemerch') }}" class="remove">Remover del Catálogo</a>
	</div>

</body>
</html>