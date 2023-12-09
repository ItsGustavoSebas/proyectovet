<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista De Compras') }}
            </h2>
            @can('Crear Nota de Compra')
                <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg"
                    href="{{ route('nota_compra.crear') }}">NUEVA COMPRA</a>
            @endcan
        </div>
    </x-slot>

    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row">
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    ID</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Lote</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Fecha de Compra</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Monto Total</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Acciones</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($nota_compras as $nota_compra)
                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $nota_compra->id }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Lote</span>
                        @foreach ($lotes as $lote)
                            @if ($lote->ID_NotaCompra == $nota_compra->id)
                                {{ $lote->numeroLote }}<br>
                            @endif
                        @endforeach
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Fecha</span>
                        @foreach ($lotes as $lote)
                            @if ($lote->ID_NotaCompra == $nota_compra->id)
                                {{ $lote->fechaCompra }}<br>
                            @endif
                        @endforeach
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Monto Total</span>{{ $nota_compra->montoTotal }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <div class="flex flex-wrap">
                            @can('Reporte de Compra')
                                <a href="{{ route('generarCompraPDF', $nota_compra->id) }}"
                                    class="bg-blue-400 px-2 py-2 rounded-lg" title="Generar Nota de Compra">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                            @endcan
                            @can('Eliminar Nota de Compra')
                                <div>
                                    <form id="formEliminar_{{ $nota_compra->id }}"
                                        action="{{ route('nota_compra.eliminar', $nota_compra->id) }}" method="POST">
                                        @csrf
                                        <button type="button" class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar"
                                            onclick="confirmarEliminacion('{{ $nota_compra->id }}')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </td>
                </tr>
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
