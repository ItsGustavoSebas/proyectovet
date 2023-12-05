<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        /* Estilos CSS para tu PDF */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            /* Elimina el margen para aprovechar más espacio */
        }

        .table-container {
            page-break-inside: auto;
            /* Permite que la tabla se divida entre páginas */
        }

        table {
            width: 100%;
            max-width: 100%;
            table-layout: fixed;
            /* Establece un diseño de tabla fijo para asegurar el ancho */
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            word-wrap: break-word;
            /* Permite el salto de línea en palabras largas */
            text-align: left;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            /* Reduce el espacio interno de las celdas */
            word-wrap: break-word;
            text-align: left;
        }

        tr {
            height: 20px;
            /* Ajusta la altura de las filas según sea necesario */
        }


        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>

    <h2>REPORTE DE NOTAS DE VENTA</h2>

    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr
                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    ID</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Monto Total</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Fecha</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Tipo</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Tipo de Pago</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($nota_ventas as $nota_venta)
                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold"></span>{{ $nota_venta->id }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">
                            Total</span>{{ $nota_venta->montoTotal }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold"></span>{{ $nota_venta->fecha }}</td>
                    @if ($nota_venta->factura)
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold"></span>Factura</td>
                    @else
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold"></span>Recibo</td>
                    @endif
                    @if ($nota_venta->qr)
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold"></span>QR</td>
                    @else
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold"></span>Efectivo</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
