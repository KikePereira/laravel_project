@extends('layouts.app')

@section('content')
    <!-- BOTONERA SUPERIOR -->
    <div class="container-fluid mb-3">
        <div class="row justify-content-center">
        
            <div class="col-lg-10">
            
            <a href="/empleado" class="btn btn-primary">Listas Empleados</a>
            <a href="/empleados/eliminado" class="btn btn-danger">Empleados Eliminados</a>
            <a href="/empleado/create" class="btn btn-success">Nueva Tarea</a>
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
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal{{$empleado->id}}">
                                        Restaurar
                            </button>
                                </td>
                            </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="modal{{$empleado->id}}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Seguro que quiere eliminar esta tarea?</h1>
                                            </div>
                                            <div class="modal-body">
                                                <span class="fw-bold">ID:</span> {{$empleado->id}} <br>
                                                <span class="fw-bold">Empleado:</span> {{$empleado->nombre}} {{$empleado->apellidos}} <br>
                                                <span class="fw-bold">DNI:</span> {{$empleado->dni}} <br>
                                                <span class="fw-bold">Tipo:</span> {{$empleado->tipo}} <br>
                                                <span class="fw-bold">Fecha Alta:</span> {{$empleado->fecha_alta}}
                                            </div>
                                            <div class="modal-footer">
                                            <form action=" {{ route('empleado.restore', $empleado) }} " method="post">
                                                <input type="submit" value="Restaurar" class="btn btn-success">
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
