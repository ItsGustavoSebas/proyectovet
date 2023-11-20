<x-app-layout>
    <x-slot name="header">
        <div class = "flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Productos') }}
            </h2>
            <form action="{{ route('productos.filtrar') }}" method="GET">
                <div class="flex flex-wrap justify-between mt-4">
                    <div class="flex items-center ml-2"> <!-- Añade un margen inferior para separar los elementos -->
                        <label for="categoria">Categoría:</label>
                        <select name="categoria" id="categoria" class="ml-2 p-1 border rounded-md w-52">
                            <option value="">Seleccione una categoría</option>
                            <!-- Opciones de categorías -->
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center ml-2"> <!-- Añade un margen inferior para separar los elementos -->
                        <label for="marca">Marca:</label>
                        <select name="marca" id="marca" class="ml-2 p-1 border rounded-md w-48">
                            <option value="">Seleccione una marca  </option>
                            <!-- Opciones de marcas -->
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-lg ml-4">Filtrar</button>
                </div>
            </form>
            
            @can('Crear Productos')
            <a class = "px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg"
                href="{{ route('productos.crear') }}">AÑADIR PRODUCTO</a>
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
                            class="inline-block w-1/3 md:hidden font-bold">Tiempo</span>{{ $producto->nombre }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">ID_Cita</span>{{ $producto->precioVenta }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Servicio</span>{{ $producto->descripcion }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                            class="inline-block w-1/3 md:hidden font-bold">Empleado</span>{{ $producto->cantidadGeneral  }}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold">Empleado</span>{{ $producto->categoria->Nombre  }}
                </td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                    class="inline-block w-1/3 md:hidden font-bold">Empleado</span>{{ $producto->marca->nombre  }}
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
                                <form action="{{ route('productos.eliminar', $producto->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estas seguro de eliminar?')">
                                    @csrf
                                    <button type = "submit"class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar">
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
