<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RECIBO</title>
    <style>
        body {
            padding: 50px;
        }

        * {
            box-sizing: border-box;
        }

        .receipt-main {
            display: inline-block;
            width: 100%;
            padding: 15px;
            font-size: 12px;
            border: 1px solid #000;
        }

        .receipt-title {
            text-align: center;
            text-transform: uppercase;
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }

        .receipt-label {
            font-weight: 600;
        }

        .text-large {
            font-size: 16px;
        }

        .receipt-section {
            margin-top: 10px;
        }

        .receipt-footer {
            text-align: center;
            background: #ff0000;
        }

        .receipt-signature {
            height: 80px;
            margin: 50px 0;
            padding: 0 50px;
            background: #fff;

            .receipt-line {
                margin-bottom: 10px;
                border-bottom: 1px solid #000;
            }

            p {
                text-align: center;
                margin: 0;
            }
        }

        /* Agregado para la rejilla */
        .receipt-signatures-container {
            display: flex;
            justify-content: space-between;
        }

        .receipt-signature {
            width: 48%; /* Ajusta según sea necesario */
        }
    </style>
</head>

<body>

    <div class="receipt-main">

        <p class="receipt-title">Recibo</p>

        <div class="receipt-section pull-left">
            <span class="receipt-label text-large">Número de Recibo:</span>
            <span class="text-large">{{$Recibo->nroRecibo}}</span>
        </div>

        <div class="pull-right receipt-section">
            <span class="text-large receipt-label">Monto Total:</span>
            <span class="text-large">{{$NotaVenta->MontoTotal}}</span>
        </div>

        <div class="clearfix"></div>

        <div class="receipt-section">
            <span class="receipt-label">Nombre del Cliente:</span>
            <span>{{$cliente->name}}</span>
        </div>

        <div class="receipt-section">
            <span class="receipt-label">Tipo:</span>
            <span>{{$NotaVenta->tipo}}</span>
        </div>

        <div class="receipt-section">
            <p class="pull-right text-large">{{$NotaVenta->fecha}}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Productos</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($DetallesVentas as $DetalleVenta)
                    <tr>
                        <?php 
                        $Nombre=$DetalleVenta->producto->nombre>
    
                        <td>{{ $Nombre }}</td>
                        <td>{{ $DetalleVenta->cantidad }}</td>
                        <td>{{ $DetalleVenta->precio }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearfix"></div>

        <div class="receipt-signatures-container">
            <div class="receipt-signature">
                <p class="receipt-line"></p>
                <p>AGRO - VETERINARIA "LA HACIENDA"</p>
                <p>Telf.: 3541800   Cel.:72636967</p>
                <p>Av.Piraí Nro.3160, Zona/Barrio Villa Rosario UV. 53 Maz. 7</p>
                <p>Santa Cruz - Bolivia</p>
            </div>

            <div class="receipt-signature">
                <p class="receipt-line"></p>
                <p>{{$cliente->name}}</p>
            </div>
        </div>
    </div>

</body>

</html>