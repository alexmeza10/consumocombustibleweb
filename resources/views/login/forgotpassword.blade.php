@extends('layouts.app')

@section('title', 'Recuperar Contraseña')

@section('content')
    <div class="text-center">
        <h1 class="h3">Recuperar Contraseña</h1>
        <p>Ingresa tu dirección de correo electrónico institucional para recuperar tu contraseña</p>
    </div>

    <form id="resetForm" class="mt-4" action="{{ route('password.reset') }}" method="POST">
        @csrf
        <div class="mb-3">
            <input type="email" id="emailInput" name="email" class="form-control" placeholder="Correo institucional"
                autofocus required>
        </div>

        <div id="emailError" class="text-danger"></div>
        <div class="d-grid mt-3">
            <button class="btn btn-warning btn-lg" type="button" onclick="validateEmail()">Reiniciar contraseña</button>
        </div>
    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}" class="btn-link text-decoration-none">Regresar al inicio</a>
    </div>


@endsection
