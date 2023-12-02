<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nota de Venta') }}
        </h2>
        <div id="montoTotalNotaVenta"
            class="fixed top-0 right-0 m-4 bg-white p-4 rounded-lg shadow-md text-3xl font-bold">
            Monto Total: $0.00
        </div>
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
                <div class="mb-4">
                    <input type="checkbox" id="facturaCheckbox" name="factura" class="mr-2" value="true">
                    <label for="facturaCheckbox" class="font-bold">Factura</label>
                </div>
                <!-- Campo para NIT, se muestra solo si se selecciona Factura -->
                <div id="nitField" style="display: none;">
                    <label for="nit" class="block font-bold">NIT</label>
                    <input type="text" id="nit" name="nit" class="px-3 py-2 w-full rounded-xl bg-blue-100">
                </div>
                <input type="hidden" id="montoTotalInput" name="monto_total" value="0.00">
                <div class="mb-4">
                    <input type="checkbox" id="reciboCheckbox" name="recibo" class="mr-2" value="true">
                    <label for="reciboCheckbox" class="font-bold">Recibo</label>
                </div>
                <div class="mb-4">
                    <input type="checkbox" id="qrCheckbox" name="qr" class="mr-2" value="true">
                    <label for="qrCheckbox" class="font-bold">QR</label>
                </div>
                <div id="qrFields" style="display: none;">
                    <div class="mb-4">
                        <!-- Aquí mostrarás el QR -->
                        <!-- <img src="{{ $qrUrl }}" alt="QR para realizar el pago"> -->
                        <p>QR para realizar el pago aquí</p>
                    </div>
                </div>
                <label class="font-bold text-lg">Productos en la Nota de Venta</label>
                <div id="productos">
                    <div class="grid lg:grid-cols-4 grid-cols-1 gap-4 p-2">
                        <div class="col-span-1">
                            <label for="producto0">Producto</label>
                            <!-- Campo de entrada para búsqueda -->
                            <input list="productosList" id="productoInput0"
                                class="producto-input px-3 py-2 w-full rounded-xl bg-blue-100"
                                placeholder="Selecciona o busca un producto">
                            <!-- Datalist con opciones de búsqueda -->
                            <datalist id="productosList">
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->nombre }}" data-producto-id="{{ $producto->id }}"
                                        data-precio="{{ $producto->precioVenta }}"
                                        data-lote="{{ $producto->loteprod }}">
                                @endforeach
                            </datalist>
                            <!-- Select oculto para almacenar la selección -->
                            <select id="producto0" name="productos[0][producto_id]"
                                class="producto-select px-3 py-2 w-full rounded-xl bg-blue-100" style="display: none;">
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}" data-precio="{{ $producto->precioVenta }}"
                                        data-lote="{{ $producto->loteprod }}">
                                        {{ $producto->nombre }}
                                    </option>
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
                        <div class="col-span-1">
                            <label for="lote0">Lote</label>
                            <input id="lote0" name="productos[0][lote]" type="text"
                                class="lote-input px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Lote">
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" id="agregarProducto"
                        class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">Agregar Producto</button>
                </div>
                <label class="font-bold text-lg">Citas en la Nota de Venta</label>
                <div id="citas">
                    <!-- Sección de citas -->
                    <div class="grid lg:grid-cols-4 grid-cols-1 gap-4 p-2">
                        <!-- Este es un ejemplo para la primera cita -->
                        <div class="col-span-1">
                            <label for="cita0">Cita</label>
                            <select id="cita0" name="citas[0][cita_id]"
                                class="cita-select px-3 py-2 w-full rounded-xl bg-blue-100">
                                <option value="">Selecciona una cita</option>
                                <!-- Aquí debes cargar dinámicamente las citas con sus precios -->
                            </select>
                        </div>
                        <!-- Input para el precio -->
                        <div class="col-span-1">
                            <label for="precioCita0">Precio</label>
                            <input id="precioCita0" name="citas[0][precio]" type="number" readonly
                                class="precio-cita-input px-3 py-2 w-full rounded-xl bg-blue-100"
                                placeholder="Precio">
                        </div>

                    </div>

                </div>
                <div class="mb-4">
                    <button type="button" id="agregarCita"
                        class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">
                        Agregar Cita
                    </button>
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-lg">
                        Guardar
                    </button>
                </div>
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
                            <!-- Campo de entrada para búsqueda -->
                            <input list="productosList" id="productoInput${productoIndex}"
                                class="producto-input px-3 py-2 w-full rounded-xl bg-blue-100"
                                placeholder="Selecciona o busca un producto">
                            <!-- Datalist con opciones de búsqueda -->
                            <datalist id="productosList">
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->nombre }}" data-producto-id="{{ $producto->id }}"
                                        data-precio="{{ $producto->precioVenta }}"
                                        data-lote="{{ $producto->loteprod }}">
                                @endforeach
                            </datalist>
                            <!-- Select oculto para almacenar la selección -->
                            <select id="producto${productoIndex}" name="productos[${productoIndex}][producto_id]"
                                class="producto-select px-3 py-2 w-full rounded-xl bg-blue-100" style="display: none;">
                                @foreach ($productos as $producto)
                                    <option value="{{ $producto->id }}" data-precio="{{ $producto->precioVenta }}"
                                        data-lote="{{ $producto->loteprod }}">
                                        {{ $producto->nombre }}
                                    </option>
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
        <div class="col-span-1">
            <label for="lote${productoIndex}">Lote</label>
            <input id="lote${productoIndex}" name="productos[${productoIndex}][lote]" type="text"
                class="lote-input px-3 py-2 w-full rounded-xl bg-blue-100"
                placeholder="Lote">
        </div>
    `;

            productosDiv.appendChild(productoInput);

            const cantidadInput = document.getElementById(`cantidad${productoIndex}`);
            const productoSelect = document.getElementById(`producto${productoIndex}`);
            const precioInput = document.getElementById(`precio${productoIndex}`);
            const loteInput = document.getElementById(`lote${productoIndex}`);
            const productoInputs = document.getElementById(`productoInput${productoIndex}`);

            productoInputs.addEventListener('input', function() {
                const input = this;
                const options = document.querySelectorAll('#productosList option');
                options.forEach(function(option) {
                    if (option.value === input.value) {
                        const productoId = option.getAttribute('data-producto-id');
                        const precio = option.getAttribute('data-precio');
                        const lote = option.getAttribute('data-lote');

                        productoSelect.value = productoId;
                        productoSelect.setAttribute('data-precio', precio);
                        productoSelect.setAttribute('data-lote', lote);
                        calcularPrecio(cantidadInput, productoSelect, precioInput);
                        manejarLotes(cantidadInput, productoSelect, precioInput, loteInput);
                    }
                });
            });
            cantidadInput.addEventListener('input', function() {
                calcularPrecio(cantidadInput, productoSelect, precioInput);
                manejarLotes(cantidadInput, productoSelect, precioInput, loteInput);
            });

            calcularPrecio(cantidadInput, productoSelect, precioInput);
            manejarLotes(cantidadInput, productoSelect, precioInput, loteInput);

        });

        // Manejar el cálculo para el primer producto (producto0)
        const cantidadInput0 = document.getElementById('cantidad0');
        const productoSelect0 = document.getElementById('producto0');
        const precioInput0 = document.getElementById('precio0');
        const loteInput0 = document.getElementById(`lote0`);
        const productoInput0 = document.getElementById('productoInput0');

        productoInput0.addEventListener('input', function() {
            const input = this;
            const options = document.querySelectorAll('#productosList option');
            options.forEach(function(option) {
                if (option.value === input.value) {
                    const productoId = option.getAttribute('data-producto-id');
                    const precio = option.getAttribute('data-precio');
                    const lote = option.getAttribute('data-lote');

                    productoSelect0.value = productoId;
                    productoSelect0.setAttribute('data-precio', precio);
                    productoSelect0.setAttribute('data-lote', lote);
                    calcularPrecio(cantidadInput0, productoSelect0, precioInput0);
                    manejarLotes(cantidadInput0, productoSelect0, precioInput0, loteInput0);
                }
            });
        });
        cantidadInput0.addEventListener('input', function() {
            calcularPrecio(cantidadInput0, productoSelect0, precioInput0);
            manejarLotes(cantidadInput0, productoSelect0, precioInput0, loteInput0);
        });

        // Función para calcular el precio
        function calcularPrecio(cantidadInput, productoSelect, precioInput) {
            const precioProducto = productoSelect.options[productoSelect.selectedIndex].getAttribute('data-precio');
            const cantidad = cantidadInput.value;
            if (precioProducto && cantidad) {
                const total = parseFloat(precioProducto) * parseFloat(cantidad);
                precioInput.value = total.toFixed(2);
                actualizarMontoTotal();
            }
        }

        // Función para manejar los lotes de productos
        function manejarLotes(cantidadInput, productoSelect, precioInput, loteInput) {
            const lotes = productoSelect.options[productoSelect.selectedIndex].getAttribute('data-lote');
            if (lotes) {
                const lotesArray = JSON.parse(lotes);
                const cantidad = cantidadInput.value;
                let lotesInput = [];
                let cant = 0;
                lotesArray.forEach((lote) => {
                    if (cantidad > cant) {
                        lotesInput.push(lote.numeroLote);
                        cant = cant + lote.cantidadActual
                    }
                });
                if (cant < cantidad) {
                    loteInput.value = 'no existe el stock suficiente';
                } else if (lotesInput.length > 0) {
                    const lotesString = lotesInput.join(', ');
                    loteInput.value = lotesString;
                } else {
                    loteInput.value = 'no existe el stock suficiente';
                }
            }
        }
    </script>
    <script>
        // Obtener referencias a los elementos necesarios
        const clienteSelect = document.getElementById('cliente');
        const citaSelect = document.getElementById('cita0');
        const precioCitaInput = document.getElementById('precioCita0');

        // Event listener para cambios en el cliente seleccionado
        clienteSelect.addEventListener('change', function() {
            const clienteId = clienteSelect.value;

            if (clienteId) {
                fetch(`/obtener-citas/${clienteId}`)
                    .then(response => response.json())
                    .then(data => {
                        citaSelect.innerHTML = '<option value="">Selecciona una cita</option>';

                        data.forEach(cita => {
                            const option = document.createElement('option');
                            option.value = cita.id;
                            option.textContent = cita
                                .descripcion; // Reemplaza con el atributo correspondiente de la cita
                            citaSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Hubo un error al obtener las citas:', error);
                    });
            } else {
                citaSelect.innerHTML = '<option value="">Selecciona una cita</option>';
            }
        });
    </script>
    <script>
        let citaIndex = 0;

        document.getElementById('agregarCita').addEventListener('click', function() {
            citaIndex++;

            const citasDiv = document.getElementById('citas');

            const citaInput = document.createElement('div');
            citaInput.classList.add('grid', 'lg:grid-cols-4', 'grid-cols-1', 'gap-4', 'p-2');
            citaInput.innerHTML = `
        <div class="col-span-1">
            <label for="cita${citaIndex}">Cita</label>
            <select id="cita${citaIndex}" name="citas[${citaIndex}][cita_id]"
                class="cita-select px-3 py-2 w-full rounded-xl bg-blue-100">
                <option value="">Selecciona una cita</option>
                <!-- Aquí debes cargar dinámicamente las citas con sus precios -->
            </select>
        </div>
        <div class="col-span-1">
            <label for="precioCita${citaIndex}">Precio</label>
            <input id="precioCita${citaIndex}" name="citas[${citaIndex}][precio]" type="number" readonly
                class="precio-cita-input px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Precio">
        </div>
    `;

            citasDiv.appendChild(citaInput);

            const citaSelect = document.getElementById(`cita${citaIndex}`);
            const precioCitaInput = document.getElementById(`precioCita${citaIndex}`);

            // Obtener referencia al cliente select
            const clienteSelect = document.getElementById('cliente');

            // Event listener para cambios en el cliente seleccionado
            clienteSelect.addEventListener('change', function() {
                const clienteId = clienteSelect.value;

                if (clienteId) {
                    fetch(`/obtener-citas/${clienteId}`)
                        .then(response => response.json())
                        .then(data => {
                            citaSelect.innerHTML = '<option value="">Selecciona una cita</option>';

                            data.forEach(cita => {
                                const option = document.createElement('option');
                                option.value = cita.id;
                                option.textContent = cita
                                    .descripcion; // Reemplaza con el atributo correspondiente de la cita
                                citaSelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Hubo un error al obtener las citas:', error);
                        });
                } else {
                    citaSelect.innerHTML = '<option value="">Selecciona una cita</option>';
                }
            });

            // Event listener para cambios en la cita seleccionada
            citaSelect.addEventListener('change', function() {
                const citaId = citaSelect.value;

                if (citaId) {
                    // Realizar una solicitud AJAX para obtener el precio de la cita seleccionada
                    fetch(`/obtener-precio-cita/${citaId}`)
                        .then(response => response.json())
                        .then(data => {
                            precioCitaInput.value = data
                                .precio; // Reemplaza 'precio' con el atributo correspondiente de la cita
                            actualizarMontoTotal
                                (); // Actualizar el monto total al cambiar el precio de la cita
                        })
                        .catch(error => {
                            console.error('Hubo un error al obtener el precio de la cita:', error);
                        });
                } else {
                    precioCitaInput.value = ''; // Limpiar el precio si no se selecciona ninguna cita
                }
            });

            // Disparar el evento de cambio de cliente para cargar las citas si el cliente ya está seleccionado
            if (clienteSelect.value) {
                clienteSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
    <script>
        const facturaCheckbox = document.getElementById('facturaCheckbox');
        const reciboCheckbox = document.getElementById('reciboCheckbox');
        const nitField = document.getElementById('nitField');

        facturaCheckbox.addEventListener('change', function() {
            if (facturaCheckbox.checked) {
                nitField.style.display = 'block';
                reciboCheckbox.checked = false; // Desmarcar Recibo si Factura está seleccionado
            } else {
                nitField.style.display = 'none';
            }
        });

        reciboCheckbox.addEventListener('change', function() {
            if (reciboCheckbox.checked) {
                facturaCheckbox.checked = false; // Desmarcar Factura si Recibo está seleccionado
                nitField.style.display = 'none';
            }
        });
    </script>
    <script>
        const qrCheckbox = document.getElementById('qrCheckbox');
        const qrFields = document.getElementById('qrFields');

        qrCheckbox.addEventListener('change', function() {
            if (qrCheckbox.checked) {
                qrFields.style.display = 'block';
            } else {
                qrFields.style.display = 'none';
            }
        });
    </script>
    <!-- Resto del código HTML -->

    <script>
        // Función para calcular el monto total sumando los valores de precio
        function calcularMontoTotal() {
            const preciosProductos = document.querySelectorAll('.precio-input');
            const preciosCitas = document.querySelectorAll('.precio-cita-input');

            let total = 0;

            preciosProductos.forEach(precioInput => {
                const precio = parseFloat(precioInput.value);
                if (!isNaN(precio)) {
                    total += precio;
                }
            });

            preciosCitas.forEach(precioCitaInput => {
                const precioCita = parseFloat(precioCitaInput.value);
                if (!isNaN(precioCita)) {
                    total += precioCita;
                }
            });

            return total.toFixed(2);
        }

        // Función para actualizar el monto total
        function actualizarMontoTotal() {
            const montoTotal = calcularMontoTotal();
            const montoTotalElement = document.getElementById('montoTotalNotaVenta');
            const montoTotalInput = document.getElementById('montoTotalInput');
            if (montoTotalElement) {
                montoTotalElement.textContent = `Monto Total: $${montoTotal}`;
                montoTotalInput.value = montoTotal;
            }
        }

        // Llamar a la función para calcular y actualizar el monto total al cargar la página
        actualizarMontoTotal();

        // Función para actualizar el precio de cita seleccionada
        function actualizarPrecioCita(citaSelect, precioCitaInput) {
            const citaId = citaSelect.value;

            if (citaId) {
                // Realizar una solicitud AJAX para obtener el precio de la cita seleccionada
                fetch(`/obtener-precio-cita/${citaId}`)
                    .then(response => response.json())
                    .then(data => {
                        precioCitaInput.value = data.precio;
                        actualizarMontoTotal(); // Actualizar el monto total al cambiar el precio de la cita
                    })
                    .catch(error => {
                        console.error('Hubo un error al obtener el precio de la cita:', error);
                    });
            } else {
                precioCitaInput.value = '';
                actualizarMontoTotal(); // Actualizar el monto total al quitar la selección de la cita
            }
        }

        // Agregar eventos change para los campos de precio de producto
        const precioInputs = document.querySelectorAll('.precio-input');
        precioInputs.forEach(input => {
            input.addEventListener('change', actualizarMontoTotal);
        });

        // Agregar eventos change para los campos de precio de cita
        const precioCitaInputs = document.querySelectorAll('.precio-cita-input');
        precioCitaInputs.forEach(input => {
            input.addEventListener('change', actualizarMontoTotal);
        });

        // Obtener todas las citas-select y precio-cita-input para agregar eventos change
        const citasSelect = document.querySelectorAll('.cita-select');
        const preciosCitasInput = document.querySelectorAll('.precio-cita-input');

        // Agregar eventos change a todos los elementos select de citas
        citasSelect.forEach((citaSelect, index) => {
            const precioCitaInput = preciosCitasInput[index];

            citaSelect.addEventListener('change', () => {
                actualizarPrecioCita(citaSelect, precioCitaInput);
            });
        });
    </script>

</x-app-layout>
