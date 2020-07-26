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
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee Full Game Data Style.css') }}"/>
	
</head>
<body>

	@if (Session::has('message'))
		<script type="text/javascript">alert("{{ Session::get('message') }}");</script>
	@endif

	<?php
		$remove = "/-1";
		$add = "/1";
		$bar = "/";
		$used = "/used";
		$new = "/new";
	?>

	<a href="{{ url('stockgames') }}">
		<img src="../../../../Company Logo.png" alt="The Water Level Logo; Retornar al Sitio de Stock de Videojuegos" class="return-btn">
	</a>
	<h1>Información de {{ $game->name }}</h1>

	<div class="attributes">
		<p id="year">
			<label class="full-data attribute-name">Año de Lanzamiento:&nbsp</label>
			<label class="full-data attribute-value">{{ $game->release_year }}</label>
		</p>
		<p id="esrb">
			<label class="full-data attribute-name">Rating ESRB:&nbsp</label>
			@if ($game->esrb_rating != null)
				<label class="full-data attribute-value">{{ $game->esrb_rating }}</label>
			@else
				<label class="full-data attribute-value">No Disponible</label>
			@endif
		</p>
		<div class="prices">
			<p>
				<label class="full-data attribute-name">Precio de las Copias Nuevas:&nbsp</label>
				<label class="full-data attribute-value">{{ $game->price_new }}&nbsp</label>
				<img src="../../../../Coin.png" alt="Moneda" class="coin">
			</p>
			<p>
				<label class="full-data attribute-name">Precio de las Copias Usadas:&nbsp</label>
				<label class="full-data attribute-value">{{ $game->price_used }}</label>
				<img src="../../../../Coin.png" alt="Moneda" class="coin">
			</p>
		</div>
	</div>

	<div class="covers-div">
		<div class="cover-item cover-item-left">
			<label for="cover" class="full-data attribute-name stored-image-label">Portada:<br></label>
			<img name="cover" src="data:image/*;base64, {{ $game->cover }}" alt="Portada del Juego" class="stored-image">
		</div>
		<div class="cover-item cover-item-right">
			<label for="countercover" class="full-data attribute-name stored-image-label">Contraportada:<br></label>
			@if ($game->counter_cover != null)
				<img name="countercover" src="data:image/*;base64, {{ $game->counter_cover }}" alt="Contraportada del Juego" class="stored-image">
			@else
				<img name="countercover" src="../../../../Image Not Available.png" alt="Contraportada del Juego" class="stored-image">
			@endif
		</div>
	</div>

	<div class="after-images devs-and-consoles">
		<div class="devs">
			<label for="devs-list" class="full-data attribute-name">Desarrolladores:</label>
			<ul name="devs-list">
				@foreach ($devs as $dev)
					<li class="first-level-list">{{ $dev }}</li>
				@endforeach
			</ul>
		</div>
		<div class="consoles">
			<label for="consoles-list" class="full-data attribute-name">Disponibilidad en Consolas:</label>
			<ul name="consoles-list">
				@foreach ($consoles as $consoleAttributesList)
					<li class="first-level-list">{{ $consoleAttributesList[0] }}</li>
					<ul class="console-prices">
						<li class="second-level-list">
							<?php $url = "changegamestock/" . $game->name . "/" . $consoleAttributesList[0]; ?>
							Copias Nuevas: {{ $consoleAttributesList[1] }}&nbsp&nbsp
							<button class="full-data-stock-btn" onclick="location.href='{{ $bar . $url . $new . $remove }}'">-</button>
							<button class="full-data-stock-btn" onclick="location.href='{{ $bar . $url . $new . $add }}'">+</button>
						</li>
						<li class="second-level-list">
							Copias Usadas: {{ $consoleAttributesList[2] }}&nbsp&nbsp
							<button class="full-data-stock-btn" onclick="location.href='{{ $bar . $url . $used . $remove }}'">-</button>
							<button class="full-data-stock-btn" onclick="location.href='{{ $bar . $url . $used . $add }}'">+</button>
						</li>
					</ul>
				@endforeach
			</ul>
		</div>
	</div>

	@if ($found)
		<a href="../../stockmerch/filterbyoriginmedia/{{ $game->name }}" class="view-related-sales">Ver Merchandising de {{ $game->name }}</a>
	@endif

</body>
</html>