@extends('layouts.app')

@section('content')
    <!-- BOTONERA SUPERIOR -->
    <div class="container-fluid mb-3">
        <div class="row justify-content-center">
        
            <div class="col-lg-10">
            
            <a href="/empleado" class="btn btn-primary">Listas Clientes</a>
            <a href="/clientes/eliminado" class="btn btn-danger">Clientes Eliminados</a>
            <a href="/cliente/create" class="btn btn-success">Nuevo Cliente</a>
            </div>
    
            <div class="col-lg-1">
                <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
            </div>
            
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <table class="table table-hover border bg-white text-nowrap">
                    <thead class="table-dark">
                        <tr class="">
                            <th class="text-center fw-bold">ID</th>
                            <th class="text-center fw-bold">DNI</th>
                            <th class="text-center fw-bold">Nombre</th>
                            <th class="text-center fw-bold">Telefono</th>
                            <th class="text-center fw-bold">Correo</th>
                            <th class="text-center fw-bold">Cuenta Corriente</th>
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
                            <td class="text-center">{{ $cliente->telefono }}</td>
                            <td class="text-center">{{ $cliente->correo }}</td>
                            <td class="text-center">{{ $cliente->cuenta_corriente }}</td>
                            <td class="text-center">{{ $cliente->moneda }}</td>
                            <td class="text-center">{{ $cliente->importe_mensual }}</td>
                            <td>
                                <a href="/cliente/{{ $cliente->id }}"><button class="btn btn-primary">Ver</button></a>
                                <a href="/cliente/{{ $cliente->id }}/edit"><button
                                        class="btn btn-secondary">Modificar</button></a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$cliente->id}}">
                                            Eliminar
                                </button>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{$cliente->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Seguro que quiere eliminar esta tarea?</h1>
                                    </div>
                                    <div class="modal-body">
                                        <span class="fw-bold">ID:</span> {{$cliente->id}} <br>
                                        <span class="fw-bold">Empleado:</span> {{$cliente->nombre}} {{$cliente->apellidos}} <br>
                                        <span class="fw-bold">DNI:</span> {{$cliente->dni}} <br>
                                        <span class="fw-bold">Cuenta Corriente:</span> {{$cliente->cuenta_corriente}} <br>
                                        <span class="fw-bold">Importe Mensual:</span> {{$cliente->importe_mensual}}
                                    </div>
                                    <div class="modal-footer">
                                    <a href="/cliente/{{ $cliente->id }}"><button
                                            class="btn btn-primary">Ver</button></a>
                                    <form action=" {{ route('cliente.destroy', $cliente) }} " method="post">
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
                    {{ $clientes->links() }}
                </div>
            </div>
            <!-- PAGINACION -->

        </div>
    </div>
@endsection
