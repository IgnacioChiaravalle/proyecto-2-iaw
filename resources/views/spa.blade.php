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
		<display-all-component></display-all-component>
	</div>
	<div id="selected-item">
		<selected-item-component :item-type="itemType" :item-name="itemName" v-on:update-selected="updateSelected"></selected-item-component>
	</div>


	<script src="{{ asset('js/SPA_JS.js') }}" defer></script>

</body>
</html>