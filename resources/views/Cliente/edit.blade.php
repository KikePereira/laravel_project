@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('cliente.update', $cliente) }}" method="post" class="">
            @method('put')
            <!-- PERSONAL -->
            <div class="row">
                <h4 class="fw-bold">Personal</h4>
                <!-- DNI -->
                <div class="col-12 col-lg-4">
                    <label for="" class="form-label">DNI:</label> @error('dni')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" class="form-control" name="dni" placeholder="DNI del empleado"
                        value="{{ $cliente->dni }}">
                </div>
                <!-- NOMBRE -->
                <div class="col-12 col-lg-4">
                    <label for="" class="form-label">Nombre:</label> @error('nombre')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del empleado"
                        value="{{ $cliente->nombre }}">
                </div>
                <!-- APELLIDO -->
                <div class="col-12 col-lg-4">
                    <label for="" class="form-label">Apellidos:</label> @error('apellidos')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellido del empleado"
                        value="{{ $cliente->apellidos }}">
                </div>
            </div>
            <br>
            <!-- CONTACTO -->
            <div class="row">
                <h4 class="fw-bold">Contacto</h4>

                <div class="col-12 col-lg-6">
                    <label for="" class="form-label">Telefono:</label> @error('telefono')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" class="form-control" name="telefono" placeholder="Telefono del empleado"
                        value="{{ $cliente->telefono }}">
                </div>

                <div class="col-12 col-lg-6">
                    <label for="" class="form-label">Email:</label> @error('correo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" class="form-control" name="correo" placeholder="Correo Electronico del empleado"
                        value="{{ $cliente->correo }}">
                </div>
            </div>
    
    <br>
    <!-- DIRECCION -->
    <h4 class="fw-bold">Direccion</h4>
    <div class="row">
        <div class="col-12">
            <label for="" class="form-label">Direccion:</label> @error('direccion')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <input type="text" class="form-control" name="direccion" placeholder="Direccion"
                value="{{ $cliente->direccion }}">
            <br>
        </div>

        <!-- FECHAS -->
        <h4 class="fw-bold">Facturacion:</h4>

        <div class="row">
            <br>

            <div class="col-12">
                <label for="" class="form-label">Cuenta Corriente:</label> @error('cuenta_corriente')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" class="form-control" name="cuenta_corriente"
                    value="{{ $cliente->cuenta_corriente }}">
                <br>
            </div>

            <div class="col-12 col-lg-4">
                <label for="" class="form-label">Pais:</label> @error('pais')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" class="form-control" name="pais" value="{{ $cliente->pais }}">
                <br>
            </div>

            <div class="col-12 col-lg-4">
                <label for="" class="form-label">Moneda:</label> @error('moneda')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" class="form-control" name="moneda" value="{{ $cliente->moneda }}">
                <br>
            </div>

            <div class="col-12 col-lg-4">
                <label for="" class="form-label">Importe Mensual:</label> @error('importe_mensual')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <input type="text" class="form-control" name="importe_mensual" value="{{ $cliente->importe_mensual }}">
                <br>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-6">
                <input type="submit" class="form-control bg-primary text-white">
            </div>
            <div class="col-lg-6">
                <a href="javascript:history.back()" class="btn btn-danger form-control">Volver</a>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
