@extends('layouts.app')

@section('content')
    @foreach ($empleados as $empleado)
        <div class="container-fluid">
            <div class="container">
            <div class="row">
                <form action="" method="post" class="">
                    <div class="row">
                        <h4 class="fw-bold">Datos Empleado</h4>
                        <!-- DNI -->
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">DNI:</label>
                            <input type="text" class="form-control" name="Nombre"
                                placeholder="Nombre persona de contacto" value="{{ $empleado->dni }}" disabled>
                        </div>
                        <!-- Nombre -->
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="Apellido"
                                placeholder="Apellido persona de contacto" value="{{ $empleado->nombre }}" disabled>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" name="Apellido"
                                placeholder="Apellido persona de contacto" value="{{ $empleado->apellidos }}" disabled>
                        </div>
                    </div>
                    <br>
                    <!-- CONTACTO -->
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" name="Telefono"
                                placeholder="Telefono persona de contacto" value="{{ $empleado->telefono }}" disabled>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">E-mail:</label>
                            <input type="text" class="form-control" name="email"
                                placeholder="Correo Electronico persona de contacto" value="{{ $empleado->email }}"
                                disabled>
                        </div>
                    </div>
                    <br>
                    <!-- DIRECCION -->
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" name="Direccion" placeholder="Direccion"
                                value="{{ $empleado->direccion }}" disabled>
                        </div>
                    </div>
                    <br>
                    <!-- DATOS EMPLEADO -->
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Fecha Alta:</label>
                            <input type="text" class="form-control" name="fecha_alta" placeholder="fecha_alta"
                                value="{{ $empleado->fecha_alta }}" disabled>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Tipo:</label>
                            <input type="text" class="form-control" name="tipo" placeholder="tipo"
                                value="{{ $empleado->tipo }}" disabled>
                        </div>
                    </div>
                    <br>
                </form>
            </div>
        </div>
            <table class="table table-hover border bg-white caption-top"  cellspacing="0" >
                <caption>Tareas del empleado</caption>
                <thead class="table-dark">
                <tr class="">
                    <th class="text-center fw-bold">ID</th>
                    <th class="text-center fw-bold">Estado</th>
                    <th class="text-center fw-bold">Fecha Realizacion</th>
                    <th class="text-center fw-bold">Empleado</th>
                    <th class="text-center fw-bold">Cliente</th>
                    <th class="text-center fw-bold">Poblacion</th>
                    <th class="text-center fw-bold">Anotacion Inicio</th>
                    <th class="text-center fw-bold"></th>
                </tr>
            </thead>
                <tbody class="">
                    @foreach($tareas_empleado as $tarea)
                    <tr>
                        <td class="text-center fw-bold">{{$tarea->id}}</td>
                        <!-- VARIACIONES ESTADO -->
                        @if($tarea->estado == 'Pendiente')
                        <td class="bg-warning">{{$tarea->estado}}</td>
                        @elseif($tarea->estado == 'Cancelada')
                        <td class="bg-danger">{{$tarea->estado}}</td>
                        @else
                        <td class="bg-success">{{$tarea->estado}}</td>
                        @endif
                        <!--  -->
                        <td class="text-center text-nowrap">{{$tarea->fecha_realizacion}}</td>
                        <td class="text-center text-nowrap">{{$tarea->empleado->nombre}}</td>
                        <td class="text-center text-nowrap">{{$tarea->cliente->nombre}}</td>
                        <td class="text-center text-nowrap">{{$tarea->poblacion}}</td>
                        <td class="text-center">{{$tarea->anotacion_inicio}}</td>
                        <td class="text-center text-nowrap">
                            <a href="/tarea/{{$tarea->id}}"><button class="btn btn-primary">Ver</button></a>
                            <a href="/tarea/{{$tarea->id}}"><button class="btn btn-secondary">Modificar</button></a>
                            <a href="/tarea/{{$tarea->id}}"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                <div class="pagination">        
                    {{$tareas_empleado->links()}}
                </div>
        </div>
        <br>
    @endforeach
    <div class="container">
        <a href="javascript:history.back()" class="btn btn-primary form-control">Volver</a>
    </div>
    <br>

@endsection
