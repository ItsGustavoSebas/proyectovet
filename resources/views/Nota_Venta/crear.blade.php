<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nota de Venta') }}
        </h2>
    </x-slot>

    <form action="{{ route('nota_venta.guardar') }}" method="POST">
        @csrf
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
            <div class="p-5">
                
                <label for="cliente">Cliente</label>
                <select id="cliente" name="cliente" class="cliente-select px-3 py-2 w-full rounded-xl bg-blue-100">
                    <option value="">Selecciona un cliente</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{ $cliente->ID_Usuario }}">{{ $cliente->usuario->name }}</option>
                    @endforeach
                </select>
                <label for="cita">Cita</label>
                <select id="cita" name="cita" class="cita-select px-3 py-2 w-full rounded-xl bg-blue-100">
                    <option value="">Selecciona una cita</option>
                    <!-- Las citas se cargarán dinámicamente aquí -->
                </select>
                <label class="font-bold text-lg">Productos en la Nota de Venta</label>
                <div id="productos">
                    <div class="grid lg:grid-cols-4 grid-cols-1 gap-4 p-2">
                        <div class="col-span-1">
                            <label for="producto0">Producto</label>
                            <select id="producto0" name="productos[0][producto_id]"
                                class="producto-select px-3 py-2 w-full rounded-xl bg-blue-100">
                                <option value="">Selecciona un producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}" data-precio="{{ $producto->precioVenta }}">
                                        {{ $producto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="cantidad0">Cantidad</label>
                            <input id="cantidad0" name="productos[0][cantidad]" type="number" min="1"
                                class="cantidad-input px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Cantidad">
                        </div>
                        <div class="col-span-1">
                            <label for="precio0">Precio</label>
                            <input id="precio0" name="productos[0][precio]" type="number" min="0.01"
                                step="0.01" class="precio-input px-3 py-2 w-full rounded-xl bg-blue-100"
                                placeholder="Precio">
                        </div>
                    </div>
                </div>
                <button type="button" id="agregarProducto"
                    class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">Agregar Producto</button>
            </div>
            <div class="p-5">
                <button type="submit" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-lg">
                    Guardar
                </button>
            </div>
        </div>
    </form>

    <script>
        let productoIndex = 0;

        document.getElementById('agregarProducto').addEventListener('click', function() {
    productoIndex++;

    const productosDiv = document.getElementById('productos');

    const productoInput = document.createElement('div');
    productoInput.classList.add('grid', 'lg:grid-cols-4', 'grid-cols-1', 'gap-4', 'p-2');
    productoInput.innerHTML = `
        <div class="col-span-1">
            <label for="producto${productoIndex}">Producto</label>
            <select id="producto${productoIndex}" name="productos[${productoIndex}][producto_id]"
                class="producto-select px-3 py-2 w-full rounded-xl bg-blue-100">
                <option value="">Selecciona un producto</option>
                @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}" data-precio="{{ $producto->precioVenta }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-1">
            <label for="cantidad${productoIndex}">Cantidad</label>
            <input id="cantidad${productoIndex}" name="productos[${productoIndex}][cantidad]" type="number" min="1"
                class="cantidad-input px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Cantidad">
        </div>
        <div class="col-span-1">
            <label for="precio${productoIndex}">Precio</label>
            <input id="precio${productoIndex}" name="productos[${productoIndex}][precio]" type="number" min="0.01" step="0.01"
                class="precio-input px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Precio">
        </div>
    `;

    productosDiv.appendChild(productoInput);

    const cantidadInput = document.getElementById(`cantidad${productoIndex}`);
    const productoSelect = document.getElementById(`producto${productoIndex}`);
    const precioInput = document.getElementById(`precio${productoIndex}`);

    cantidadInput.addEventListener('input', function() {
        calcularPrecio(cantidadInput, productoSelect, precioInput);
    });

    productoSelect.addEventListener('change', function() {
        calcularPrecio(cantidadInput, productoSelect, precioInput);
    });

    // Ejecutar el cálculo para el nuevo producto agregado
    calcularPrecio(cantidadInput, productoSelect, precioInput);
});

        // Manejar el cálculo para el primer producto (producto0)
        const cantidadInput0 = document.getElementById('cantidad0');
        const productoSelect0 = document.getElementById('producto0');
        const precioInput0 = document.getElementById('precio0');

        cantidadInput0.addEventListener('input', function() {
            calcularPrecio(cantidadInput0, productoSelect0, precioInput0);
        });

        productoSelect0.addEventListener('change', function() {
            calcularPrecio(cantidadInput0, productoSelect0, precioInput0);
        });

        // Función para calcular el precio
        function calcularPrecio(cantidadInput, productoSelect, precioInput) {
            const precioProducto = productoSelect.options[productoSelect.selectedIndex].getAttribute('data-precio');
            const cantidad = cantidadInput.value;
            if (precioProducto && cantidad) {
                const total = parseFloat(precioProducto) * parseFloat(cantidad);
                precioInput.value = total.toFixed(2);
            }
        }
    </script>
    <script>
        // ... Tu código existente ...
    
        const clienteSelect = document.getElementById('cliente');
        const citaSelect = document.getElementById('cita');
    
        clienteSelect.addEventListener('change', function() {
            console.log('Se ha cambiado la selección del cliente');
    
            const clienteId = clienteSelect.value; // Obtener el ID del cliente seleccionado
            console.log('ID del cliente seleccionado:', clienteId);
    
            if (clienteId) {
                // Realizar una solicitud AJAX para obtener las citas del cliente seleccionado
                fetch(`/obtener-citas/${clienteId}`)
                    .then(response => response.json())
                    .then(data => {
                        citaSelect.innerHTML = '<option value="">Selecciona una cita</option>';

                    // Agregar las nuevas opciones al select de citas
                    data.forEach(cita => {
                        const option = document.createElement('option');
                        option.value = cita.id;
                        option.textContent = cita.descripcion; // Reemplaza 'fecha' con el atributo correspondiente de la cita
                        citaSelect.appendChild(option);
                    });
    
                    })
                    .catch(error => {
                        console.error('Hubo un error al obtener las citas:', error);
                    });
            } else {
                // Si no se selecciona ningún cliente, limpiar el select de citas
                citaSelect.innerHTML = '<option value="">Selecciona una cita</option>';
            }
        });
    </script>
    
</x-app-layout>
