@extends('layouts.dashboard')

@section('title', 'menu')

@section('content')

    <div class="content__wrap order-2 flex-fill min-w-0">
        <div class="row">
            <div class="col-xl-6">
                <h3>Sistema de registro en el consumo de combustible</h3>
            </div>
            <div class="col-xl-5">
                <div class="row g-sm-1 mb-3">
                    <div class="col-sm-6">
                        <div class="card bg-primary text-white mb-1 mb-xl-1">
                            <div class="p-3 text-center">
                                <span class="display-5">1</span>
                                <p>Ingersados</p>
                            </div>
                        </div>
                        <div class="card bg-warning text-white mb-1 mb-xl-1">
                            <div class="p-3 text-center">
                                <span class="display-5">0</span>
                                <p>Pendientes</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card bg-info text-white mb-1 mb-xl-1">
                            <div class="p-3 text-center">
                                <span class="display-5">1</span>
                                <p>Terminados</p>
                            </div>
                        </div>
                        <div class="card bg-success text-white mb-1 mb-xl-1">
                            <div class="p-3 text-center">
                                <span class="display-5">0</span>
                                <p>En proceso</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-11">
                <div class="card">
                    <div class="card-header -4 mb-3">
                        <h5 class="card-title mb-3">Lista de registros</h5>
                        <div class="row">
                            <div class="col-md-6 d-flex gap-1 align-items-center mb-3">
                                <a href="{{ route('newrecord') }}" class="btn btn-warning hstack gap-2 align-self-center">
                                    <i class="demo-psi-add fs-5"></i>
                                    <span class="vr"></span>
                                    Crear reporte
                                </a>
                            </div>
                            <div class="col-md-6 d-flex gap-1 align-items-center justify-content-md-end mb-3">
                                <div class="form-group">
                                    <input type="text" placeholder="Buscar..." class="form-control" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsove">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Hora de inicio</th>
                                        <th>Hora final</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a class="btn-link" href="#"> 00001</a></td>
                                        <td><a class="btn-link" href="#"> Alejandro Meza </a></td>
                                        <td>12/12/2024 14:32</td>
                                        <td>12/12/2024 16:13</td>
                                        <td class="fs-5">
                                            <div class="badge d-block bg-success">Terminado</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
