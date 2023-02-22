<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        .bg-dark{
            background-color: rgb(49, 49, 49);
        }
        .bg-red{
            background-color: rgb(209, 24, 24);
        }
        .text-white{
            color:white;
        }
        .text-red{
            color:rgb(209, 24, 24);;
        }
        .table, th, td{
            border: 1px solid black;
        }
        td{
            padding-left: 400px;
            text-align: right;
        }
        .fw-bold{
            font-weight: bold;
        }

        .datos-cliente{
            color: rgb(80, 80, 80);
            position:static;
            margin-left: 60%
        }

        .text-primary{
            color: rgb(80, 80, 80);
        }
        .logo{
            position: absolute;
        }
        /* Estilos para la factura */
    </style>

</head>
<body>
    <div class="logo">
        <img src="{{ public_path('assets/img/logo.png') }}" alt="">
    </div>

    <div class="datos-cliente">
        <span class="fw-bold">Cliente:</span> <span>{{ $cuota->cliente->nombre }} {{ $cuota->cliente->apellidos }}</span> <br>
        <span class="fw-bold">DNI:</span> <span>{{ $cuota->cliente->dni }}</span> <br>
        <span class="fw-bold">Telefono:</span> <span>{{$cuota->cliente->telefono}}</span> <br>
        <span class="fw-bold">Correo:</span> <span> {{$cuota->cliente->correo}}</span> <br>
        <span class="fw-bold">Cuenta Corriente:</span> <span> {{$cuota->cliente->cuenta_corriente}}</span> <br>
    </div>

    <h1> Cuota Nº: <span class="text-primary"> {{ $cuota->id }} </span> </h1>

    <div>

    <table class="">
        <tr>
            <th class="bg-dark text-white">Concepto:</th>
            <td>{{ $cuota->concepto }}</td>
        </tr>

        <tr>
            <th class="bg-dark text-white">Fecha emision:</th>
            <td>{{ $cuota->fecha_emision }}</td>
        </tr>

        <tr>
            <th class="bg-dark text-white">Importe:</th>
            <td>{{ $cuota->importe }}</td>
        </tr>

        <tr>
            <th class="bg-dark text-white">Estado:</th>
            <td>{{ $cuota->estado }}</td>
        </tr>

        <tr>
            <th class="bg-dark text-white">Fecha pago:</th>
            <td>{{ $cuota->fecha_pago }}</td>
        </tr>

        <tr>
            <th class="bg-dark text-white">Direccion:</th>
            <td>{{ $cuota->direccion }}</td>
        </tr>

        <tr>
            <th class="bg-red text-white">Importe:</th>
            <td class="text-red">{{ $cuota->importe }}</td>
        </tr>
    </table>
</div>
</body>
</html>