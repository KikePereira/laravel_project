<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* Estilos para la factura */
    </style>
</head>
<body>
    <h1>Cuota #{{ $cuota->id }}</h1>

    <h2>DATOS DE La CUOTA</h2>
    <p>Concepto: {{ $cuota->concepto }}</p>
    <p>Fecha emision: {{ $cuota->fecha_emision }}</p>
    <p>Importe: {{ $cuota->importe }}</p>
    <p>Estado: {{ $cuota->estado }}</p>
    <p>Fecha pago: {{ $cuota->fecha_pago }}</p>
    <p>Direccion: {{ $cuota->direccion }}</p>

    <h2>DATOS DEL CLIENTE</h2>
    <p>Nombre: {{ $cuota->cliente->nombre }} </p>
    <p>Apellido: {{$cuota->cliente->apellido}}</p>
    <p>DNI: {{$cuota->cliente->dni}}</p>
    <p>Telefono: {{$cuota->cliente->telefono}}</p>
    <p>Correo: {{$cuota->cliente->correo}}</p>
    <p>Cuenta Corriente: {{$cuota->cliente->cuenta_corriente}}</p>
</body>
</html>