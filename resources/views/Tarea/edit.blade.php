@extends('layouts.app')

@section('content')
    @foreach ($tareas as $tarea)
        @if (Auth::user()->tipo == 'Administrador')
            <div class="container">
                <form action="{{ route('tarea.update', $tarea) }}" method="post" class="">
                    @method('put')
                    <!-- PERSONAL -->
                    <h4 class="fw-bold">Contacto</h4>
                    <div class="row">

                        <!-- NOMBRE -->
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Nombre:</label> @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control" name="nombre"
                                placeholder="Nombre persona de contacto" value="{{ $tarea->nombre }}">
                        </div>
                        <!-- APELLIDO -->
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Apellidos:</label> @error('apellidos')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control" name="apellidos"
                                placeholder="Apellido persona de contacto" value="{{ $tarea->apellidos }}">
                        </div>
                    </div>
                    <br>
                    <!-- CONTACTO -->
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Telefono:</label> @error('telefono')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control" name="telefono"
                                placeholder="Telefono persona de contacto" value="{{ $tarea->telefono }}">
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">E-mail:</label> @error('correo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control" name="correo"
                                placeholder="Correo Electronico persona de contacto" value="{{ $tarea->correo }}">
                        </div>
                    </div>
                    <br>
                    <!-- DESCRIPCION -->
                    <h4 class="fw-bold">Descripcion</h4>
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label"> Descripcion:</label> @error('descripcion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <textarea class="form-control"
                                placeholder="Escribe aqui las anotaciones que creas necesarias para guiar y ayudar a los operarios."
                                name="descripcion">{{ $tarea->descripcion }}</textarea>
                        </div>
                    </div>
                    <br>
                    <!-- DIRECCION -->
                    <h4 class="fw-bold">Direccion</h4>
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <label for="" class="form-label">Direccion:</label> @error('direccion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control" name="direccion" placeholder="Direccion"
                                value="{{ $tarea->direccion }}">
                        </div>
                        <div class="col-12 col-lg-5">
                            <label for="" class="form-label">Codigo Postal:</label> @error('zip')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control" name="zip" placeholder="Codigo Postal"
                                value="{{ $tarea->zip }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Poblacion:</label> @error('poblacion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control" name="poblacion" placeholder="Poblacion"
                                value="{{ $tarea->poblacion }}">
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Provincia:</label> @error('provincia')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="text" class="form-control" name="provincia" placeholder="Provincia"
                                value="{{ $tarea->provincia }}">
                        </div>
                    </div>
                    <br>
                    <!-- EMPLEADO Y CLIENTE-->
                    <div class="row">
                        <!-- EMPLEADO -->
                        <div class="col-6">
                            <h4 class="fw-bold">Empleado</h4>
                            <label for="" class="form-label">Empleado:</label> @error('empleado_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <select class="form-select" name="empleado_id">
                                @if(isset($tarea->empleado) && !is_null($tarea->empleado) && !is_null($tarea->empleado->nombre))
                                <option value="{{ $tarea->empleado->id }}" selected>{{ $tarea->empleado->nombre }}</option>
                                @else
                                <option value="" selected class="text-danger">Empleado Eliminado</option>
                                @endif

                                @foreach ($empleados as $empleado)
                                    <option value="{{ $empleado->id }}">{{ $empleado->nombre }}</option>
                                @endforeach
                            </select>
                            <br>
                            <a href="{{ url('/empleado/create') }}" class="btn btn-secondary">Crear empleado</a>
                        </div>
                        <!-- CLIENTE -->
                        <div class="col-6">
                            <h4 class="fw-bold">Cliente</h4>
                            <label for="" class="form-label">Cliente:</label> @error('cliente_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <select name="cliente_id" id="" class="form-select">
                                <option value="{{ $tarea->cliente->id }}" selected>{{ $tarea->cliente->nombre }}</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                            <br>
                            <a href="{{ url('/cliente/create') }}" class="btn btn-secondary">Crear cliente</a>
                        </div>
                    </div>
                    <!-- FECHAS -->
                    <br>
                    <h4 class="fw-bold">Fecha</h4>
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Estado:</label> @error('estado')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <select name="estado" id="" class="form-select">
                                <option value="{{ $tarea->estado }}" selected readonly>{{ $tarea->estado }}</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Cancelada">Cancelada</option>
                                <option value="Realizada">Realizada</option>
                            </select>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Fecha Realizacion:</label>
                            @error('fecha_realizacion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="date" class="form-control" name="fecha_realizacion"
                                value="{{ $tarea->fecha_realizacion }}">
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Fecha Finalizacion:</label>
                            @error('fecha_finalizacion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="date" class="form-control" name="fecha_finalizacion"
                                value="{{ $tarea->fecha_finalizacion }}">
                        </div>
                    </div>
                    <br>
                    <!-- ANOTACIONES -->
                    <h4 class="fw-bold">Anotaciones</h4>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label"> Anotaciones Inicio:</label>
                            @error('anotacion_inicio')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <textarea class="form-control"
                                placeholder="Escribe aqui las anotaciones que creas necesarias para guiar y ayudar a los operarios."
                                name="anotacion_inicio">{{ $tarea->anotacion_inicio }}</textarea>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label"> Anotaciones Final:</label> @error('anotacion_final')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <textarea class="form-control"
                                placeholder="Escribe aqui las anotaciones que creas necesarias para guiar y ayudar a los operarios."
                                name="anotacion_final">{{ $tarea->anotacion_final }}</textarea>
                        </div>

                    </div>
                    <br>

                    <br>
                    <div class="row">

                        <div class="col-lg-6">
                            <input type="submit" class="form-control bg-primary text-white">
                        </div>
                        <div class="col-lg-6">
                            <a href="javascript:history.back()" class="btn btn-danger form-control">Volver</a>
                        </div>
                    </div>
                </form>
                <br>
            </div>
        @else
        <form action="{{ route('operario.update', $tarea) }}" method="post" class="">
            @method('put')
        <div class="container">
            <div class="row">
                <!-- ESTADO -->
            <div class="col-lg-6">
                <h4 class="fw-bold">Estado</h4>
                <label for="" class="form-label"> Estado:</label> @error('estado')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" class="form-control" name="estado" value="Realizada" readonly>
            </div>
            <!-- FECHA FINALIZACION -->
            <div class="col-lg-6">
                <h4 class="fw-bold">Fecha Finalizacion</h4>
                <label for="" class="form-label"> Estado:</label> @error('fecha_finalizacion')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="date" class="form-control" name="fecha_finalizacion" value="{{$tarea->fecha_finalizacion}}">
            </div>
        </div>

            <div class="row mt-3">
                <h4 class="fw-bold">Anotaciones</h4>

                <div class="col-12">
                    <label for="" class="form-label"> Anotaciones Final:</label> @error('anotacion_final')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <textarea class="form-control"
                        placeholder="Escribe aqui las anotaciones que creas necesarias para guiar y ayudar a los operarios."
                        name="anotacion_final">{{ $tarea->anotacion_final }}</textarea>
                </div>

            </div>
        <div class="row mt-3">

            <div class="col-lg-6">
                <input type="submit" class="form-control bg-primary text-white">
            </div>
            <div class="col-lg-6">
                <a href="javascript:history.back()" class="btn btn-danger form-control">Volver</a>
            </div>
        </div>
    </div>

    </form>
        @endif
    @endforeach
@endsection
