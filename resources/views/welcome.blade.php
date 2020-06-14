<!DOCTYPE html>
<html>
	<head>
		<title>The Water Level - Login</title>
		<script src = "{{ url('/js/CheckUser.js') }}" type = "text/javascript"></script>
		<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}"/>
		<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Welcome Style.css') }}"/>
	</head>

	<body>
		<h1>
			¡¡Bienvenido al Administrador de Stock de<br>
			The Water Level!!
		</h1>
        <form method="POST" action="{{ url('redirect.blade.php') }}">
			<label id="description">Por favor, ingrese sus datos de usuario para continuar:</label><br>
			<label for="username">Nombre de Usuario:</label><br>
			<input type="text" id="username" class="default-field" value="Usuario" onselect = "clearFieldIfDefault(this)" onclick="clearFieldIfDefault(this)"><br>
			<label for="password">Contraseña:</label><br>
			<input type="text" id="password" class="default-field" value="Contraseña" onselect = "clearFieldIfDefault(this); swapType(this)" onclick="clearFieldIfDefault(this); swapType(this)"><br><br>
			<input type="submit" class="submit disabled-submit" id="submit-btn" value="Confirmar" disabled="disabled">
		</form>
	</body>
</html>
