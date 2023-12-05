<x-app-layout>


    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Lotes') }}
            </h2>
            <div>
                @can('Crear Lote')
                    <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg" href="{{ route('lotes.crear') }}">CREAR
                        LOTE</a>
                @endcan
                @can('Crear Lote')
                    <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg"
                        href="{{ route('lotes.inicio') }}">INICIO</a>
                @endcan
                @can('Crear Lote')
                    <a class="px-3 py-2 bg-red-600 font-bold text-white rounded-lg"
                        href="{{ route('generarReporte') }}">GENERAR REPORTE</a>
                @endcan
                @can('Crear Lote')
                    <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg"
                        href="{{ route('lotes.reporteSFechaCompra') }}">REPORTE SEMANAL</a>
                @endcan
            </div>
        </div>
    </x-slot>
    <div class="bg-white">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">LOTES</h2>
        </div>
        <div class="my-2 flex sm:flex-row flex-col">
            <form method="GET" action="{{ route('lotes.filtrarLotesPorMes') }}">
                @csrf
                <label for="mes">Selecciona un mes:</label>
                <select name="mes" id="mes">
                    @foreach ($meses as $numeroMes => $nombreMes)
                        <option value="{{ $numeroMes }}">{{ $nombreMes }}</option>
                    @endforeach
                </select>
                <label for="filtro">Selecciona un atributo:</label>
                <select name="filtro" id="filtro">
                    <option value="fechaCompra">Fecha de Compra</option>
                    <option value="fechaVencimiento">Fecha de Vencimiento</option>
                </select>
                <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-lg ml-4">Filtrar</button>
            </form>
        </div>
    </div>

    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr
                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                <th ROWSPAN=2
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    ID</th>
                <th ROWSPAN=2
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Acciones</th>
                <th ROWSPAN=2
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Número de Lote</th>
                <th ROWSPAN=2
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Fecha de Compra
                    <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg" title="Reporte_Semanal"
                        href="{{ route('lotes.reporteSFechaCompra') }}">R.S.</a>
                    <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg" title="Reporte_Mensual"
                        href="{{ route('lotes.reporteSFechaCompra') }}">R.M.</a>
                </th>
                <th ROWSPAN=2
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Fecha de Vencimiento
                    <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg" title="Reporte_Semanal"
                        href="{{ route('lotes.reporteSFechaVencimiento') }}">R.S.</a>
                    <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg" title="Reporte_Mensual"
                        href="{{ route('lotes.reporteSFechaVencimiento') }}">R.M.</a>
                </th>
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
                            <span class="inline-block w-1/3 md:hidden font-bold">LOTE ID</span>{{ $lote->id }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                            rowspan="{{ $loteprodCount }}">

                            <div class="flex flex-wrap">
                                <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                                @can('Editar Lote')
                                    <a href="{{ route('lotes.editar', $lote->id) }}"
                                        class="bg-green-400 px-2 py-2 rounded-lg" title="Editar">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                @endcan
                                @can('Eliminar Lote')
                                    <div>
                                        <form id="formEliminar_{{ $lote->id }}"
                                            action="{{ route('lotes.eliminar', $lote->id) }}" method="POST">
                                            @csrf
                                            <button type="button" class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar"
                                                onclick="confirmarEliminacion('{{ $lote->id }}')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endcan
                                @can('Rembolsar Lote')
                                    <a href="{{ route('lotes.reembolsar', $lote->id) }}"
                                        class="bg-red-400 px-2 py-2 rounded-lg" title="Reembolsar">
                                        <i class="fa-solid fa-circle-exclamation"></i>
                                    </a>
                                @endcan
                            </div>
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                            rowspan="{{ $loteprodCount }}">
                            <span class="inline-block w-1/3 md:hidden font-bold">Número de
                                Lote </span>{{ $lote->numeroLote }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                            rowspan="{{ $loteprodCount }}">
                            <span class="inline-block w-1/3 md:hidden font-bold">Fecha de
                                Compra </span>{{ $lote->fechaCompra }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                            rowspan="{{ $loteprodCount }}">
                            <span class="inline-block w-1/3 md:hidden font-bold">Fecha de
                                Vencimiento </span>{{ $lote->fechaVencimiento }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                            rowspan="{{ $loteprodCount }}">
                            <span class="inline-block w-1/3 md:hidden font-bold">Proveedor </span>
                            {{ optional($lote->proveedor)->nombre ?? 'N/A' }}
                        </td>

                        @foreach ($lote->loteprod as $index => $loteprod)
                            @if ($index > 0)
                    <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                @endif
                <td class="p-2 md:border md:border-grey-500 text-left block md:hidden">
                    <span class="inline-block w-1/2 font-bold text-center">Producto {{ $index + 1 }}</span>
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/3 md:hidden font-bold">Nombre
                    </span>{{ $loteprod->producto->nombre }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/3 md:hidden font-bold">Cantidad Comprada
                    </span>{{ $loteprod->cantidadComprada }} {{ $loteprod->medida->sigla }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">Cantidad Actual
                    </span>{{ $loteprod->cantidadActual }}
                    {{ $loteprod->medida->sigla }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">Precio Compra
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

    <script>
        @if (Session::has('eliminado'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('eliminado') }}")
        @endif
        @if (Session::has('actualizado'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('actualizado') }}")
        @endif
        @if (Session::has('creado'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('creado') }}")
        @endif
    </script>
</x-app-layout>
