<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>

        <style>
            @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css');
        </style>
        <title>Editar producto</title>
    </head>
    <form action="{{ route('productos.actualizar', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-gradient-to-r from-indigo-700 to-indigo-950 p-8">
            <!-- Cuadro exterior con fondo azul marino y relleno de 8 unidades -->
            <div class="bg-gray-100 p-4 overflow-hidden shadow-xl sm:rounded-lg m-5 ">
                <div class= "text-center font-sans text-black font-bold text-3xl antialiased pb-10 mt-10">
                    EDITAR PRODUCTO
                </div>
                <div>
                    <label class="font-bold text-lg" for=""> Nombre</label>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-tag"></i>
                                </div>
                                <input id= "nombre" type="string" name="nombre"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="Ingresar el nombre" value="{{ old('nombre', $producto->nombre) }}">
                                @error('nombre')
                                    <strong class = "text-red-500">Debes ingresar el nombre</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="font-bold text-lg" for=""> Precio de Venta</label>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-money-bill"></i>
                                </div>
                                <input id= "precioVenta" type="string" name="precioVenta"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="Ingresar el Precio de Venta" value="{{ old('precioVenta', $producto->precioVenta) }}">
                                @error('precioVenta')
                                    <strong class = "text-red-500">Debes ingresar el Precio de Venta</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="font-bold text-lg" for=""> Descripcion</label>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-regular fa-file"></i>
                                </div>
                                <input id= "descripcion" type="string" name="descripcion"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="Ingresar la descripcion" value="{{ old('descripcion', $producto->descripcion) }}">
                                @error('descripcion')
                                    <strong class = "text-red-500">Debes ingresar la descripcion</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="font-bold text-lg" for=""> Categoria</label>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-filter"></i>
                                </div>
                                <select name="ID_Categoria" id="ID_Categoria" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500">
                                    <option value="">Selecciona la categoria</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" @if ($producto->ID_Categoria == $categoria->id) selected @endif>{{ $categoria->Nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label class="font-bold text-lg" for=""> Marca</label>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-regular fa-registered"></i>
                                </div>
                                <select name="ID_Marca" id="ID_Marca" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500">
                                    <option value="">Selecciona la marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}" @if ($producto->ID_Marca == $marca->id) selected @endif>{{ $marca->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @can('Actualizar Productos')
                <div class="flex -mx-3 pt-9">
                    <div class="w-full px-3 mb-5">
                        <button type ="submit" id="guardar"
                            class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Guardar
                        </button>
                    </div>
                </div>
                @endcan
            </div>
        </div>
        </div>
    </form>
</x-app-layout>
