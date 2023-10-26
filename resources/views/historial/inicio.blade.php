<x-app-layout>
    <x-slot name="header">
        <div class = "flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Historial Médico de ' . $mascota->nombre) }}
            </h2>
        </div>
    </x-slot>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 p-2">
            <div class="relative z-0">
                <div class="block text-sm text-gray-900">
                    <p class="font-bold">Peso:</p>
                    <p>{{ $historial->peso }}</p>
                </div>
            </div>
            <div class="relative z-0">
                <div class="block text-sm text-gray-900">
                    <p class="font-bold">Altura:</p>
                    <p>{{ $historial->altura }}</p>
                </div>
            </div>
            <div class="relative z-0">
                <div class="block text-sm text-gray-900">
                    <p class="font-bold">Observación:</p>
                    <p>{{ $historial->observacion }}</p>
                </div>
            </div>
        </div>
    </div>
    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr
                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    ID</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Duración</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Fecha de Inico</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Fecha de Fin</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Siguiente Visita</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Descripción</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Precio</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Acciones</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($tratamientos as $tratamiento)
                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $tratamiento->id }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Duración</span>{{ $tratamiento->duracion }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Fecha de
                            Inico</span>{{ $tratamiento->fechaInicio }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Fecha de
                            Fin</span>{{ $tratamiento->fechaFin }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Siguiente
                            Visita</span>{{ $tratamiento->siguienteVisita }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $tratamiento->tratamiento->id }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Diagnostico</span>{{ $tratamiento->tratamiento->diagnostico }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Descripción</span>{{ $tratamiento->tratamiento->descripcion }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Precio</span>{{ $tratamiento->tratamiento->precio }}
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
