<x-app-layout>
    <x-slot name="header">
        <div class = "flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Productos') }}
            </h2>
            <form action="{{ route('productos.buscar') }}" method="GET">
                <div class="flex items-center justify-between mt-4">
                    <label for="busqueda">Buscar:</label>
                    <input type="text" name="busqueda" id="busqueda" class="ml-2 p-1 border rounded-md"
                        placeholder="Buscar" value="{{ isset($terminoBusqueda) ? $terminoBusqueda : '' }}">
                        
                    <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-lg ml-4">Buscar</button>
                </div>
            </form>
            
            @can('Crear Productos')
            <a class = "px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg"
                href="{{ route('productos.crear') }}">AÑADIR PRODUCTO</a>
            @endcan
        </div>

    </x-slot>

    <title>Productos</title>

    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr
                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    ID</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    nombre</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    precio de Venta</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    descripcion</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    cantidad General</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Categoria</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Marca</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Acciones</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($productos as $producto)
                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">ID</span>{{ $producto->id }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Nombre</span>{{ $producto->nombre }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Precio de Venta</span>{{ $producto->precioVenta }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Descripción</span>{{ $producto->descripcion }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Cantidad Gemeral</span>{{ $producto->cantidadGeneral  }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">Categoria</span>{{ optional($producto->categoria)->Nombre ?? 'N/A'  }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                    class="inline-block w-1/3 md:hidden font-bold">Marca</span>{{ optional($producto->marca)->nombre ?? 'N/A'  }}
            </td>
            </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <div class="flex flex-wrap">
                            <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                            @can('Editar Productos')
                            <a href="{{ route('productos.editar', $producto->id) }}"
                                class = "bg-green-400 px-2 py-2 rounded-lg" title="Editar">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            @endcan
                            @can('Eliminar Productos')
                            <div>
                                <form id="formEliminar_{{ $producto->id }}"
                                    action="{{ route('productos.eliminar', $producto->id) }}" method="POST">
                                    @csrf
                                    <button type="button" class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar"
                                        onclick="confirmarEliminacion('{{ $producto->id }}')">
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
