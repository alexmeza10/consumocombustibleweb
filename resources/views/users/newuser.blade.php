@extends('layouts.dashboard')

@section('title', 'newuser')

@section('content')

<div class="content__boxed">
    <div class="content__wrap">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Nuevo usuario</h5>

                <form id="userForm" class="row g-3 needs-validation" novalidate=""
                    action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <!-- Nombre(s) -->
                    <div class="col-md-4">
                        <label for="nombre" class="form-label">Nombre(s)</label>
                        <input name="nombre" id="nombre" type="text" class="form-control" required>
                        @error('nombre')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Apellido(s) -->
                    <div class="col-md-4">
                        <label for="apellidos" class="form-label">Apellido(s)</label>
                        <input name="apellidos" type="text" class="form-control" required>
                        @error('apellidos')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Nombre de usuario -->
                    <div class="col-md-4">
                        <label for="username" class="form-label">Nombre de usuario</label>
                        <input name="username" type="text" class="form-control" required maxlength="8">
                        @error('username')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Correo -->
                    <div class="col-md-4">
                        <label for="correo" class="form-label">Correo</label>
                        <input name="correo" id="correo" type="email" class="form-control">
                        @error('correo')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Contraseña nueva -->
                    <div class="col-md-4">
                        <label for="password" class="form-label">Contraseña nueva</label>
                        <input name="password" type="password" class="form-control" required>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Repetir contraseña -->
                    <div class="col-md-4">
                        <label for="password_confirmation" class="form-label">Repetir contraseña</label>
                        <input name="password_confirmation" type="password" class="form-control" required>
                        @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Direccion -->
                    <div class="col-md-2">
                        <label for="direccion" class="form-label">Direccion (a la que pertenece el usuario)</label>
                        <input name="direccion" type="text" class="form-control">
                        @error('direccion')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Unidad -->
                    <div class="col-md-2">
                        <label for="unidad" class="form-label">Unidad (a la que pertenece el usuario)</label>
                        <input name="unidad" type="text" class="form-control">
                        @error('unidad')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Número de empleado -->
                    <div class="col-md-2">
                        <label for="num_empleado" class="form-label">Número de empleado</label>
                        <input name="num_empleado" type="text" class="form-control" required>
                        @error('num_empleado')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Extensión -->
                    <div class="col-md-2">
                        <label for="extension" class="form-label">Extensión</label>
                        <input name="extension" type="text" class="form-control">
                        @error('extension')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Tipo de perfil -->
                    <div class="col-md-2">
                        <label for="perfil" id="labelPerfil" class="form-label">Tipo de perfil</label>
                        <select id="perfilSelect" name="perfil" class="form-select" required>
                            <option selected disabled>Seleccionar...</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Usuario">Usuario</option>
                        </select>
                        @error('perfil')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Botón Crear -->
                    <div class="col-12 pt-4">
                        <button class="btn btn-warning" type="submit">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
