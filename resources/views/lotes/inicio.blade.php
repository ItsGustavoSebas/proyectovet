<x-app-layout>


    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Lotes') }}
            </h2>
            @can('Crear Lote')
            <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg" href="{{ route('lotes.crear') }}">CREAR
                LOTE</a>
            @endcan
        </div>
    </x-slot>

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
                    <span class="inline-block w-1/3 md:hidden font-bold">LOTE ID</span>{{ $lote->id }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                    rowspan="{{ $loteprodCount }}">

                    <div class="flex flex-wrap">
                        <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                        @can('Editar Lote')
                        <a href="{{ route('lotes.editar', $lote->id) }}" class="bg-green-400 px-2 py-2 rounded-lg"
                            title="Editar">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        @endcan
                        @can('Eliminar Lote')
                        <div>
                            <form action="{{ route('lotes.eliminar', $lote->id) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de eliminar?')">
                                @csrf
                                <button type="submit" class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        @endcan
                        @can('Rembolsar Lote')
                        <a href="{{ route('lotes.reembolsar', $lote->id) }}" class="bg-red-400 px-2 py-2 rounded-lg"
                            title="Reembolsar">
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
                    {{ $lote->proveedor->nombre }}
                </td>

                @foreach ($lote->loteprod as $index => $loteprod)
                @if ($index > 0)
            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                @endif
                <td class="p-2 md:border md:border-grey-500 text-left block md:hidden">
                    <span class="inline-block w-1/2 font-bold text-center">Producto {{ $index + 1 }}</span>
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/3 md:hidden font-bold">Nombre </span>{{ $loteprod->producto->nombre }}
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
                        class="inline-block w-1/3 md:hidden font-bold">Precio Compra </span>{{ $loteprod->precioCompra
                    }}
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