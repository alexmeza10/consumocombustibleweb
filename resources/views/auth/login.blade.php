

<form class="js-validation-signin" action="{{ route('login.auth') }}" method="POST">
    @csrf
    <div class="text-center">
        <h1 class="h3">Bienvenido</h1>
        <p>Inicio de sesión</p>
    </div>

    <div class="form-group form-group--float w-100">
        <label>Email</label>
        <input type="email" name="email" class="form__email form-control" required>
    </div>

    <div class="form-group form-group--float w-100 mt-4">
        <label>Contraseña</label>
        <input type="password" name="password" class="form__password form-control" required>
    </div>

    @if (Session::has('danger'))
        <div class="alert alert-danger alert-dismissible " role="alert">
            {{ Session::get('danger') }}
        </div>
    @endif

    @if (Session::has('sesionCerrada'))
        <div class="alert alert-info alert-dismissible " role="alert">
            {{ Session::get('sesionCerrada') }}
        </div>
    @endif

    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-warning btn-lg">Acceder</button>
    </div>
</form>

<div class="text-center mt-3">
    <a href="{{ route('password.request') }}" class="btn-link text-decoration-none">Olvidé mi contraseña</a>
</div>

@endsection
