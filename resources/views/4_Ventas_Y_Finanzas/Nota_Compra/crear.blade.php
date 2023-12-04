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
                <div class="grid lg:grid-cols-3 grid-cols-1 gap-3 p-5" >
                    <div class="col-span-1">
                        <label for="proveedor">Proveedor</label>
                            <select id="proveedor" name="proveedores"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100">
                                <option value="">Selecciona el Proveedor</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-span-1">
                        <label for="lotes">Lote</label>
                        <select id="lotes" name="lotes" class="px-3 py-2 w-full rounded-xl bg-blue-100">
                            <option value="">Selecciona el Lote</option>
                        </select>
                        <input type="hidden" id="fechaLote" name="fechaLote" value="">
                    </div>
                    <div class="col-span-1">
                        <label for="fecha">Fecha</label>
                        <input id="fecha" name="Fecha" type="date"
                        class="px-3 py-2 w-full rounded-xl bg-blue-100" readonly>
                    </div>
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
            // Obtiene referencias a los elementos del formulario
            const proveedorSelect = document.getElementById('proveedor');
            const loteSelect = document.getElementById('lotes');
            const fechaInput = document.getElementById('fecha');
            const fechaLoteInput = document.getElementById('fechaLote');
    
            // Evento onchange para el campo de selección del proveedor
            proveedorSelect.addEventListener('change', function () {
                const proveedorId = proveedorSelect.value;

                axios.get(`/obtener-lotes-proveedor/${proveedorId}`)
                    .then(response => {
                        loteSelect.innerHTML = '<option value="">Selecciona el Lote</option>';
                        response.data.forEach(lote => {
                            // Solo agregar los lotes que tienen ID_NotaCompra en null
                            if (lote.ID_NotaCompra === null) {
                                const option = document.createElement('option');
                                option.value = lote.id;
                                option.textContent = lote.numeroLote;
                                option.setAttribute('data-fecha', lote.fechaCompra);
                                loteSelect.appendChild(option);
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Error al obtener los lotes', error);
                    });
            });
    
            // Evento onchange para el campo de selección del lote
            loteSelect.addEventListener('change', async function () {
                const selectedOption = loteSelect.options[loteSelect.selectedIndex];
                fechaInput.value = selectedOption.getAttribute('data-fecha');
                fechaLoteInput.value = selectedOption.getAttribute('data-fecha');
    
                // Actualizar el valor del campo oculto "lotes"
                document.getElementById('lotes').value = loteSelect.value;
    
                // Calcula el monto total basado en los precios de compra de loteprod
                await calcularMontoTotal();
            });
    
            // Función para calcular el monto total
            async function calcularMontoTotal() {
                const loteprod = document.getElementById('lotes').value;
                const preciosCompra = await obtenerPreciosCompra(loteprod);
    
                const montoTotal = preciosCompra.reduce((total, precio) => total + parseFloat(precio), 0);
    
                // Cambiar el contenido del div directamente
                const montoTotalNotaCompra = document.getElementById('montoTotalNotaCompra');
                montoTotalNotaCompra.textContent = `Monto Total: $${montoTotal.toFixed(2)}`;
    
                // Actualizar el valor del campo oculto "monto_total_input"
                document.getElementById('monto_total_input').value = montoTotal.toFixed(2);
                console.log('Nuevo valor de monto_total:', document.getElementById('monto_total_input').value);
            }
    
            // Función para obtener los precios de compra de loteprod
            async function obtenerPreciosCompra(loteprod) {
                try {
                    const response = await axios.get(`/obtener-precio-Lote/${loteprod}`);
                    return response.data;
                } catch (error) {
                    console.error('Error al obtener los precios de compra', error);
                    return [];
                }
            }
        });
    </script>
    

</x-app-layout>
