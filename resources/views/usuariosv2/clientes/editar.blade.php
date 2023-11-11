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
        <title>RegistrarEmpleado</title>
    </head>
    <form action="{{ route('clientes2.actualizar', $cliente->ID_Usuario) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-gradient-to-r from-cyan-600 to-blue-800 p-8">
            <!-- Cuadro exterior con fondo azul marino y relleno de 8 unidades -->
            <div class="bg-gray-100 p-4 overflow-hidden shadow-xl sm:rounded-lg m-5 ">
                <div class= "text-center font-sans text-black font-bold text-3xl antialiased pb-10 mt-10">
                    EDITAR CLIENTE
                </div>
                <div>
                    <label class="font-bold text-lg" for=""> Nombre</label>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-user text-gray-400 text-lg"></i>
                                </div>
                                <input id= "name" type="text" name="name"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="Ingresar nombre" value="{{ $cliente->usuario->name }}">
                                @error('name')
                                    <strong class = "text-red-500">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <label class="font-bold text-lg" for=""> Correo Electronico</label>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-envelope text-gray-400 text-lg"></i>
                                </div>
                                <input id= "email" type="email" name="email"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="ingresar correo electrónico" value="{{ $cliente->usuario->email }}"v>
                                @error('email')
                                    <strong class = "text-red-500">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <label class="font-bold text-lg" for=""> Dirección</label>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-house text-gray-400 text-lg"></i>
                                </div>
                                <input id= "direccion" type="text" name="direccion"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="ingresar dirección" value="{{ $cliente->usuario->direccion }}">
                            </div>
                        </div>
                    </div>
                    <label class="font-bold text-lg" for=""> Teléfono</label>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-phone text-gray-400 text-lg"></i>
                                </div>
                                <input id= "telefono" type="integer" name="telefono"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="Ingresar teléfono" value="{{ $cliente->usuario->telefono }}">
                                @error('telefono')
                                    <strong class = "text-red-500">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-user text-gray-400 text-lg"></i>
                                </div>
                                <input id= "ci" type="integer" name="ci"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="Ingresar C.I." value="{{ $cliente->usuario->ci }}">
                                @error('ci')
                                    <strong class = "text-red-500">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <label class="font-bold text-lg" for=""> Contraseña</label>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-lock text-gray-400 text-lg"></i>
                                </div>
                                <input id= "password" type="password" name="password"
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                                    placeholder="Ingresar Contraseña" value="{{ old('password') }}">
                                @error('password')
                                    <strong class = "text-red-500">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex -mx-3 pt-9">
                        <div class="w-full px-3 mb-5">
                            <button type ="submit" id="registrar"
                                class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"
                                enable>GUARDAR
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</x-app-layout>