@extends('layouts.app')

@section('content')
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