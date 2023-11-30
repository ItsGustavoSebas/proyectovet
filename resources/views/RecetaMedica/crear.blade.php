<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Receta Médica') }}
        </h2>
    </x-slot>

    <form action="{{ route('RecetaMedica.guardar') }}" method="POST">
        @csrf
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
            
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-3 p-5">
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="FechaEmision">Fecha de Emisión</label>
                    <input id="FechaEmision" name="FechaEmision" type="date" class="px-3 py-2 w-full rounded-xl bg-blue-100">
                    @error('FechaEmision')
                        <strong class="text-red-500">Debes ingresar la fecha de emisión de la Receta</strong>
                    @enderror
                </div>
            </div>
            
            <div class="p-5">
                <label class="font-bold text-lg">Medicamentos en la Receta Médica</label>
                <div id="productos">
                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-3 p-2">
                        <div class="col-span-1">
                            <label for="producto">Producto</label>
                            <select id="producto" name="productos[0][producto_id]"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100">
                                <option value="">Selecciona un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" name="productos[0][cantidad]" type="number" min="1"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Cantidad">
                        </div>
                        
                        <div class="col-span-1">
                            <label for="instrucciones">Instrucciones</label>
                            <input id="instrucciones" name="productos[0][instrucciones]" type="text" min="1"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Instrucciones">
                        </div>
                    </div>
                </div>
                <button type="button" id="agregarMedicamento"
                    class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">Agregar Medicamento</button>
            </div>
            <input type="hidden" name="ID_Consulta" id="ID_Consulta" value="{{ $consultas->id }}">
            <div class="p-5">
                <button type="submit" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-lg">
                    <i class="fa-solid fa-floppy-disk">Guardar</i>
                </button>
            </div>
        </div>
    </form>

    <script>
        let productoIndex = 0;

        document.getElementById('agregarMedicamento').addEventListener('click', function() {
            productoIndex++;

            const productosDiv = document.getElementById('productos');

            const productoInput = document.createElement('div');
            productoInput.classList.add('grid', 'lg:grid-cols-3', 'grid-cols-1', 'gap-3', 'p-2');
            productoInput.innerHTML = `
            <div class="col-span-1">
                            <label for="producto">Producto</label>
                            <select id="producto" name="productos[0][${productoIndex}]"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100">
                                <option value="">Selecciona un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                                @endforeach
                            </select>
            </div>
                        <div class="col-span-1">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" name="productos[0][${productoIndex}]" type="number" min="1"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Cantidad">
                        </div>
                        
                        <div class="col-span-1">
                            <label for="instrucciones">Instrucciones</label>
                            <input id="instrucciones" name="productos[0][${productoIndex}]" type="text" min="1"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Instrucciones">
                        </div>`;

            productosDiv.appendChild(productoInput);
        });
    </script>

    <script>
        // Obtener la referencia al campo de entrada de fecha
        var fechaEmisionInput = document.getElementById('FechaEmision');

        // Obtener la fecha actual en formato ISO (YYYY-MM-DD)
        var fechaActual = new Date().toISOString().split('T')[0];

        // Establecer la fecha actual como el valor predeterminado
        fechaEmisionInput.value = fechaActual;
    </script>
</x-app-layout>
