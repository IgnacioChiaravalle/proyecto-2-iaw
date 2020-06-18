@extends('layouts.app')
<title>The Water Level - Register</title>
<script src = "{{ url('/js/CheckboxEnabledChecker.js') }}" type = "text/javascript"></script>
<link href = "{{ url('/css/Register Style.css') }}" rel = "stylesheet">

@section('content')
<div class="container">
	<a href="{{ url('/') }}">
		<img src="Company Logo.png" alt="The Water Level Logo">
	</a>

	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">

				<div class="card-body">
					<form method="POST" action="{{ route('register') }}">
						@csrf

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">Nombre:</label>

							<div class="col-md-6">
								<input id="name" type="text" class="active-field form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

								@error('name')
									<label class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</label>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">E-Mail:</label>

							<div class="col-md-6">
								<input id="email" type="email" class="active-field form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

								@error('email')
									<label class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</label>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>

							<div class="col-md-6">
								<input id="password" type="password" class="active-field form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

								@error('confirm_password')
									<label class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</label>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar&nbsp&nbsp&nbsp&nbspPassword:</label>
							
							<div class="col-md-6">
								<input id="password-confirm" type="password" class="active-field form-control" name="password_confirmation" required autocomplete="new-password">
								@error('password')
									<label class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</label>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<div class="form-check">
								<label class="form-check-label" for="admin-user">¿Es un Administrador de Empresa?</label>
								<input class="form-check-input-admin-user" type="checkbox" name="admin_user" id="admin-user" {{ old('admin-user') ? 'checked' : '' }} onclick="enableOrDisableField('.form-check-input-admin-user', 'admin-password-confirm')">
							</div>
							<input class="default-field" type="text" name="admin_password_confirm" id="admin-password-confirm" value="Password de Administrador de Empresa" required>
							<script type="text/javascript">
								enableOrDisableField('.form-check-input-admin-user', 'admin-password-confirm')
							</script>
							@if (old('admin-user'))
								@error('admin_password')
									<label class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</label>
								@enderror
							@endif
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									REGISTRARSE
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
