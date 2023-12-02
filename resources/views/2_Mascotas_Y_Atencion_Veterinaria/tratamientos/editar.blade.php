<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Tratamiento') }}
        </h2>
    </x-slot>

    <form action="{{ route('tratamientos.actualizar', $tratamiento->id) }}" method="POST">
        @csrf
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 p-5">
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> Diagnostico</label>
                    <input id="diagnostico" name = "diagnostico" type="text" class="px3 py2 w-full rounded-x1 bg-blue-100" value="{{ $tratamiento->diagnostico }}"
                    placeholder="Ingresa el diagnostico">
                    @error('diagnostico')
                        <strong class = "text-red-500">Debes ingresar el diagnostico</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> descripcion</label>
                    <input id="descripcion" name = "descripcion" type="text" class="px3 py2 w-full rounded-x1 bg-blue-100" value="{{ $tratamiento->descripcion }}"
                    placeholder="Ingresa tu descripcion">
                    @error('descripcion')
                        <strong class = "text-red-500">Debes ingresar la descripcion</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> Precio</label>
                    <input id="precio" name = "precio" type="text" class="px3 py2 w-full rounded-x1 bg-blue-100" value="{{ $tratamiento->precio }}"
                    placeholder="Ingresa el precio">
                    @error('precio')
                        <strong class = "text-red-500">Debes ingresar el precio</strong>
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
