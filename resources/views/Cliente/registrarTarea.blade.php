<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">




<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<style>
    body{
        background: rgb(241, 241, 241)
    }
</style>

<nav class="bg-dark mb-4">
    <div class="container">
        <img src="{{ asset('img/logo_p.png') }}" width="180px">
    </div>
</nav>

<div class="container">
    <p class="border border-3 bg-white border-danger p-2 form-control text-center">Aqui podras registrar una tarea como Cliente si poseemos tus datos en nuestra base de datos, si no es el caso contacta con un Administrador
        para que te de alta como cliente y suscribirte a nuestros servicios.
    </p>

    <p class="border border-2 p-2 border-success form-control text-center">
        Si ya eres cliente nuestro rellena el formulario a continuacion para encargar la tarea, nos encargaremos de ella con la mayor brevedad posible.
    </p>
</div>

<div class="container">
    <form action="{{ route('registrarTarea.store') }}" method="post" class="">
        <!-- CLIENTE -->
        <!-- PERSONAL -->
        <div class="row">
            <h4 class="fw-bold">Cliente</h4>
            @error('dni')<span class="border border-2 p-1 m-2 border-danger text-danger bg-danger text-white form-control text-center">{{ $message }}</span>                @enderror

            <div class="col-12 col-lg-4">
                <label for="" class="form-label">DNI:</label> 
                <input type="text" class="form-control" name="dni" placeholder="DNI del cliente"
                    value="{{ old('dni') }}">
            </div>
            <div class="col-12 col-lg-4">
                <label for="" class="form-label">Telefono:</label>
                <input type="text" class="form-control" name="telefonoCliente" placeholder="Telefono del cliente"
                    value="{{ old('telefonoCliente') }}">
            </div>
        </div>
        <!--  -->
        <br>
        <!-- PERSONAL -->
        <h4 class="fw-bold">Contacto</h4>
        <div class="row">
            
            <!-- NOMBRE -->
            <div class="col-12 col-lg-4">
                <label for=""  class="form-label">Nombre:</label> @error('nombre')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="nombre" placeholder="Nombre persona de contacto" value="{{old('nombre')}}">
            </div>
            <!-- APELLIDO -->
            <div class="col-12 col-lg-4">
                <label for=""  class="form-label">Apellidos:</label> @error('apellidos')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="apellidos" placeholder="Apellido persona de contacto" value="{{old('apellidos')}}">
            </div>
        </div>
        <br>
        <!-- CONTACTO -->
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for=""  class="form-label">Telefono:</label> @error('telefono')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="telefono" placeholder="Telefono persona de contacto" value="{{old('telefono')}}">
            </div>
            <div class="col-12 col-lg-6">
                <label for=""  class="form-label">E-mail:</label> @error('correo')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="correo" placeholder="Correo Electronico persona de contacto" value="{{old('correo')}}">
            </div>
        </div>
        <br>
        <!-- DESCRIPCION -->
        <h4 class="fw-bold">Descripcion</h4>
        <div class="row">
            <div class="col-12">
                <label for="" class="form-label"> Descripcion:</label> @error('descripcion')<span class="text-danger">{{$message}}</span>@enderror
                <textarea class="form-control" placeholder="Escribe aqui las anotaciones que creas necesarias para guiar y ayudar a los operarios." name="descripcion">{{old('descripcion')}}</textarea>
            </div>
        </div>
        <br>
        <!-- DIRECCION -->
        <h4 class="fw-bold">Direccion</h4>
        <div class="row">
            <div class="col-12 col-lg-7">
                <label for=""  class="form-label">Direccion:</label> @error('direccion')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="direccion" placeholder="Direccion" value="{{old('direccion')}}">
            </div>
            <div class="col-12 col-lg-5">
                <label for=""  class="form-label">Codigo Postal:</label> @error('zip')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="zip" placeholder="Codigo Postal" value="{{old('zip')}}">
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for=""  class="form-label">Poblacion:</label> @error('poblacion')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="poblacion" placeholder="Poblacion" value="{{old('poblacion')}}">
            </div>

            <div class="col-12 col-lg-6">
                <label for=""  class="form-label">Provincia:</label> @error('provincia')<span class="text-danger">{{$message}}</span>@enderror
                <input type="text" class="form-control" name="provincia" placeholder="Provincia" value="{{old('provincia')}}">
            </div>
        </div>
        <br>
        <!-- FECHAS -->
        <br>
        <h4 class="fw-bold">Fecha</h4>
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="" class="form-label">Fecha Realizacion:</label> @error('fecha_realizacion')<span class="text-danger">{{$message}}</span>@enderror
                <input type="date" class="form-control" name="fecha_realizacion" value="{{old('fecha_realizacion')}}">
            </div>
        </div>
        <br>
        <!-- ANOTACIONES -->
        <h4 class="fw-bold">Anotaciones</h4>
        <div class="row">
            <div class="col-12">
                <label for="" class="form-label"> Anotaciones:</label> @error('anotacion_inicio')<span class="text-danger">{{$message}}</span>@enderror
                <textarea class="form-control" placeholder="Escribe aqui las anotaciones que creas necesarias para guiar y ayudar a los operarios." name="anotacion_inicio">{{old('anotacion_inicio')}}</textarea>
            </div>
        </div>
        <br>
    
        <br>
        <div class="row">

            <div class="col-lg-6">
                <input type="submit" class="form-control bg-primary text-white">
            </div>
            <div class="col-lg-6">
                <a href="/login" class="btn btn-danger form-control">Volver</a>
            </div>
        </div>
    </form>

</div>
