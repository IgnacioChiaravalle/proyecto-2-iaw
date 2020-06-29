<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Stock de Juegos</title>
	<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
	<script src = "{{ url('/js/SubmitEnabler.js') }}" type = "text/javascript"></script>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Return Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee General Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee Full Merch Data Style.css') }}"/>
	
</head>
<body>

	@if (Session::has('message'))
		<script type="text/javascript">alert("{{ Session::get('message') }}");</script>
	@endif

	<?php
		$remove = "/-1";
		$add = "/1";
		$bar = "/";
	?>

	<a href="{{ url('stockmerch') }}">
		<img src="../../../../Company Logo.png" alt="The Water Level Logo; Retornar al Sitio de Stock de Merchandising" class="return-btn">
	</a>
	<h1>Información de {{ $merchItem->name }}</h1>

	<div class="attributes">
		<p id="origin-media">
			<label class="full-data attribute-name">Multimedia de Origen:&nbsp</label>
			<label class="full-data attribute-value">{{ $merchItem->origin_media }}</label>
		</p>
		<p id="stock">
			<?php $url = "changemerchstock/" . $merchItem->name; ?>
			<label class="full-data attribute-name">Unidades Disponibles:&nbsp</label>
			<label class="full-data attribute-value">{{ $merchItem->stock }}</label>
			<button class="full-data-stock-btn btn-left" onclick="location.href='{{ $bar . $url . $remove }}'">-</button>
			<button class="full-data-stock-btn btn-right" onclick="location.href='{{ $bar . $url . $add }}'">+</button>
		</p>
		<p class="price">
			<label class="full-data attribute-name">Precio Unitario:&nbsp</label>
			<label class="full-data attribute-value">{{ $merchItem->price }}&nbsp</label>
			<img src="../../../../Coin.png" alt="Moneda" class="coin">
		</p>
	</div>

	<div class="photo-div">
		<label for="photo" class="full-data attribute-name stored-image-label">Foto del Artículo:<br></label>
		<img name="photo" src="data:image/*;base64, {{ $merchItem->photo }}" alt="Foto del Artículo" class="stored-image">
	</div>

	<div class="after-images description">
		<label class="full-data attribute-name">Descripción del Artículo:<br></label>
		<label class="full-data attribute-value">{{ $merchItem->description }}</label>
	</div>

	<div class="categories">
		<label for="categories-list" class="full-data attribute-name">Categorías:</label>
		<ul name="categories-list">
			@foreach ($categories as $category)
				<?php $url = "/stockmerch/filterbycategory/" . $category; ?>
				<a href="{{ $url }}" class="category-filter">
					<li>{{ $category }}</li>
				</a>
			@endforeach
		</ul>
	</div>

	@if ($found)
		<a href="../../stockgames/getfullgamedata/{{ $merchItem->origin_media }}" class="view-related-sales">Ir a la Página de {{ $merchItem->origin_media }}</a>
	@endif

</body>
</html>