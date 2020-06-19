@extends('layouts.app')
<title>The Water Level - Recuperar Contraseña</title>
<script src = "{{ url('/js/InputFieldClassHandler.js') }}" type = "text/javascript"></script>
<script src = "{{ url('/js/SubmitEnabler.js') }}" type = "text/javascript"></script>
<link rel = "stylesheet" type = "text/css" href = "{{ url('/css/User Auth Styles/Password Recovery Style.css') }}"/>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>Recuperá tu<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspContraseña</h1>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Ingresá tu dirección de e-mail para que podamos enviarte el Link de Recuperación:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="default-field form-control @error('email') is-invalid @enderror" value="Dirección de Correo Electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" onselect = "clearFieldIfDefault(this); activateField(this); enable('submit-btn-restore-password')" onclick="clearFieldIfDefault(this); activateField(this); enable('submit-btn-restore-password')">

                                @error('email')
                                    <label class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </label>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="submit-btn-restore-password" class="disabled-submit" disabled="disabled">
                                    Enviar Link de Recuperación
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
