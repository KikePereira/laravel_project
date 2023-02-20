@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('empleado.update', $empleado)}}" method="post" class="">
        @method('put')        
        <!-- PERSONAL -->
        <div class="row">
            <h4 class="fw-bold">Personal</h4>
             <!-- DNI -->
             <div class="col-12 col-lg-4">
                <label for=""  class="form-label">DNI:</label> @error('dni')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="dni" placeholder="DNI del empleado" value="{{$empleado->dni}}">
            </div>
            <!-- NOMBRE -->
            <div class="col-12 col-lg-4">
                <label for=""  class="form-label">Nombre:</label> @error('nombre')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="nombre" placeholder="Nombre del empleado" value="{{$empleado->nombre}}">
            </div>
            <!-- APELLIDO -->
            <div class="col-12 col-lg-4">
                <label for=""  class="form-label">Apellidos:</label> @error('apellidos')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="apellidos" placeholder="Apellido del empleado" value="{{$empleado->apellidos}}">
            </div>
        </div>
        <br>
        <!-- CONTACTO -->
        <div class="row">
            <h4 class="fw-bold">Contacto</h4>

            <div class="col-12">
                <label for=""  class="form-label">Telefono:</label> @error('telefono')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="telefono" placeholder="Telefono del empleado" value="{{$empleado->telefono}}">
            </div>
            
            <!-- CREDENCIALES -->
            <div class="row">
                
            <h5 class="fw-bold pt-3">Credenciales</h5>

            <div class="col-12 col-lg-6">
                <label for=""  class="form-label">Email:</label> @error('email')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="email" placeholder="Correo Electronico del empleado" value="{{$empleado->email}}">
            </div>
            <div class="col-12 col-lg-6">
                <label for=""  class="form-label">Contraseña:</label> @error('password')<span class="text-danger">{{$message}}</span>@enderror
                <input type="password" disabled class="form-control" name="password" placeholder="Introduce una contraseña para el empleado" value="{{$empleado->password}})">
            </div>
        </div>
        </div>
        <br>
        <!-- DIRECCION -->
        <h4 class="fw-bold">Direccion</h4>
        <div class="row">
            <div class="col-12">
                <label for=""  class="form-label">Direccion:</label> @error('direccion')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="{{$empleado->direccion}}">
                <br>
            </div>

        <!-- FECHAS -->
        <h4 class="fw-bold">Fecha:</h4>

        <div class="row">
            <br>

            <div class="col-12 col-lg-6">
                <label for="" class="form-label">Fecha Alta:</label> @error('fecha_alta')<span class="text-danger">{{$message}}</span>@enderror
                <input type="date" class="form-control" name="fecha_alta" value="{{$empleado->fecha_alta}}">
                <br>
            </div>

            <div class="col-12 col-lg-6">
                <label for="" class="form-label">Tipo de empleado:</label> @error('tipo')<span class="text-danger">{{$message}}</span>@enderror
                <select name="tipo" id="tipo" class="form-select">
                    <option value="{{$empleado->tipo}}" hidden selected>{{$empleado->tipo}}</option>
                    <option value="Operario">Operario</option>
                    <option value="Administrador">Administrador</option>
                </select>
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
        </div>    </form>
</div>
@endsection