@extends('layouts.app')

@section('content')
<!-- BOTONERA SUPERIOR -->
<div class="container-fluid mb-3">
    <div class="row justify-content-center">
    
        <div class="col-lg-10">
        <a href="" class="btn btn-warning">Tareas Pendientes</a>
        <a href="/tareas/eliminadas" class="btn btn-danger">Tareas Eliminadas</a>
        <a href="/tarea/create" class="btn btn-success">Nueva Tarea</a>
        </div>

        <div class="col-lg-1">
            <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
        </div>
        

    </div>
</div>
    <div class="container-fluid">        
        <div class="row justify-content-center">
            <div class="col-12">
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
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal{{$tarea->id}}">
                                                    Restaurar
                                        </button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="modal{{$tarea->id}}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Seguro que quiere eliminar esta tarea?</h1>
                                            </div>
                                            <div class="modal-body">
                                                <span class="fw-bold">ID:</span>{{$tarea->id}} <br>
                                                <span class="fw-bold">Empleado:</span>{{$tarea->empleado->nombre}} <br>
                                                <span class="fw-bold">Cliente:</span>{{$tarea->cliente->nombre}} <br>
                                                <span class="fw-bold">Estado:</span>{{$tarea->estado}} <br>
                                                <span class="fw-bold">Fecha Realizacion:</span>{{$tarea->fecha_realizacion}}
                                            </div>
                                            <div class="modal-footer">
                                            <form action=" {{ route('tarea.restore', $tarea) }} " method="post">
                                                <input type="submit" value="Restaurar" class="btn btn-success">
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                                            </div>
                                        </div>
                                        </div>
                                    </div>
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
