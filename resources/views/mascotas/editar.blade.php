<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Mascota') }}
        </h2>
    </x-slot>

    <form action="{{ route('mascotas.actualizar', $mascota->id) }}" method="POST">
        @csrf
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 p-5">
                <div class="relative z-0">
                    <input id="nombre" type="text" name="nombre"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        value="{{ $mascota->nombre }}" placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Nombre</label>
                </div>
                <div class="relative z-0">
                    <label for="sexo">Sexo:</label>
                    <select name="sexo" id="sexo" class="form-control">
                        <option value="M" {{ $mascota->sexo == 'M' ? 'selected' : '' }}>Macho</option>
                        <option value="H" {{ $mascota->sexo == 'H' ? 'selected' : '' }}>Hembra</option>
                    </select>
                </div>
                <div class="relative z-0">
                    <input id="color" type="text" name="color"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        value="{{ $mascota->color }}" placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Color</label>
                </div>
                <div class="relative z-0">
                    <input id="fechaNacimiento" type="text" name="fechaNacimiento"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        value="{{ $mascota->fechaNacimiento }}" placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Fecha
                        de Nacimiento</label>
                </div>
                <label class="flex radio p-2 cursor-pointer font-extralight text-xs">
                    <input class="my-auto transform scale-125" type="checkbox" name="esterilizado" id="esterilizado" value="1" {{ $mascota->esterilizado ? 'checked' : '' }} />
                    <div class="title px-2 my-auto text-sm text-gray-500">Esterilizado</div>
                </label>
                
                <div class="relative z-0">
                    <input id="edad" type="text" name="edad"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        value="{{ $mascota->edad }}" placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Edad</label>
                </div>
                <div class="relative z-0">
                    <label for="ID_Especie">Especie:</label>
                    <select name="ID_Especie" id="ID_Especie">
                        <option value="">Selecciona una especie existente</option>
                        @foreach ($especies as $especie)
                            <option value="{{ $especie->id }}" {{ $mascota->ID_Especie == $especie->id ? 'selected' : '' }}>{{ $especie->nombre }}</option>
                        @endforeach
                        <option value="nueva">Ingresar nueva especie</option>
                    </select>
                
                    <div id="nuevaEspecieContainer" style="display:none">
                        <label for="nuevaEspecie">Nueva Especie:</label>
                        <input type="text" name="nuevaEspecie" id="nuevaEspecie">
                    </div>
                </div>
                <div class="relative z-0">
                    <label for="ID_Raza">Raza:</label>
                    <select name="ID_Raza" id="ID_Raza">
                        <option value="">Selecciona una raza existente</option>
                        @foreach ($razas as $raza)
                            <option value="{{ $raza->id }}" {{ $mascota->ID_Raza == $raza->id ? 'selected' : '' }}>{{ $raza->nombre }}</option>
                        @endforeach
                        <option value="nueva">Ingresar nueva raza</option>
                    </select>
                
                    <div id="nuevaRazaContainer" style="display:none">
                        <label for="nuevaRaza">Nombre:</label>
                        <input type="text" name="nuevaRaza" id="nuevaRaza">
                        <br>
                        <label for="descripcionRaza">Descripción:</label>
                        <textarea name="descripcionRaza" id="descripcionRaza"></textarea>
                    </div>
                </div>
                
                <div class="relative z-0">
                    <input id="ID_Cliente" type="text" name="ID_Cliente"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        value="{{ $mascota->ID_Cliente }}" placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">ID del dueño</label>
                </div>
                <div class="relative z-0">
                    <input id="peso" type="text" name="peso"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        value="{{ $mascota->historial->peso }}" placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Peso</label>
                </div>
                <div class="relative z-0">
                    <input id="altura" type="text" name="altura"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        value="{{ $mascota->historial->altura }}" placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Altura</label>
                </div>
                <div class="relative z-0">
                    <input id="observacion" type="text" name="observacion"
                        class="peer block w-full appearance-none border-0 border-b border-gray-500 bg-transparent py-2.5 px-0 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0"
                        value="{{ $mascota->historial->observacion }}" placeholder=" " />
                    <label
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Observacion</label>
                </div>
                <div class = "p-5">
                    <button type ="submit" class="bg-blue-600 text-white fond-bold px-6 py-3 rounded-lg">
                        <i class= "fa-solid fa-floppy-disk">Guardar</i>
                    </button>
                </div>
            </div>

        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Manejo de especie
            $('#ID_Especie').change(function() {
                if ($(this).val() === 'nueva') {
                    $('#nuevaEspecieContainer').show();
                } else {
                    $('#nuevaEspecieContainer').hide();
                }
            });

            // Manejo de raza
            $('#ID_Raza').change(function() {
                if ($(this).val() === 'nueva') {
                    $('#nuevaRazaContainer').show();
                } else {
                    $('#nuevaRazaContainer').hide();
                }
            });
        });
    </script>


</x-app-layout>
