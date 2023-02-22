@extends('layouts.app')

@section('content')
    @foreach ($tareas as $tarea)
        <div class="container">
            <div class="row">

                <form action="" method="post" class="">
                    <!-- PERSONAL -->
                    <h4 class="fw-bold">Contacto</h4>
                    <div class="row">

                        <!-- NOMBRE -->
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="Nombre"
                                placeholder="Nombre persona de contacto" value="{{ $tarea->nombre }}" disabled>
                        </div>
                        <!-- APELLIDO -->
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" name="Apellido"
                                placeholder="Apellido persona de contacto" value="{{ $tarea->apellidos }}" disabled>
                        </div>
                    </div>
                    <br>
                    <!-- CONTACTO -->
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" name="Telefono"
                                placeholder="Telefono persona de contacto" value="{{ $tarea->telefono }}" disabled>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">E-mail:</label>
                            <input type="text" class="form-control" name="Correo"
                                placeholder="Correo Electronico persona de contacto" value="{{ $tarea->correo }}" disabled>
                        </div>
                    </div>
                    <br>
                    <!-- DESCRIPCION -->
                    <h4 class="fw-bold">Descripcion</h4>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label"> Descripcion:</label>
                            <textarea class="form-control"
                                placeholder="Escribe aqui las anotaciones que creas necesarias para guiar y ayudar a los operarios."
                                name="Descripcion" disabled>{{ $tarea->descripcion }}</textarea>
                        </div>
                    </div>
                    <br>
                    <!-- DIRECCION -->
                    <h4 class="fw-bold">Direccion</h4>
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <label for="" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" name="Direccion" placeholder="Direccion"
                                value="{{ $tarea->direccion }}" disabled>
                        </div>
                        <div class="col-12 col-lg-5">
                            <label for="" class="form-label">Codigo Postal:</label>
                            <input type="text" class="form-control" name="Codigo_postal" placeholder="Codigo Postal"
                                value="{{ $tarea->zip }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Poblacion:</label>
                            <input type="text" class="form-control" name="Poblacion" placeholder="Poblacion"
                                value="{{ $tarea->poblacion }}" disabled>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Provincia:</label>
                            <input type="text" class="form-control" name="Provincia" placeholder="Provincia"
                                value="{{ $tarea->provincia }}" disabled>
                        </div>
                    </div>
                    <br>
                    <!-- EMPLEADO Y CLIENTE-->
                    <div class="row">
                        <!-- EMPLEADO -->
                        <div class="col-lg-6">
                            <br>
                            <h4 class="fw-bold">Empleado</h4>
                            <label for="" class="form-label">Empleado:</label>
                            @if(isset($tarea->empleado) && !is_null($tarea->empleado) && !is_null($tarea->empleado->nombre))
                            <input type="text" class="form-control" name="Empleado" placeholder="Empleado asignado"
                                value="{{ $tarea->empleado->nombre }}" disabled>
                                <br>
                            <a href="{{ url('/empleado') }}/{{$tarea->empleado->id}}" class="btn btn-secondary">Ver empleado</a>
                            @else
                            <input type="text" class="form-control text-danger" name="Empleado" placeholder="Empleado asignado"
                                value="Empleado Eliminado" disabled>
                            @endif
                        </div>


                        <!-- CLIENTE -->
                        <div class="col-lg-6">
                            <br>
                            <h4 class="fw-bold">Cliente</h4>
                            <label for="" class="form-label">Cliente:</label>
                            <input type="text" class="form-control" name="Cliente" placeholder="Cliente asignado"
                                value="{{ $tarea->cliente->nombre }}" disabled>
                                <br>
                                <a href="{{ url('/cliente') }}/{{$tarea->cliente->id}}" class="btn btn-secondary">Ver cliente</a>

                        </div>
                    </div>
                    <!-- FECHAS -->
                    <br>
                    <h4 class="fw-bold">Fecha</h4>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Fecha Realizacion:</label>
                            <input type="text" class="form-control" name="Fecha_creacion"
                                placeholder="Fecha_creacion" value="{{ $tarea->fecha_realizacion }}" disabled>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Fecha Finalizacion:</label>
                            <input type="text" class="form-control" name="fecha_finalizacion"
                                placeholder="Fecha_creacion" value="{{ $tarea->fecha_finalizacion }}" disabled>
                        </div>
                    </div>
                    <br>
                    <!-- ANOTACIONES -->
                    <h4 class="fw-bold">Anotaciones</h4>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label"> Anotaciones:</label>
                            <textarea class="form-control"
                                placeholder="Escribe aqui las anotaciones que creas necesarias para guiar y ayudar a los operarios."
                                name="Anotacion_inicio" disabled>{{ $tarea->anotacion_inicio }}</textarea>
                        </div>
                    </div>
                    <br>
                </form>
                <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
            </div>
            <br>
    @endforeach
@endsection
