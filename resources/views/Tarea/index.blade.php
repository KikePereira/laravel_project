@extends('layouts.app')

@section('content')
<!-- BOTONERA SUPERIOR -->
<div class="container-fluid mb-3">
    <div class="row justify-content-center">
    
        <div class="col-lg-10">
        <a href="" class="btn btn-warning">Tareas Pendientes</a>
        <a href="/tarea/create" class="btn btn-success">Nueva Tarea</a>
        </div>

        <div class="col-lg-1">
            <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
        </div>
        

    </div>
</div>
    <div class="container-fluid">        
        <div class="row justify-content-center">
            <div class="col-11">
                <div class="table-responsive">
                    <table class="table table-hover border bg-white caption-top" cellspacing="0">
                        <caption>Lista de Tareas</caption>
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
                            @foreach ($tareas as $tarea)
                                <tr>
                                    <td class="text-center fw-bold">{{ $tarea->id }}</td>
                                    <!-- VARIACIONES ESTADO -->
                                    @if ($tarea->estado == 'Pendiente')
                                        <td class="bg-warning">{{ $tarea->estado }}</td>
                                    @elseif($tarea->estado == 'Cancelada')
                                        <td class="bg-danger">{{ $tarea->estado }}</td>
                                    @else
                                        <td class="bg-success">{{ $tarea->estado }}</td>
                                    @endif
                                    <!--  -->
                                    <td class="text-center text-nowrap">{{ $tarea->fecha_realizacion }}</td>
                                    <td class="text-center text-nowrap">{{ $tarea->empleado->nombre }}</td>
                                    <td class="text-center text-nowrap">{{ $tarea->cliente->nombre }}</td>
                                    <td class="text-center text-nowrap">{{ $tarea->poblacion }}</td>
                                    <td class="text-center">{{ $tarea->anotacion_inicio }}</td>
                                    <td class="text-center text-nowrap">
                                        <a href="/tarea/{{ $tarea->id }}"><button
                                                class="btn btn-primary">Ver</button></a>
                                        <a href="/tarea/{{ $tarea->id }}/edit"><button
                                                class="btn btn-secondary">Modificar</button></a>
                                        <a href="/tarea/{{ $tarea->id }}"><button
                                                class="btn btn-danger">Eliminar</button></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="pagination">
                    {{ $tareas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
