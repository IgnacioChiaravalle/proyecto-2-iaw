<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>The Water Level - Revisor de Stock</title>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ asset('css/SPA Style.css') }}" >
</head>

<body>

	<div id="parent-component">
		<api-token-component ref="apiTokenComponent" @token-confirmed="verifyToken"></api-token-component>
		<div v-if="visible">
			<display-all-component :api_token="api_token" @update-selected="updateSelected"></display-all-component>
			<selected-item-component :api_token="api_token" ref="selectedItemComponent"></selected-item-component>
		</div>
	</div>


	<script src="{{ asset('js/SPA_JS.js') }}" defer></script>

</body>
</html>