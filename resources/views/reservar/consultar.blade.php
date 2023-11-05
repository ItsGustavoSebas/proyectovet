<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Citas') }}
            </h2>
        </div>

        <form method="GET">
            <select name="tipo" id="tipo">
                <option value="" disabled selected>Tipo de Cita</option>
                <option value="servicio" @if (request('tipo')=='servicio' ) selected @endif>Servicio</option>
                <option value="consulta" @if (request('tipo')=='consulta' ) selected @endif>Consulta</option>
            </select>
            <button type="submit"
                class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">Filtrar</button>
        </form>

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
                    Descripción</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Fecha Programada</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Hora</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    ID del dueño</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Nombre del dueño</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Acciones</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($citas as $cita)
            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $cita->id }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">Descripción</span>{{ $cita->descripcion }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">Fecha
                        Programada</span>{{ $cita->fechaProgramada }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">Hora</span>{{ $cita->hora }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">ID del Dueño</span>{{ $cita->ID_Cliente }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">Nombre del
                        Dueño</span>{{ $cita->cliente->name }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <div class="flex flex-wrap">

                    

                        @if ($tipo=='servicio')
                         <a href="{{ route('detalleservicio.inicio', $cita->id) }}" class="bg-green-400 px-2 py-2 rounded-lg"
                            title="Atender">
                            <i class="fa-solid fa-check"></i>
                         </a>
                        @else
                         <a href="{{ route('consulta.inicio', $cita->id) }}" class="bg-green-400 px-2 py-2 rounded-lg"
                            title="Atender">
                            <i class="fa-solid fa-check"></i>
                         </a> 
                        @endif

                        <div></div>
                        <form action="{{ route('reservar.eliminar', $cita->id) }}" method="POST"
                            onsubmit="return confirm('¿Estas seguro de eliminar?')">
                            @csrf
                            <button type="submit" class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
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