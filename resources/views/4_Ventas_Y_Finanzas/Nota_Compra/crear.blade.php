<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nota de Compra') }}
        </h2>
        <div id="montoTotalNotaCompra"
            class="fixed top-0 right-0 m-4 bg-white p-4 rounded-lg shadow-md text-3xl font-bold">
            Monto Total: $0.00
        </div>
    </x-slot>

    <form action="{{ route('nota_compra.guardar') }}" method="POST">
        @csrf
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
            <div class="p-5">
                <label class="font-bold text-lg">Proveedor del Lote</label>
                <div class="grid lg:grid-cols-3 grid-cols-1 gap-3 p-5">
                    <div class="col-span-1">
                        <label for="proveedor">Proveedor</label>
                        <select id="proveedor" name="proveedores" class="px-3 py-2 w-full rounded-xl bg-blue-100">
                            <option value="" data-lotes="[]">Selecciona el Proveedor</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}" data-lotes="{{ json_encode($proveedor->lotes) }}">
                                    {{ $proveedor->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="lotes">Lotes</label>
                    <div id="lotesContainer" class="grid grid-cols-1 gap-2">
                        <!-- Lotes se mostrarán aquí dinámicamente -->
                    </div>
                    <input type="hidden" id="fechaLote" name="fechaLote" value="">
                </div>
                <input type="hidden" name="monto_total" id="monto_total_input">
                <div>
                    <button type="submit" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-lg">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const proveedorSelect = document.getElementById('proveedor');
            const lotesContainer = document.getElementById('lotesContainer');
            const fechaLoteInput = document.getElementById('fechaLote');
            const montoTotalNotaCompra = document.getElementById('montoTotalNotaCompra');
            const montoTotalInput = document.getElementById('monto_total_input');
    
            proveedorSelect.addEventListener('change', function () {
                const proveedorId = proveedorSelect.value;
    
                axios.get(`/obtener-lotes-proveedor/${proveedorId}`)
                    .then(response => {
                        lotesContainer.innerHTML = '';
    
                        response.data.forEach(lote => {
                            if (lote.ID_NotaCompra === null) {
                                const label = document.createElement('label');
                                label.textContent = lote.numeroLote;
    
                                const checkbox = document.createElement('input');
                                checkbox.type = 'checkbox';
                                checkbox.name = 'lotes[]';
                                checkbox.value = lote.id;
                                checkbox.setAttribute('data-fecha', lote.fechaCompra);
    
                                // Aquí llamamos a la función para obtener el precio de compra
                                obtenerPrecioCompra(lote.id, checkbox);
    
                                label.appendChild(checkbox);
                                lotesContainer.appendChild(label);
                            }
                        });
    
                        // Mostrar el checkbox "Seleccionar Todos" solo si hay lotes disponibles
                        if (response.data.length > 0) {
                            const labelTodos = document.createElement('label');
                            labelTodos.textContent = 'Seleccionar Todos';
    
                            const checkboxTodos = document.createElement('input');
                            checkboxTodos.type = 'checkbox';
                            checkboxTodos.id = 'seleccionarTodosCheckbox';
                            checkboxTodos.addEventListener('change', function () {
                                setTimeout(function () {
                                    const checkboxes = lotesContainer.querySelectorAll('input[type="checkbox"]');
                                    checkboxes.forEach(checkbox => {
                                        checkbox.checked = checkboxTodos.checked;
                                    });
    
                                    actualizarMontoTotal();
                                }, 0);
                            });
    
                            labelTodos.appendChild(checkboxTodos);
                            lotesContainer.prepend(labelTodos);
                        }
                    })
                    .catch(error => {
                        console.error('Error al obtener los lotes', error);
                    });
            });
    
            lotesContainer.addEventListener('change', function () {
                actualizarMontoTotal();
            });
    
            function actualizarMontoTotal() {
                const selectedCheckboxes = lotesContainer.querySelectorAll('input[type="checkbox"]:checked');
                let montoTotal = 0;
    
                selectedCheckboxes.forEach(checkbox => {
                    const precioCompra = parseFloat(checkbox.getAttribute('data-precio-compra')) || 0;
                    montoTotal += precioCompra;
                    fechaLoteInput.value += checkbox.getAttribute('data-fecha') + ',';
                });
    
                if (fechaLoteInput.value.endsWith(',')) {
                    fechaLoteInput.value = fechaLoteInput.value.slice(0, -1);
                }
    
                montoTotalNotaCompra.textContent = `Monto Total: $${montoTotal.toFixed(2)}`;
                montoTotalInput.value = montoTotal.toFixed(2);
            }
    
            async function obtenerPrecioCompra(loteId, checkbox) {
                try {
                    const response = await axios.get(`/obtener-precio-Lote/${loteId}`);
                    const precioCompra = response.data;
    
                    checkbox.setAttribute('data-precio-compra', precioCompra);
                } catch (error) {
                    console.error('Error al obtener el precio de compra', error);
                }
            }
        });
    </script>
    
</x-app-layout>
