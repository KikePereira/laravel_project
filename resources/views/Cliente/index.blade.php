@extends('layouts.app')

@section('content')
    <!-- BOTONERA SUPERIOR -->
    <div class="container-fluid mb-3">
        <div class="row justify-content-center">

            <div class="col-lg-10">
                <a href="/cliente/create" class="btn btn-success">Nuevo Cliente</a>
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
                            <th class="text-center fw-bold">DNI</th>
                            <th class="text-center fw-bold">Nombre</th>
                            <th class="text-center fw-bold">Apellidos</th>
                            <th class="text-center fw-bold">Telefono</th>
                            <th class="text-center fw-bold">Correo</th>
                            <th class="text-center fw-bold">Direccion</th>
                            <th class="text-center fw-bold">Cuenta Corriente</th>
                            <th class="text-center fw-bold">Pais</th>
                            <th class="text-center fw-bold">Moneda</th>
                            <th class="text-center fw-bold">Importe Mensual</th>
                            <th></th>
                        </tr>
                    </thead>

                    @foreach ($clientes as $cliente)
                        <tr>
                            <td class="text-center fw-bold">{{ $cliente->id }}</td>
                            <td class="text-center">{{ $cliente->dni }}</td>
                            <td class="text-center">{{ $cliente->nombre }}</td>
                            <td class="text-center">{{ $cliente->apellidos }}</td>
                            <td class="text-center">{{ $cliente->telefono }}</td>
                            <td class="text-center">{{ $cliente->correo }}</td>
                            <td class="text-center">{{ $cliente->direccion }}</td>
                            <td class="text-center">{{ $cliente->cuenta_corriente }}</td>
                            <td class="text-center">{{ $cliente->pais }}</td>
                            <td class="text-center">{{ $cliente->moneda }}</td>
                            <td class="text-center">{{ $cliente->importe_mensual }}</td>
                            <td>
                                <a href="/cliente/{{ $cliente->id }}"><button class="btn btn-primary">Ver</button></a>
                                <a href="/cliente/{{ $cliente->id }}/edit"><button
                                        class="btn btn-secondary">Modificar</button></a>
                                <a href="/cliente/{{ $cliente->id }}"><button
                                        class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pagination">
                    {{ $clientes->links() }}
                </div>
            </div>
            <!-- PAGINACION -->

        </div>
    </div>
@endsection
