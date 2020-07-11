<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Vue</title>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link href="{{ asset('css/SPA style.css') }}" rel="stylesheet">
</head>

<body>

	<div id="app">
		<example-component></example-component>
	</div>

	<script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>