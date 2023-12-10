<x-app-layout>
    <x-slot name="header">
        <div class = "flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('lista de clientes') }}
            </h2>
            @can('Crear Cliente')
                <a class = "px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg"
                    href="{{ route('clientes2.crear') }}">REGISTRAR CLIENTE</a>
            @endcan
        </div>
    </x-slot>

    <title>Clientes</title>

    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr
                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    ID</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Nombre</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Correo Electronico</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Direccion</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Telefono</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    C.I.</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Acciones</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($clientesUsuarios as $cliente)
                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $cliente->usuario->id }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Nombre</span>{{ $cliente->usuario->name }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Correo
                            Electronico</span>{{ $cliente->usuario->email }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Direccion</span>{{ $cliente->usuario->direccion }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Telefono</span>{{ $cliente->usuario->telefono }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">C.I</span>{{ $cliente->usuario->ci }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <div class="flex flex-wrap">
                            <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                            @can('Listar Mascotas del Cliente')
                                <a href="{{ route('mascotas.inicio', $cliente->usuario->id) }}"
                                    class = "bg-white px-2 py-2 rounded-lg" title="Mascotas">
                                    <i class="fa-solid fa-paw"></i>
                                </a>
                            @endcan
                            @can('Crear Reserva')
                                <a href="{{ route('reservar.inicio', $cliente->usuario->id) }}"
                                    class = "bg-white px-2 py-2 rounded-lg" title="Reservar Cita">
                                    <i class="fas fa-plus"></i>
                                </a>
                            @endcan
                            @can('Listar Bitacoras')
                                <a href="{{ route('bitacoras.inicio', $cliente->usuario->id) }}"
                                    class = "bg-white px-2 py-2 rounded-lg" title="Bitacora">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                            @endcan
                            @can('Editar Cliente')
                                <a href="{{ route('clientes2.editar', $cliente->usuario->id) }}"
                                    class = "bg-green-400 px-2 py-2 rounded-lg" title="Editar">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                            @endcan
                            @can('Eliminar Cliente')
                                <div>
                                    <form id="formEliminar_{{ $cliente->usuario->id }}"
                                        action="{{ route('clientes2.eliminar', $cliente->usuario->id) }}" method="POST">
                                        @csrf
                                        <button type="button" class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar"
                                            onclick="confirmarEliminacion('{{ $cliente->usuario->id }}')">
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
