<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Vue</title>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link href="{{ asset('css/SPA Style.css') }}" rel="stylesheet">
</head>

<body>

	<div id="display-all">
		<display-all-component @update-selected="updateSelected"></display-all-component>
		<selected-item-component ref="selected"></selected-item-component>
	</div>


	<script src="{{ asset('js/SPA_JS.js') }}" defer></script>

</body>
</html>