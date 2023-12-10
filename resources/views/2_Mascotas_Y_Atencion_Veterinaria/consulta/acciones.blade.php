<x-app-layout>

    <title>Acciones</title>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 p-2">
            <div class="relative z-0">
                <div class="block text-sm text-gray-900">
                    <p class="font-bold">Motivo:</p>
                    <p>{{ $consulta->Motivo }}</p>
                </div>
            </div>
            <div class="relative z-0">
                <div class="block text-sm text-gray-900">
                    <p class="font-bold">Monto Total:</p>
                    <p>{{ $consulta->MontoTotal }}</p>
                </div>
            </div>
            <div class="relative z-0">
                <div class="block text-sm text-gray-900">
                    <p class="font-bold">Observación:</p>
                    <p>{{ $consulta->Observacion }}</p>
                </div>
            </div>
            <a class="px-3 py-2 bg-red-600 font-bold text-white rounded-lg"
                href="{{ route('reservar.consultar') }}">FINALIZAR</a>
            <button onclick="mostrarTablaTratamientos()" class="px-3 py-2 bg-green-600 font-bold text-white rounded-lg">
                Mostrar Tratamientos De La Mascota</button>
        </div>

    </div>
    <div id="tablaTratamientos" class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2" style="display: none;">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
            <table class="min-w-full border-collapse block md:table">
                <div class="flex flex-wrap justify-between p-2">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight px-3 py-2">
                        {{ __('Tratamientos de la mascota') }}
                    </h2>
                    @can('Crear Tratamientos_Masc')
                        <a class="px-3 py-2 bg-indigo-600 font-bold text-white rounded-lg"
                            href="{{ route('traconsulta.crear', $consulta->id) }}">AÑADIR TRATAMIENTO</a>
                    @endcan
                </div>
                <thead class="block md:table-header-group">
                    <tr
                        class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Duración</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Fecha de Inico</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Fecha de Fin</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Siguiente Visita</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            visitas realizadas</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            dosis totales</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            frecuencia</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Diagnostico</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Descripción</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Precio</th>
                        <th
                            class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @foreach ($tratamientos as $tratamiento)
                        <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Duración</span>{{ $tratamiento->duracion }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Fecha de
                                    Inicio</span>{{ $tratamiento->FechaInicio }}</td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Fecha de
                                    Fin</span>{{ $tratamiento->FechaFin }}</td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Siguiente
                                    Visita</span>{{ $tratamiento->SiguienteVisita }}</td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">visitas
                                    realizadas</span>{{ $tratamiento->visitas_realizadas }}</td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">dosis
                                    totales</span>{{ $tratamiento->dosis_totales }}</td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">frecuencia</span>{{ $tratamiento->frecuencia }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Diagnostico</span>{{ $tratamiento->tratamiento->diagnostico }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Descripción</span>{{ $tratamiento->tratamiento->descripcion }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                    class="inline-block w-1/3 md:hidden font-bold">Precio</span>{{ $tratamiento->tratamiento->precio }}
                            </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                                <div class="flex flex-wrap">
                                    <span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
                                    @can('Añadir Tratamientos_Cslt')
                                        <button
                                            onclick="mostrarVentanaEmergente('{{ $tratamiento->id }}', '{{ $consulta->id }}', '{{ $tratamiento->tratamiento->precio }}')"
                                            class="bg-green-400 px-2 py-2 rounded-lg mr-2" title="Añadir">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    @endcan
                                    @can('Editar Tratamientos_Masc')
                                        <a href=" {{ route('traconsulta.editar', ['id' => $tratamiento->id, 'id_Consulta' => $consulta->id]) }}"
                                            class="bg-green-400 px-2 py-2 rounded-lg" title="Editar">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                    @endcan
                                    @can('Eliminar Tratamientos_Masc')
                                        <div>
                                            <form
                                                action="{{ route('traconsulta.eliminar', ['id' => $tratamiento->id, 'id_Consulta' => $consulta->id]) }}"
                                                method="POST" onsubmit="return confirm('¿Estas seguro de eliminar?')">
                                                @csrf
                                                <button type="submit" class="bg-red-500 px-2 py-2 rounded-lg"
                                                    title="Eliminar">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
        <table class="min-w-full border-collapse block md:table">
            <div class="flex flex-wrap justify-between p-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight px-3 py-2">
                    {{ __('Tratamientos de la consulta') }}
                </h2>
                <a class = "px-3 py-2 bg-red-800 font-bold text-white rounded-lg "
                    href="{{ route('generarTratamientosConsultaPDF', $consulta->id) }}">Generar PDF</a>
            </div>

            <thead class="block md:table-header-group">
                <tr
                    class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Precio</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Fecha</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Tratamiento</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Acciones</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
                @foreach ($tratamientos_consulta as $tratamiento_consulta)
                    <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold">Duración</span>{{ $tratamiento_consulta->precio }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold">Fecha de
                                Inicio</span>{{ $tratamiento_consulta->fecha }}</td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold">Fecha de
                                Fin</span>{{ $tratamiento_consulta->tratamientoMascota->tratamiento->descripcion }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <div>
                                @can('Eliminar Tratamientos_Cslt')
                                    <form
                                        action="{{ route('traconsulta.eliminarTratamiento', $tratamiento_consulta->id) }}"
                                        method="POST" onsubmit="return confirm('¿Estas seguro de eliminar?')">
                                        @csrf
                                        <button type = "submit"class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-2">
        <table class="min-w-full border-collapse block md:table col-3">
            <div class="flex flex-wrap justify-between p-2">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight px-3 py-2">
                    {{ __('Receta de la consulta') }}
                </h2>
                <div class="flex items-center">
                    @if (!$receta_medica)
                        <!-- Botón Añadir Receta Médica -->
                        <a class="px-3 py-4 bg-indigo-600 font-bold text-white rounded-lg text-center"
                            href="{{ route('RecetaMedica.crear', $consulta->id) }}">AÑADIR RECETA MEDICA</a>
                    @else
                        <!-- Botones Editar y Eliminar Receta Médica -->
                        <a class="px-3 py-4 bg-red-800 font-bold text-white rounded-lg mr-2"
                            href="{{ route('generarRecetaMedicaPDF', $consulta->id) }}">Generar PDF</a>
                        <div class="flex">
                            @can('Editar Receta Medica')
                                <a href="{{ route('RecetaMedica.editar', $receta_medica->id) }}"
                                    class="bg-green-400 px-2 py-2 rounded-lg flex items-center mr-2" title="Editar">
                                    <i class="fa-regular fa-pen-to-square text-white"></i>
                                </a>
                            @endcan

                            @can('Eliminar Receta Medica')
                                <form action="{{ route('RecetaMedica.eliminar', $receta_medica->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar?')" class="ml-2">
                                    @csrf
                                    <button type="submit" class="bg-red-500 px-2 py-2 rounded-lg" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>
            <thead class="block md:table-header-group">
                <tr
                    class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                    <th COLSPAN=3
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                        Producto</th>
                </tr>
                <tr
                    class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Nombre</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Cantidad</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Instrucción</th>
                </tr>
            </thead>
            @if ($receta_medica)
                <tbody class="block md:table-row-group">
                    @php $prevRecetaId = null; @endphp
                    @php $recetaprodCount = count($receta_medica->detalle_receta); @endphp
                    <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                        @foreach ($receta_medica->detalle_receta as $index => $detalle_receta)
                            @if ($index >= 0)
                    <tr class="bg-white border border-grey-500 md:border-none block md:table-row">

                        <td class="p-2 md:border md:border-grey-500 text-left block md:hidden">
                            <span class="inline-block w-1/2 font-bold text-center">Producto {{ $index + 1 }}</span>
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Nombre
                            </span>{{ $detalle_receta->producto->nombre }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                            <span class="inline-block w-1/3 md:hidden font-bold">Cantidad
                            </span>{{ $detalle_receta->Cantidad }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3 md:hidden font-bold">Instruccion
                            </span>{{ $detalle_receta->instrucciones }}
                        </td>
            @endif
            @endforeach
            </tr>
            </tbody>
            @endif
        </table>
    </div>


    <div id="ventanaEmergente" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-md p-6 w-1/2 mx-auto mt-20">
            <!-- Formulario para añadir tratamiento a la consulta -->
            <form id="formVentanaEmergente" action="{{ route('traconsulta.añadirTratamiento') }}" method="POST">
                @csrf
                <input type="hidden" name="ID_Tratamiento" id="inputTratamiento" value="">
                <input type="hidden" name="ID_Consulta" id="inputConsulta" value="">
                <label for="inputFecha">Fecha:</label>
                <input type="date" name="fecha" id="inputFecha" value="">
                <label for="inputPrecio">Precio:</label>
                <input type="text" name="precio" id="inputPrecio" value="">
                <button class="bg-indigo-500 text-white font-bold py-2 px-4 rounded-lg mt-2"
                    type="submit">Guardar</button>
            </form>
            <!-- Botón para cerrar la ventana emergente -->
            <button onclick="cerrarVentanaEmergente()"
                class="bg-red-500 text-white font-bold py-2 px-4 rounded-lg mt-2">Cerrar</button>
        </div>
    </div>
    <script>
        function mostrarVentanaEmergente(idTratamiento, idConsulta, precio) {
            document.getElementById('inputTratamiento').value = idTratamiento;
            document.getElementById('inputConsulta').value = idConsulta;
            document.getElementById('inputPrecio').value = precio;
            document.getElementById('inputFecha').valueAsDate = new Date(); // Establecer fecha actual
            document.getElementById('ventanaEmergente').classList.remove('hidden');

        }

        function cerrarVentanaEmergente() {
            document.getElementById('ventanaEmergente').classList.add('hidden');
        }

        function mostrarTablaTratamientos() {
            var tabla = document.getElementById('tablaTratamientos');
            if (tabla.style.display === 'none') {
                tabla.style.display = 'block';
            } else {
                tabla.style.display = 'none';
            }
        }

        function mostrarTablaReceta() {
            var tabla = document.getElementById('tablaRecetas');
            if (tabla.style.display === 'none') {
                tabla.style.display = 'block';
            } else {
                tabla.style.display = 'none';
            }
        }
    </script>
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
