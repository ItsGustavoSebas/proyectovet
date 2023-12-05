<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REPORTE</title>
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

    <h2>REPORTE DE LOTES</h2>


    <div class="table-container">
        <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr
                    class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                    <th ROWSPAN=2
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Número de Lote</th>
                    <th ROWSPAN=2
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Fecha de Compra</th>
                    <th ROWSPAN=2
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Fecha de Vencimiento</th>
                    <th ROWSPAN=2
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Proveedor</th>
                    <th COLSPAN=4
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                        Producto
                    </th>
                </tr>
                <tr
                    class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Nombre</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Cantidad Comprada</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Cantidad Actual</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Precio de Compra</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
    
    
    
                @php $prevLoteId = null; @endphp
                @foreach ($lotes as $lote)
                    @if ($lote->estado == 1)
                        @php $loteprodCount = count($lote->loteprod); @endphp
                        <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                                rowspan="{{ $loteprodCount }}">
                                <span class="inline-block w-1/3 md:hidden font-bold"> </span>{{ $lote->numeroLote }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                                rowspan="{{ $loteprodCount }}">
                                <span class="inline-block w-1/3 md:hidden font-bold"> </span>{{ $lote->fechaCompra }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                                rowspan="{{ $loteprodCount }}">
                                <span class="inline-block w-1/3 md:hidden font-bold"> </span>{{ $lote->fechaVencimiento }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                                rowspan="{{ $loteprodCount }}">
                                <span class="inline-block w-1/3 md:hidden font-bold"> </span>
                                {{ optional($lote->proveedor)->nombre ?? 'N/A' }}
                            </td>
    
                            @foreach ($lote->loteprod as $index => $loteprod)
                                @if ($index > 0)
                        <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                    @endif
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">
                        </span>{{ $loteprod->producto->nombre }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">
                        </span>{{ $loteprod->cantidadComprada }} {{ $loteprod->medida->sigla }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">
                        </span>{{ $loteprod->cantidadActual }}
                        {{ $loteprod->medida->sigla }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">
                        </span>{{ $loteprod->precioCompra }}
                        Bs.
                    </td>
                @endforeach
                </tr>
                @php $prevLoteId = $lote->id; @endphp
                @endif
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
