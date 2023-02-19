@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('cuota.monthly_store') }}" method="post" class="">
            <h3 class="fw-bold">Registra Cuota</h4>
                <div class="row mt-3">
                    <!-- Concepto -->
                    <div class="col-12 col-lg-6">
                        <label for="" class="form-label">Concepto:</label> @error('concepto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" name="concepto" placeholder="Concepto de la cuota"
                            value="{{ old('concepto') }}">
                    </div>
                    <!-- Fecha Emision -->
                    <div class="col-12 col-lg-6">
                        <label for="" class="form-label">Fecha Emision:</label> @error('fecha_emision')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="date" class="form-control" name="fecha_emision"
                            placeholder="Fecha Emision de la cuota" value="{{ old('fecha_emision') }}">
                    </div>
                    <!-- Importe -->
                    <div class="col-12 col-lg-6 mt-2">
                        <label for="" class="form-label">Importe:</label> @error('importe')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" name="importe" placeholder="Importe de la cuota"
                            value="{{ old('importe') }}">
                    </div>
                    <!-- Estado -->
                    <div class="col-12 col-lg-6 mt-2">
                        <label for="" class="form-label">Estado:</label> @error('estado')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <select name="estado" id="" class="form-control">
                            <option selected disabled>Selecciona un Estado</option>
                            <option value="Pagada">Pagada</option>
                            <option value="No Pagada">No Pagada</option>
                        </select>
                    </div>
                    <!-- Fecha Pago -->
                    <div class="col-12 col-lg-6 mt-2">
                        <label for="" class="form-label">Fecha Pago:</label> @error('fecha_pago')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <input type="date" class="form-control" name="fecha_pago" placeholder="Fecha Pago de la cuota"
                            value="{{ old('fecha_pago') }}">
                    </div>

                    <!-- Notas -->
                    <div class="col-12 mt-2">
                        <label for="" class="form-label">Notas:</label> @error('notas')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <textarea name="notas" id="" cols="30" rows="10" class="form-control"
                            placeholder="Añadir notas sobre la cuota">{{ old('notas') }}</textarea>
                    </div>                    
                </div>

                <div class="row mt-3">

                    <div class="col-lg-6">
                        <input type="submit" class="form-control bg-primary text-white">
                    </div>
                    <div class="col-lg-6">
                        <a href="javascript:history.back()" class="btn btn-danger form-control">Volver</a>
                    </div>
                </div>
        </form>
    @endsection
