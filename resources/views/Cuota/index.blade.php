@extends('layouts.app')

@section('content')
<!-- BOTONERA SUPERIOR -->
<div class="container-fluid mb-3">
    <div class="row justify-content-center">
    
        <div class="col-lg-10">
        
        <a href="/cuota" class="btn btn-primary">Listas Cuotas</a>
        <a href="/cuotas/eliminado" class="btn btn-danger">Cuotas Eliminados</a>
        <a href="/cuota/create" class="btn btn-success">Nueva Cuota</a>
        <a href="/cuotas/monthly_create" class="btn btn-warning">Remesa Mensual</a>
        </div>

        <div class="col-lg-1">
            <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
        </div>
        
    </div>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <table class="table table-hover border bg-white text-nowrap">
                <thead class="table-dark">
                    <tr class="">
                        <th class="text-center fw-bold">ID</th>
                        <th class="text-center fw-bold">Concepto</th>
                        <th class="text-center fw-bold">Fecha Emision</th>
                        <th class="text-center fw-bold">Importe</th>
                        <th class="text-center fw-bold">Estado</th>
                        <th class="text-center fw-bold">Cliente</th>
                        <th></th>
                    </tr>
                </thead>

                @foreach ($cuotas as $cuota)
                    <tr>
                        <td class="text-center fw-bold">{{ $cuota->id }}</td>
                        <td class="text-center">{{ $cuota->concepto }}</td>
                        <td class="text-center">{{ $cuota->fecha_emision }}</td>
                        <td class="text-center">{{ $cuota->importe }}</td>
                         <!-- Variaciones estado -->
                         @if ($cuota->estado == 'Pagada')
                         <td class="text-center bg-success">{{ $cuota->estado }}</td>
                         @else
                         <td class="text-center bg-danger">{{ $cuota->estado }}</td>
                         @endif
                        <td class="text-center">{{ $cuota->cliente->nombre }}</td>
                        <td class="text-center">
                            <a href="/cuota/{{ $cuota->id }}"><button class="btn btn-primary">Ver</button></a>
                            <a href="/cuota/{{ $cuota->id }}/edit"><button class="btn btn-secondary">Modificar</button></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$cuota->id}}">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="modal{{$cuota->id}}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Seguro que quiere eliminar esta tarea?</h1>
                                </div>
                                <div class="modal-body">
                                    <span class="fw-bold">ID:</span> {{$cuota->id}} <br>
                                    <span class="fw-bold">Conceptp:</span> {{$cuota->concepto}}<br>
                                    <span class="fw-bold">Fecha Emision:</span> {{$cuota->fecha_emision}} <br>
                                    <span class="fw-bold">Importe:</span> {{$cuota->importe}} <br>
                                    <span class="fw-bold">Estado:</span> {{$cuota->estado}} <br>
                                    <span class="fw-bold">Cliente:</span> {{$cuota->cliente->nombre}} {{$cuota->cliente->apellidos}}
                                </div>
                                <div class="modal-footer">
                                <a href="/cuota/{{ $cuota->id }}"><button
                                        class="btn btn-primary">Ver</button></a>
                                <form action=" {{ route('cuota.destroy', $cuota) }} " method="post">
                                    @method('delete')
                                    <input type="submit" value="Eliminar" class="btn btn-danger">
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </table>
            <div class="pagination">
                {{ $cuotas->links() }}
            </div>
        </div>
        <!-- PAGINACION -->
    </div>
</div>
@endsection