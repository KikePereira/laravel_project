@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <form action="" method="post" class="">
                    <div class="row">
                        <h4 class="fw-bold">Datos Cliente</h4>
                        <!-- DNI -->
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">DNI:</label>
                            <input type="text" class="form-control" name="Nombre"
                                placeholder="Nombre persona de contacto" value="{{ $cliente->dni }}" disabled>
                        </div>
                        <!-- Nombre -->
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="Apellido"
                                placeholder="Apellido persona de contacto" value="{{ $cliente->nombre }}" disabled>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-12 col-lg-4">
                            <label for="" class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" name="Apellido"
                                placeholder="Apellido persona de contacto" value="{{ $cliente->apellidos }}" disabled>
                        </div>
                    </div>
                    <br>
                    <!-- CONTACTO -->
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Telefono:</label>
                            <input type="text" class="form-control" name="Telefono"
                                placeholder="Telefono persona de contacto" value="{{ $cliente->telefono }}" disabled>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">E-mail:</label>
                            <input type="text" class="form-control" name="Correo"
                                placeholder="Correo Electronico persona de contacto" value="{{ $cliente->correo }}"
                                disabled>
                        </div>
                    </div>
                    <br>
                    <!-- DIRECCION -->
                    <div class="row">
                        <div class="col-12">
                            <label for="" class="form-label">Direccion:</label>
                            <input type="text" class="form-control" name="Direccion" placeholder="Direccion"
                                value="{{ $cliente->direccion }}" disabled>
                        </div>
                    </div>
                    <br>
                    <!-- DATOS EMPLEADO -->
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Pais:</label>
                            <input type="text" class="form-control" name="fecha_alta" placeholder="fecha_alta"
                                value="{{ $cliente->pais }}" disabled>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Moneda:</label>
                            <input type="text" class="form-control" name="tipo" placeholder="tipo"
                                value="{{ $cliente->moneda }}" disabled>
                        </div>
                    </div>
                    <br>
                    <!-- FACTURACION -->
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Cuenta Corriente:</label>
                            <input type="text" class="form-control" name="fecha_alta" placeholder="fecha_alta"
                                value="{{ $cliente->cuenta_corriente }}" disabled>
                        </div>

                        <div class="col-12 col-lg-6">
                            <label for="" class="form-label">Importe Mensual:</label>
                            <input type="text" class="form-control" name="tipo" placeholder="tipo"
                                value="{{ $cliente->importe_mensual }}" disabled>
                        </div>
                    </div>
                </form>
                <div class="mt-3 text-end">
                    <a href="/cliente/{{ $cliente->id }}/edit"><button
                        class="btn btn-secondary">Modificar</button></a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$cliente->id}}">
                            Eliminar
                        </button>
                    <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
        <!-- TABLA DE TAREAS DEL CLIENTE -->
        <table class="table table-hover border bg-white caption-top" cellspacing="0">
            <caption>Tareas del cliente</caption>
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
                @foreach ($tareas_cliente as $tarea)
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
                            <a href="/tarea/{{ $tarea->id }}"><button class="btn btn-primary text-center">Ver</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $tareas_cliente->links() }}
        </div>
        <br>
        <!-- TABLA DE CUOTAS DEL CLIENTE -->
        <table class="table table-hover border bg-white caption-top" cellspacing="0">
            <caption>Cuotas del cliente</caption>
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
            <tbody class="">
                @foreach ($cuotas_cliente as $cuota)
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
                        <td class="text-center">{{ $cuota->cliente->nombre }} {{ $cuota->cliente->apellidos }}</td>
                        <!--  -->
                        <td>
                            <a href="/cuota/{{$cuota->id}}" class="btn btn-primary text-center">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $cuotas_cliente->links() }}
        </div>
    </div>

    <div class="container">
        <a href="javascript:history.back()" class="btn btn-primary form-control">Volver</a>
    </div>
    <br>

                            <!-- Modal -->
                            <div class="modal fade" id="modal{{$cliente->id}}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Seguro que quiere eliminar esta tarea?</h1>
                                        </div>
                                        <div class="modal-body">
                                            <span class="fw-bold">ID:</span> {{$cliente->id}} <br>
                                            <span class="fw-bold">Cliente:</span> {{$cliente->nombre}} {{$cliente->apellidos}} <br>
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
@endsection
