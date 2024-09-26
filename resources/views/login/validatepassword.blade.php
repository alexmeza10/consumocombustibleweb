@extends('layouts.app')

@section('title', 'Cambiar Contraseña')

@section('content')
    <div class="text-center">
        <h1 class="h3">Cambio de Contraseña</h1>
        <p>Ingresa tu nueva contraseña</p>
    </div>

    <form id="changePasswordForm" class="mt-2">
        @csrf

        <div class="mb-3">
            <label for="newPasswordInput" class="form-label">Contraseña nueva</label>
            <input id="newPasswordInput" type="password" class="form-control" minlength="8" required>
        </div>

        <div class="mb-3">
            <label for="confirmPasswordInput" class="form-label">Repetir contraseña</label>
            <input id="confirmPasswordInput" type="password" class="form-control" minlength="8" required>
        </div>

        <div id="passwordMatchError" class="text-danger"></div>

        <div class="mt-4 text-center">
           <!-- <button type="button" class="btn btn-warning btn-lg" onclick="changePassword()" id="changePasswordBtn" disabled>Cambiar contraseña</button>-->
            <a type="button" class="btn btn-warning btn-lg" href="{{ route('password.change') }}">Cambiar contraseña</a>
        </div>
    </form>

    <script>
        const newPasswordInput = document.getElementById('newPasswordInput');
        const confirmPasswordInput = document.getElementById('confirmPasswordInput');
        const changePasswordBtn = document.getElementById('changePasswordBtn');
        const passwordMatchError = document.getElementById('passwordMatchError');

        newPasswordInput.addEventListener('input', validatePasswordFields);
        confirmPasswordInput.addEventListener('input', validatePasswordFields);

        function validatePasswordFields() {
            const newPassword = newPasswordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            if (newPassword !== '' && confirmPassword !== '') {
                if (newPassword === confirmPassword) {
                    passwordMatchError.textContent = '';
                    changePasswordBtn.disabled = false;
                } else {
                    passwordMatchError.textContent = 'Las contraseñas no coinciden';
                    changePasswordBtn.disabled = true;
                }
            } else {
                passwordMatchError.textContent = '';
                changePasswordBtn.disabled = true;
            }
        }

        function changePassword() {
            document.getElementById('changePasswordForm').submit();
        }
    </script>
@endsection
