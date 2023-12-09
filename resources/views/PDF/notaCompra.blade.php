<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .receipt-main {
            width: 80%;
            margin: 0 auto;
            border: 2px solid #000;
            border-radius: 10px;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .receipt-title {
            text-align: center;
            text-transform: uppercase;
            font-size: 24px;
            margin: 0;
        }

        .receipt-section {
            margin-top: 15px;
        }

        .receipt-label {
            font-weight: bold;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .receipt-table th,
        .receipt-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .receipt-table th {
            background-color: #f2f2f2;
        }

        .receipt-signatures-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .receipt-signature {
            width: 45%;
            border-top: 1px solid #000;
            padding-top: 10px;
        }

        .signature-info p {
            margin: 5px 0;
            font-size: 12px;
            line-height: 1.5;
        }

        .signature-line {
            margin-top: 5px;
            border-top: 1px solid #000;
        }

        .receipt-signature p {
            margin: 0;
            line-height: 1.5;
        }

        .receipt-signature p.receipt-line {
            border-bottom: 1px solid #000;
            margin-bottom: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="receipt-main">

        <p class="receipt-title">Nota de Compra</p>

        <div class="receipt-section">
            <span class="receipt-label">Número de Compra:</span>
            <span>{{ $NotaCompra->id }}</span>
        </div>

        <div class="receipt-section">
            <span class="receipt-label">Monto Total:</span>
            <span>{{ $NotaCompra->montoTotal }}</span>
        </div>
        <div class="signature-line"></div>
        @foreach ($lotes as $lote)
            
            <div class="receipt-section">
                <span class="receipt-label">Número de Lote:</span>
                <span>{{ $lote->numeroLote }}</span>
            </div>
            
            <div class="receipt-section">
                <span class="receipt-label">Fecha:</span>
                <span>{{ $lote->fechaCompra }}</span>
            </div>
            <div class="receipt-section">
                <span class="receipt-label">Productos en la Compra</span>
                <table class="receipt-table">
                    <thead>
                        <tr>
                            <th>Productos</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lotesprod[$lote->id] as $loteprod)
                            <tr>
                                <td>{{ $loteprod->producto->nombre }}</td>
                                <td>{{ $loteprod->cantidadComprada }}</td>
                                <td>{{ $loteprod->precioCompra }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
        <div class="receipt-signatures-container">
            <div class="receipt-signature">
                <div class="signature-info">
                    <p>AGRO - VETERINARIA "LA HACIENDA"</p>
                    <p>Telf.: 3541800 Cel.:72636967</p>
                    <p>Av.Piraí Nro.3160, Zona/Barrio Villa Rosario UV. 53 Maz. 7</p>
                    <p>Santa Cruz - Bolivia</p>
                </div>
                <div class="signature-line"></div>
            </div>
        </div>
    </div>

</body>

</html>