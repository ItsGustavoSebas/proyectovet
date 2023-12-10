<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista de Lotes en proceso de reembolso') }}
            </h2>

        </div>
    </x-slot>

    <title>Reembolsos</title>

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
                <th ROWSPAN=2
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Nombre
                </th>
                <th ROWSPAN=2
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Cantidad comprada
                </th>
                <th ROWSPAN=2
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Cantidad actual
                </th>
                <th ROWSPAN=2
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Precio de compra
                </th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @php $prevLoteId = null; @endphp
            @foreach ($lotes as $lote)
                @if ($lote->estado == 0)
                    @php $loteprodCount = count($lote->loteprod); @endphp
                    <tr class="bg-white border border-grey-500 md:border-none block md:table-row">

                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                            rowspan="{{ $loteprodCount }}">
                            <span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $lote->id }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                            rowspan="{{ $loteprodCount }}">
                            <div class="flex flex-wrap">
                                <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                                <a href="{{ route('lotes.editar', $lote->id) }}"
                                    class="bg-yellow-400 px-2 py-2 rounded-lg" title="Editar">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                &nbsp;

                                <div>
                                    <form id="formEliminar_{{ $lote->id }}"
                                        action="{{ route('lotes.eliminarProdR', $lote->id) }}" method="POST">
                                        @csrf
                                        <button type="button" class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar"
                                            onclick="confirmarEliminacion('{{ $lote->id }}')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                &nbsp;

                                <a href="{{ route('lotes.reembolsarAceptado', $lote->id) }}"
                                    class="bg-green-400 px-2 py-2 rounded-lg" title="Mandar mensaje">
                                    <i class="fa-regular fa-envelope"></i>
                                </a>
                                &nbsp;
                                <div>
                                    <form action="{{ route('lotes.actualizarReembolso', $lote->id) }}" method="POST"
                                        onsubmit="return confirm('Desea finalizar con el proceso de reembolso?')">
                                        @csrf
                                        <button type="submit" class="bg-green-500 px-2 py-2 rounded-lg"
                                            title="Confirmar reembolso">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell md:flex-col md:items-center"
                            rowspan="{{ $loteprodCount }}">
                            <span class="inline-block w-1/3 md:hidden font-bold mb-1"
                                style="vertical-align: middle;">Número de Lote</span>{{ $lote->numeroLote }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                            rowspan="{{ $loteprodCount }}">
                            <span class="inline-block w-1/3 md:hidden font-bold" style="vertical-align: middle;">Fecha
                                de
                                Compra</span>{{ $lote->fechaCompra }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                            rowspan="{{ $loteprodCount }}">
                            <span class="inline-block w-1/3 md:hidden font-bold" style="vertical-align: middle;">Fecha
                                de
                                Vencimiento</span>{{ $lote->fechaVencimiento }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"
                            rowspan="{{ $loteprodCount }}">
                            <span class="inline-block w-1/3 md:hidden font-bold"
                                style="vertical-align: middle;">Proveedor</span>{{ $lote->proveedor->nombre }}
                        </td>
                        @foreach ($lote->loteprod as $index => $loteprod)
                            @if ($index > 0)
                    <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                @endif
                <td class="p-2 md:border md:border-grey-500 text-left block md:hidden">
                    <span class="inline-block w-1/2 font-bold text-center">Producto {{ $index + 1 }}</span>
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/3 md:hidden font-bold" style="vertical-align: middle;">Nombre del
                        producto </span>{{ $loteprod->producto->nombre }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/3 md:hidden font-bold" style="vertical-align: middle;">Cantidad
                        comprada </span> {{ $loteprod->cantidadComprada }} {{ $loteprod->medida->sigla }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/3 md:hidden font-bold" style="vertical-align: middle;">Cantidad actual
                    </span>{{ $loteprod->cantidadActual }} {{ $loteprod->medida->sigla }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <span class="inline-block w-1/3 md:hidden font-bold" style="vertical-align: middle;">Precio compra
                    </span>{{ $loteprod->precioCompra }} Bs.
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
