<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Tratamiento') }}
        </h2>
    </x-slot>

    <form action="{{ route('traconsulta.actualizar', ['ID_Consulta' => $traconsulta->ID_Consulta, 'ID_Tratamiento' => $traconsulta->ID_Tratamiento]) }}" method="POST">
        @csrf
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 p-5">
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> Duración</label>
                    <input id="duracion" name = "duracion" type="text" class="px3 py2 w-full rounded-x1 bg-blue-100" 
                    placeholder="Ingresa la duración" value="{{ $traconsulta->duracion }}">
                    @error('duracion')
                        <strong class = "text-red-500">Debes ingresar la duracion</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> fecha de Inicio</label>
                    <input id="FechaInicio" name = "FechaInicio" type="date" class="px3 py2 w-full rounded-x1 bg-blue-100" 
                    placeholder="Ingresa tu fechaInicio" value="{{ $traconsulta->FechaInicio }}">
                    @error('fechaInicio')
                        <strong class = "text-red-500">Debes ingresar la fecha de Inicio</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> fecha de Fin</label>
                    <input id="FechaFin" name = "FechaFin" type="date" class="px3 py2 w-full rounded-x1 bg-blue-100" 
                    placeholder="Ingresa la fecha de Fin" value="{{ $traconsulta->FechaFin }}">
                    @error('fechaFin')
                        <strong class = "text-red-500">Debes ingresar la fecha de Fin</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for=""> siguiente Visita</label>
                    <input id="SiguienteVisita" name = "SiguienteVisita" type="date" class="px3 py2 w-full rounded-x1 bg-blue-100" 
                    placeholder="Ingresa la siguiente Visita" value="{{ $traconsulta->SiguienteVisita }}">
                    @error('siguienteVisita')
                        <strong class = "text-red-500">Debes ingresar la siguiente Visita</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="">Selecciona un tratamiento</label>
                    <select name="ID_Tratamiento" id="SiguienteVisita">
                        <option value="">Selecciona un tratamiento</option>
                        @foreach ($tratamientos as $tratamiento)
                            <option value="{{ $tratamiento->id }}">
                                Diagnóstico: {{ $tratamiento->diagnostico }} - Descripción: {{ $tratamiento->descripcion }} - Precio: Bs.{{ $tratamiento->precio }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                
                <input type="hidden" name="ID_Consulta" id="ID_Consulta" value="{{ $traconsulta->ID_Consulta }}">
                <input type="hidden" name="ID_Historial" id="ID_Historial" value="{{ $traconsulta->ID_Historial }}">
                <div class = "p-5">
                    <button type ="submit" class="bg-blue-600 text-white fond-bold px-6 py-3 rounded-lg">
                        <i class= "fa-solid fa-floppy-disk">Guardar</i>
                    </button>
                </div>

            </div>

        </div>
    </form>

</x-app-layout>
