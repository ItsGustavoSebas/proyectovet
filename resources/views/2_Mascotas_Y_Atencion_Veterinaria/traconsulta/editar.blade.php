<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Tratamiento') }}
        </h2>
    </x-slot>

    <form action="{{ route('traconsulta.actualizar', $traconsulta->id) }}" method="POST">
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
                    <label class="font-bold text-lg" for="">visitas realizadas</label>
                    <input id="visitas_realizadas" name = "visitas_realizadas" type="text" class="px3 py2 w-full rounded-x1 bg-blue-100" 
                    placeholder="Ingresa las visitas realizadas" value="{{ $traconsulta->visitas_realizadas }}">
                    @error('visitas_realizadas')
                        <strong class = "text-red-500">Debes ingresar las visitas realizadas</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="">dosis totales</label>
                    <input id="dosis_totales" name = "dosis_totales" type="text" class="px3 py2 w-full rounded-x1 bg-blue-100" 
                    placeholder="Ingresa las dosis totales" value="{{ $traconsulta->dosis_totales }}">
                    @error('dosis_totales')
                        <strong class = "text-red-500">Debes ingresar las dosis totales</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="">frecuencia</label>
                    <input id="frecuencia" name = "frecuencia" type="text" class="px3 py2 w-full rounded-x1 bg-blue-100" 
                    placeholder="Ingresa la frecuencia" value="{{ $traconsulta->frecuencia }}">
                    @error('frecuencia')
                        <strong class = "text-red-500">Debes ingresar la frecuencia</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="">Selecciona un tratamiento</label>
                    <div class="relative inline-block w-64 mt-1">
                        <select name="ID_Tratamiento" id="SiguienteVisita" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="">Selecciona un tratamiento</option>
                            @foreach ($tratamientos as $tratamiento)
                                <option value="{{ $tratamiento->id }}">
                                    Diagnóstico: {{ $tratamiento->diagnostico }} - Descripción: {{ $tratamiento->descripcion }} - Precio: Bs.{{ $tratamiento->precio }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M6.293 9.293a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L10 11.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4z"/></svg>
                        </div>
                    </div>
                </div>

                
                <input type="hidden" name="ID_Consulta" id="ID_Consulta" value="{{ $consulta->id }}">
                <input type="hidden" name="ID_Historial" id="ID_Historial" value="{{ $traconsulta->ID_Historial }}">
                @can('Actualizar Tratamientos_Masc')
                <div class = "p-5">
                    <button type ="submit" class="bg-blue-600 text-white fond-bold px-6 py-3 rounded-lg">
                        <i class= "fa-solid fa-floppy-disk">Guardar</i>
                    </button>
                </div>
                @endcan
            </div>

        </div>
    </form>

</x-app-layout>
