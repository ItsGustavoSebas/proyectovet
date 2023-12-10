<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Proveedor') }}
        </h2>
    </x-slot>

    <title>Editar_Proveedor</title>

    <form action="{{ route('proveedor.actualizar', $proveedor->id) }}" method="POST">
        @csrf
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 p-5">
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> Nombre</label>
                    <input id="nombre" name = "nombre" type="text" class="px3 py2 w-full rounded-xl bg-blue-100" value="{{ $proveedor->nombre }}">
                    @error('nombre')
                        <strong class = "text-red-500">Debes ingresar tu nombre</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> Correo</label>
                    <input id="correo" name = "correo" type="text" class="px3 py2 w-full rounded-xl bg-blue-100" value="{{ $proveedor->correo }}">
                    @error('email')
                        <strong class = "text-red-500">Debes ingresar tu email</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> Telefono</label>
                    <input id="telefono" name = "telefono" type="text" class="px3 py2 w-full rounded-xl bg-blue-100" value="{{ $proveedor->telefono }}" 
                    placeholder="Ingresa tu telefono">
                    @error('telefono')
                        <strong class = "text-red-500">Debes ingresar tu telefono</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> Direccion</label>
                    <input id="direccion" name = "direccion" type="text" class="px3 py2 w-full rounded-xl bg-blue-100" value="{{ $proveedor->direccion }}" 
                    placeholder="Ingresa tu direccion">
                    @error('direccion')
                        <strong class = "text-red-500">Debes ingresar tu direccion</strong>
                    @enderror
                </div>
                <div class = "p-5">
                    <button type ="submit" class="bg-blue-600 text-white fond-bold px-6 py-3 rounded-lg">
                        <i class= "fa-solid fa-floppy-disk">Guardar</i>
                    </button>
                </div>

            </div>

        </div>
    </form>

</x-app-layout>
