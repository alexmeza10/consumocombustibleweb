@extends('layouts.dashboard')

@section('title', 'adminuser')

@section('content')

    <div class="card">
        <div class="card-header -4 mb-3">
            <h5 class="card-title mb-3">Lista de usaurios</h5>
            <div class="row">
                <!-- Left toolbar -->
                <div class="col-md-6 d-flex gap-1 align-items-center mb-3">
                    <a href="{{ route('user.newuser') }}" class="btn btn-warning hstack gap-2 align-self-center">
                        <i class="demo-psi-add fs-5"></i>
                        <span class="vr"></span>
                        Crear nuevo usuario
                    </a>
                </div>
                <!-- END : Left toolbar -->
                <div class="col-md-6 d-flex gap-1 align-items-right justify-content-md-end mb-3">
                    <form action="{{ route('users.search') }}" method="GET" class="d-flex align-items-center">
                        <div class="form-group mb-0 me-1">
                            <input type="text" name="search" placeholder="Buscar..." class="form-control" autocomplete="off">
                        </div>
                        <div class="btn-group mb-0">
                            <button class="btn btn-warning">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsove">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Num. de usuario</th>
                            <th>Nombre completo</th>
                            <th>Nombre de usuario</th>
                            <th>Fecha de modificacion</th>
                            <th>Perfil</th>
                            <th>Estatus</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->id_usuario }}</td>
                                <td>{{ $usuario->nombrecompleto }}</td>
                                <td>{{ $usuario->username }}</td>
                                <td>{{ $usuario->updated_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $usuario->perfil }}</td>
                                <td class="fs-5">
                                    @if ($usuario->verificado)
                                        <div class="badge d-block badge bg-success">Verificado</div>
                                    @else
                                        <div class="badge d-block badge bg-danger">No verificado</div>
                                    @endif
                                </td>
                                <td class="text-center text-nowrap">
                                    <a class="btn btn-icon btn-sm btn-warning btn-hover" href="#"><i
                                            class="demo-pli-pen-5 fs-5"></i></a>
                                    <a class="btn btn-icon btn-sm btn-warning btn-hover" href="#"><i
                                            class="demo-pli-trash fs-5"></i></a>
                                    <a class="btn btn-icon btn-sm btn-warning btn-hover" href="#"><i
                                            class="demo-pli-unlock fs-5"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
