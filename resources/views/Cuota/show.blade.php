@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container">
    <div class="row">
        <form action="" method="post" class="">
            <div class="row">
                <h4 class="fw-bold">Datos Cuota</h4>
                <!-- Concepto -->
                <div class="col-12 col-lg-6">
                    <label for="" class="form-label">Concepto:</label>
                    <input type="text" class="form-control" value="{{ $cuota->concepto }}" disabled>
                </div>
                <!-- Fecha Emision -->
                <div class="col-12 col-lg-6">
                    <label for="" class="form-label">Fecha de emision:</label>
                    <input type="text" class="form-control" value="{{ $cuota->fecha_emision }}" disabled>
                </div>
            </div>
            <br>
            <div class="row">
                <!-- Importe -->
                <div class="col-12 col-lg-6">
                    <label for="" class="form-label">Importe:</label>
                    <input type="text" class="form-control" value="{{ $cuota->importe }}" disabled>
                </div>
                <!-- Estado -->
                <div class="col-12 col-lg-6">
                    <label for="" class="form-label">Estado:</label>
                    <input type="text" class="form-control" value="{{ $cuota->estado }}" disabled>
                </div>
            </div>
            <br>
            <!-- Fecha pago -->
            <div class="row">
                <div class="col-12">
                    <label for="" class="form-label">Fecha de Pago:</label>
                    <input type="text" class="form-control" value="{{ $cuota->fecha_pago }}" disabled>
                </div>
            </div>
            <br>
            <!-- Cliente -->
            <div class="row">
                <div class="col-12 col-lg-6">
                    <label for="" class="form-label">Cliente:</label>
                    <input type="text" class="form-control" value="{{ $cuota->cliente->nombre }}" disabled>
                    <a href="/cliente/{{$cuota->cliente_id}}" class="btn btn-secondary mt-2">Ver Cliente</a>
                </div>

                <div class="col-12  col-lg-6">
                    <label for="" class="form-label">Direccion:</label>
                    <input type="text" class="form-control" value="{{ $cuota->direccion }}" disabled>
                </div>
            </div>
            <br>
            <!-- Notas -->
            <div class="row">
                <div class="col-12">
                    <label for="" class="form-label">Notas:</label>
                    <textarea name="" id="" cols="30" rows="10" class="form-control" disabled>{{ $cuota->notas }}</textarea>
                </div>
            </div>
        </form>
        
        <div class="container mt-4 text-end">
                <a href="/cuota/{{ $cuota->id }}/edit"><button class="btn btn-secondary">Modificar</button></a>
                <a href="/cuota/{{$cuota->id}}/pdf" class="btn btn-success">PDF</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$cuota->id}}">Eliminar</button>
                <a href="javascript:history.back()" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal{{$cuota->id}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Seguro que quiere eliminar esta tarea?</h1>
            </div>
            <div class="modal-body">
                <span class="fw-bold">ID:</span> {{$cuota->id}}<br>
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

@endsection