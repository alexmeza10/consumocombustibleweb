@extends('layouts.app')

@section('title', 'Validar Pin')

@section('content')
    <div class="text-center">
        <h1 class="h3">Validar PIN</h1>
        <p>Ingresa el código de 4 dígitos que recibiste al correo ingresado</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="pinForm" action="{{ route('change.password') }}" method="POST">
                @csrf
                <div class="mb-3 text-center">
                    <input type="text" name="pin" id="pinInput" class="form-control text-center" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/g, ''); toggleButton()">
                </div>
            </form>
        </div>
    </div>

    <div class="mt-2 text-center">
        <button id="submitButton" class="btn btn-warning btn-lg" type="button" onclick="validatePin()" disabled>Validar</button>
    </div>

    <script>
        function validatePin() {
            const pinInput = document.getElementById('pinInput');
            const pinValue = pinInput.value.trim();

            if (pinValue.length !== 4 || isNaN(pinValue)) {
                alert('El PIN debe contener exactamente 4 dígitos numéricos.');
                return;
            }

            document.getElementById('pinForm').submit();
        }

        function toggleButton() {
            const pinInput = document.getElementById('pinInput');
            const submitButton = document.getElementById('submitButton');

            if (pinInput.value.length === 4) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
    </script>
@endsection
