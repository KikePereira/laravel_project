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
    </div>
</div>

@endsection