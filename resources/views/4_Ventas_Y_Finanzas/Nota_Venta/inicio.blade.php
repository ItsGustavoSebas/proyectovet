<x-app-layout>
    <x-slot name="header">
        <div class = "flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Lista De Ventas') }}
            </h2>
            @can('Crear Nota de Venta')
                <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg"
                    href="{{ route('nota_venta.crear') }}">NUEVA VENTA</a>
            @endcan

        </div>
    </x-slot>

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
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Acciones</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($nota_ventas as $nota_venta)
                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $nota_venta->id }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Monto
                            Total</span>{{ $nota_venta->montoTotal }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Fecha</span>{{ $nota_venta->fecha }}</td>
                    @if ($nota_venta->factura)
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold">Tipo</span>Factura</td>
                    @else
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold">Tipo de Pago</span>Recibo</td>
                    @endif
                    @if ($nota_venta->qr)
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold">Tipo de Pago</span>QR</td>
                    @else
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold">Tipo de Pago</span>Efectivo</td>
                    @endif
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <div class="flex flex-wrap">
                            <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                            @can('Detalles de Nota de Venta')
                                <a href="{{ route('nota_venta.mostrarDetalles', $nota_venta->id) }}"
                                    class = " px-2 py-2 rounded-lg" title="Mostrar Detalles">
                                    <i class="fas fa-plus"></i>
                                </a>
                            @endcan
                            @can('Reporte de Venta')
                                @if ($nota_venta->factura)
                                    <a href="{{ route('generarReciboPDF', $nota_venta->id) }}"
                                        class = "bg-blue-400 px-2 py-2 rounded-lg" title="Generar Factura">
                                        <i class="fas fa-file-alt"></i>
                                    </a>
                                @else
                                    <a href="{{ route('generarReciboPDF', $nota_venta->id) }}"
                                        class = "bg-blue-400 px-2 py-2 rounded-lg" title="Generar Recibo">
                                        <i class="fas fa-file-alt"></i>
                                    </a>
                                @endif
                            @endcan
                            @can('Eliminar Nota de Venta')
                                <div>
                                    <form id="formEliminar_{{ $nota_venta->id }}"
                                        action="{{ route('nota_venta.eliminar', $nota_venta->id) }}" method="POST">
                                        @csrf
                                        <button type="button" class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar"
                                            onclick="confirmarEliminacion('{{ $nota_venta->id }}')">
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
