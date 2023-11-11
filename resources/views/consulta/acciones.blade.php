<x-app-layout>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 p-2">
            <div class="relative z-0">
                <div class="block text-sm text-gray-900">
                    <p class="font-bold">Motivo:</p>
                    <p>{{ $consulta->Motivo }}</p>
                </div>
            </div>
            <div class="relative z-0">
                <div class="block text-sm text-gray-900">
                    <p class="font-bold">Monto Total:</p>
                    <p>{{ $consulta->MontoTotal }}</p>
                </div>
            </div>
            <div class="relative z-0">
                <div class="block text-sm text-gray-900">
                    <p class="font-bold">Observación:</p>
                    <p>{{ $consulta->Observacion }}</p>
                </div>
            </div>
            <a class = "px-3 py-2 bg-red-600 font-bold text-white rounded-lg"
            href="{{ route('reservar.consultar') }}">FINALIZAR</a>
        </div>
        
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
    <table class="min-w-full border-collapse block md:table">
        <div class = "flex flex-wrap justify-between p-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight px-3 py-2">
                {{ __('Tratamientos de la consulta') }}
            </h2>
            <a class = "px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg"
                href="{{ route('traconsulta.crear', $consulta->id) }}">AÑADIR TRATAMIENTO</a>
        </div>

        <thead class="block md:table-header-group">
            <tr
                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
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
                    Diagnostico</th>
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
                            class="inline-block w-1/3 md:hidden font-bold">Duración</span>{{ $tratamiento->duracion }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Fecha de
                            Inicio</span>{{ $tratamiento->FechaInicio }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Fecha de
                            Fin</span>{{ $tratamiento->FechaFin }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Siguiente
                            Visita</span>{{ $tratamiento->SiguienteVisita }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Diagnostico</span>{{ $tratamiento->tratamiento->diagnostico }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Descripción</span>{{ $tratamiento->tratamiento->descripcion }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Precio</span>{{ $tratamiento->tratamiento->precio }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <div class="flex flex-wrap">
                            <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                            <a href="{{ route('traconsulta.editar', $tratamiento->id) }}"
                                class = "bg-green-400 px-2 py-2 rounded-lg" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <div>
                                <form action="{{ route('traconsulta.eliminar', $tratamiento->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estas seguro de eliminar?')">
                                    @csrf
                                    <button type = "submit"class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
    <div class = "flex flex-wrap justify-between p-2">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recetas de la consulta') }}
        </h2>
    </div>
</div>
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
