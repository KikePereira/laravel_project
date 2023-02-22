@extends('layouts.app')

@section('content')
    <div class="container text-center pb-5 bg-dark border border-white rounded-pill">
        <img src="{{ asset('img/logo_p.png') }}" width="400px">

        <h1 class="text-white">BIENVENIDO <span class="text-primary">{{ Auth::user()->nombre }} </span> <span class="text-secondary">|
                {{ Auth::user()->tipo }} </span> </h1>
    </div>

    @if (Auth::user()->tipo == 'Administrador')
        <div class="container-fluid mt-5">
            <div class="row d-flex justify-content-center">
                <!-- TAREAS -->
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Tareas</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Lista de Tareas</h6>
                        <p class="card-text">Aqui podras ver todas las Tareas paginadas, asi como ver todos sus datos,
                            modificar una Tarea, eliminarla y crear una nueva Tarea. Tambien podras ver una lista de las
                            Tareas pendientes y de las Tareas Eliminadas </p>
                        <a href="/tarea" class="btn btn-primary">Ir</a>
                    </div>
                </div>
                <!-- EMPLEADO -->
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Empleados</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Lista de Empleados</h6>
                        <p class="card-text">Aqui podras ver todos los Empleados paginados, asi como ver todos sus datos,
                            modificar un Empleado, eliminarlo y crear un nuevo Empleado. Tambien podras ver una lista de los
                            Empleados Eliminados </p>
                        <a href="/empleado" class="btn btn-primary">Ir</a>
                    </div>
                </div>
                <!-- CLIENTE -->
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Clientes</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Lista de Clientes</h6>
                        <p class="card-text">Aqui podras ver todos los Clientes paginados, asi como ver todos sus datos,
                            modificar un Cliente, eliminarlo y crear un nuevo Cliente. Tambien podras ver una lista de los
                            Clientes Eliminados </p> <br>
                        <a href="/cliente" class="btn btn-primary">Ir</a>
                    </div>
                </div>
                <!-- CUOTA -->
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Cuotas</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Lista de Cuotas</h6>
                        <p class="card-text">Aqui podras ver todos las Cuotas paginadas, asi como ver todos sus datos,
                            modificar una Cuota, eliminarla, crear una nueva Cuota y crear una Remesa Mensual de Cuotas.
                            Tambien podras ver una lista de las Cuotas Eliminados</p>
                        <a href="/cuota" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>
@endsection
