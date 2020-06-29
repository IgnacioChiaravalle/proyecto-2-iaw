<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>The Water Level - Stock de Merchandising</title>
	<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
	<script src = "{{ url('/js/SubmitEnabler.js') }}" type = "text/javascript"></script>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Document Style.css') }}">
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Label - Invalid Feedback Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Return Button Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee General Style.css') }}"/>
	<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/Employee User Styles/Employee Stock Merch Style.css') }}"/>

</head>
<body>

	@if (Session::has('message'))
		<script type="text/javascript">alert("{{ Session::get('message') }}");</script>
	@endif

	<a href="{{ url('employeesite') }}">
		<img src="../../../../Company Logo.png" alt="The Water Level Logo; Retornar al Sitio Principal del Empleado" class="return-btn">
	</a>

	<a href="{{ url('/stockmerch') }}">
		<h1>Stock de Merchandising</h1>
	</a>

	<?php $id = $_SERVER['REQUEST_URI']; ?>
	<form method="POST" action="{{url('searchmerch')}}" enctype="multipart/form-data">
		@csrf
		<div class="search-div">
			<label for="nombre" class="search-label">Buscá acá el Nombre de un Artículo de Merchandising:</label>
			<div>
				<input id="nombre" type="text" class="{{old('nombre') ? 'active-field' : 'default-field'}}" name="nombre" value="{{old('nombre')}}" placeholder="Nombre de un Artículo" required autocomplete="nombre" onkeypress="clearFieldIfDefault(this); activateField(this); enable('{{ $id }}')" onclick="clearFieldIfDefault(this); activateField(this); enable('{{ $id }}')">
				@error('nombre')
					<label class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</label>
				@enderror
			</div>
		</div>	
		<button type="submit" id="{{ $id }}" class="submit disabled-submit" disabled="disabled">
			BUSCAR
		</button>
	</form>

	<?php
		$remove = "/-1";
		$add = "/1";
		$bar = "/";
	?>

	<table class="main-table">
		<tr class="table-header-row">
			<td class="table-header-cell">Nombre del Artículo</td>
			<td class="table-header-cell">Descripción</td>
			<td class="table-header-cell">Multimedia de Origen</td>
			<td class="table-header-cell">Unidades Disponibles</td>
			<td class="table-header-cell">Precio Unitario</td>
			<td class="table-header-cell">Categorías del Artículo</td>
		</tr>

		@isset ($itemCategories)
			@foreach ($itemCategories as $iC)
				<tr class="table-inner-row">
					
					<?php $url = "stockmerch/getfullmerchdata/" . $iC[0][0]; ?>
					<td class="attribute clickable" onclick="location.href='{{ $bar . $url }}'">{{ $iC[0][0] }}</td> <!-- Name of Merch Item -->

					<td class="attribute">{{ $iC[0][1] }}</td> <!-- Description -->

					<?php $url = "stockmerch/filterbyoriginmedia/" . $iC[0][2]; ?>
					<td class="attribute clickable" onclick="location.href='{{ $bar . $url }}'">{{ $iC[0][2] }}</td> <!-- Origin Media -->

					<?php $url = "changemerchstock/" . $iC[0][0]; ?>
					<td class="attribute stock-value">
						<div>
							<button class="stock-handler btn-left" onclick="location.href='{{ $bar . $url . $remove }}'">&#8595</button>
							<label class="stock-label">{{ $iC[0][3] }}</label>
							<button class="stock-handler btn-right" onclick="location.href='{{ $bar . $url . $add }}'">&#8593</button>
						</div>
					</td>

					<?php $url = "stockmerch/filterbyprice/" . floor($iC[0][4]) . "/" . (($iC[0][4] - floor($iC[0][4])) * 100); ?>
					<td class="attribute clickable" onclick="location.href='{{ $bar . $url }}'">{{ $iC[0][4] }}</td> <!-- Price -->

					<td>
						@foreach ($iC[1] as $category) <!-- Write each category in a separate row -->
							<?php $url = "stockmerch/filterbycategory/" . $category; ?>
							<table class="inner-table sub-row">
								<tr>
									<td class="clickable" onclick="location.href='{{ $bar . $url }}'">{{ $category }}</td>
								</tr>
							</table>
							@if ($category != $iC[1][count($iC[1])-1]) <!-- If not working on the last category -->
								<hr>
							@endif
						@endforeach
					</td>
					
				</tr>
			@endforeach
		@endisset
		
	</table>

</body>
</html>