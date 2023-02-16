@extends('layouts.app')

@section('content')
    <!-- BOTONERA SUPERIOR -->
    <div class="container-fluid mb-3">
        <div class="row justify-content-center">

            <div class="col-lg-10">
                <a href="/empleado/create" class="btn btn-success">Nuevo Empleado</a>
            </div>

            <div class="col-lg-1">
                <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
            </div>


        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="table-responsive">
                    <table class="table table-hover border bg-white" cellspacing="0">
                        <thead class="table-dark">
                            <tr class="">
                                <th class="text-center fw-bold">ID</th>
                                <th class="text-center fw-bold">DNI</th>
                                <th class="text-center fw-bold">Nombre</th>
                                <th class="text-center fw-bold">Apellidos</th>
                                <th class="text-center fw-bold">Telefono</th>
                                <th class="text-center fw-bold">Correo</th>
                                <th class="text-center fw-bold">Direccion</th>
                                <th class="text-center fw-bold">Fecha Alta</th>
                                <th class="text-center fw-bold">Tipo</th>
                                <th class="text-center fw-bold"></th>
                            </tr>
                        </thead>


                        @foreach ($empleados as $empleado)
                            <tr>
                                <td class="text-center fw-bold">{{ $empleado->id }}</td>
                                <td class="text-center">{{ $empleado->dni }}</td>
                                <td class="text-center">{{ $empleado->nombre }}</td>
                                <td class="text-center">{{ $empleado->apellidos }}</td>
                                <td class="text-center">{{ $empleado->telefono }}</td>
                                <td class="text-center">{{ $empleado->email }}</td>
                                <td class="text-center">{{ $empleado->direccion }}</td>
                                <td class="text-center">{{ $empleado->fecha_alta }}</td>
                                @if ($empleado->tipo == 'Administrador')
                                    <td class="text-center bg-info">{{ $empleado->tipo }}</td>
                                @elseif($empleado->tipo == 'Operario')
                                    <td class="text-center text-white bg-primary">{{ $empleado->tipo }}</td>
                                @endif
                                <td class="text-center">
                                    <a href="/empleado/{{ $empleado->id }}"><button
                                            class="btn btn-primary">Ver</button></a>
                                    <a href="/empleado/{{ $empleado->id }}/edit"><button
                                            class="btn btn-secondary">Modificar</button></a>
                                    <a href="/empleado/{{ $empleado->id }}"><button
                                            class="btn btn-danger">Eliminar</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
                <div class="pagination">
                    {{ $empleados->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
