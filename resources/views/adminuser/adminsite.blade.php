<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Admininstrador de Empresa</title>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Admin User Styles/Adminsite Style.css') }}"/>

</head>
<body>
	
	<h1>
		The Water Level - Administrador de la Empresa
	</h1>

	<div class="option-set">
		<p>Juegos:</p>
		<div class="links">
			<a href="{{ url('/addgame') }}" class="add">Agregar</a>
			<a href="{{ url('/editgame') }}" class="edit">Editar</a>
			<a href="{{ url('/removegame') }}" class="remove">Remover</a>
		</div>
	</div>

	<div class="option-set">
		<p>Merchandising:</p>
		<div class="links">
			<a href="{{ url('/addmerch') }}" class="add">Agregar</a>
			<a href="{{ url('/editmerch') }}" class="edit">Editar</a>
			<a href="{{ url('/removemerch') }}" class="remove">Remover</a>
		</div>
	</div>

</body>
</html>