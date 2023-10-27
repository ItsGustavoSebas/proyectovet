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
        <title>EditarEmpleado</title>
    </head>
    <form action="{{ route('usuarios.ractualizar', $usuario->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-gradient-to-r from-cyan-600 to-blue-800 p-8">
            <!-- Cuadro exterior con fondo azul marino y relleno de 8 unidades -->
            <div class="bg-gray-100 p-4 overflow-hidden shadow-xl sm:rounded-lg m-5 ">
                <div class= "text-center font-sans text-black font-bold text-3xl antialiased pb-10 mt-10">
                    EDITAR EMPLEADO
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
                                    placeholder="Ingresar nombre" value="{{ $usuario->name }}">
                                @error('name')
                                    <strong class = "text-red-500">Debes ingresar tu nombre</strong>
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
                                    placeholder="ingresar correo electrónico" value="{{ $usuario->email }}">
                                @error('email')
                                    <strong class = "text-red-500">Debes ingresar tu email</strong>
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
                                    placeholder="ingresar dirección" value="{{ $usuario->direccion }}">
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
                                    placeholder="Ingresar teléfono" value="{{ $usuario->telefono }}">
                                @error('telefono')
                                    <strong class = "text-red-500">Debes ingresar tu telefono</strong>
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
                                    placeholder="Ingresar C.I." value="{{ $usuario->ci }}">
                                @error('ci')
                                    <strong class = "text-red-500">Debes ingresar tu ci</strong>
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
                                    placeholder="ingresar Contraseña">
                                @error('password')
                                    <strong class="text-danger">Debes ingresar una contraseña</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-center items-center space-x-6 py-9 pb-10">
                        <div class="shrink-0">
                            <img id="imagen" src="{{ asset($usuario->profile_photo_path) }}"
                                style="width: 100px; height: 100px;" class="object-cover rounded-full" alt="Imagen del empleado">
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" id="profile_photo_url" name="profile_photo_url"
                                onchange="loadFile(event)"
                                class="block w-full text-sm text-slate-500
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-full file:border-0
                              file:text-sm file:font-semibold
                              file:bg-violet-50 file:text-violet-700
                              hover:file:bg-violet-100
                            " />
                        </label>
                        @error('profile_photo_url')
                            <strong class="text-danger">Debes ingresar una imagen</strong>
                        @enderror
                    </div>

                    <script>
                        var loadFile = function(event) {
                            var input = event.target;
                            var file = input.files[0];
                            var type = file ? file.type : null;
                    
                            var output = document.getElementById('imagen');
                            if (file) {
                                // Si se selecciona un archivo, muestra la vista previa
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function() {
                                    URL.revokeObjectURL(output.src); // libera memoria
                                }
                
                            }
                        };
                    </script>

                    {{-- <script>
                        var loadFile = function(event) {

                            var input = event.target;
                            var file = input.files[0];
                            var type = file.type;

                            var output = document.getElementById('imagen');

                            output.src = URL.createObjectURL(event.target.files[0]);
                            output.onload = function() {
                                URL.revokeObjectURL(output.src) // free memory
                            }

                        };
                    </script> --}}


                    <div class="flex -mx-3 pt-9">
                        <div class="w-full px-3 mb-5">
                            <button type ="submit" id="actualizar"
                                class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"
                                >GUARDAR
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</x-app-layout>