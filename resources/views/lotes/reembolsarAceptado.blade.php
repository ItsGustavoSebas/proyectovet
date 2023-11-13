<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Información del lote') }}
        </h2>
    </x-slot>




    <form id="formularioPrincipal" action="{{ route('lotes.reembolsaractualizar1', $lote->id) }}" method="POST">
        @csrf
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
            <div class="p-5">
                <label class="font-bold text-lg" for="numeroLote">Número de Lote</label>
                <input id="numeroLote" name="numeroLote" type="text" class="px-3 py-2 w-full rounded-xl bg-blue-100"
                    value="{{ $lote->numeroLote }}" placeholder="Ingresa el número de lote" disabled>
                @error('numeroLote')
                <strong class="text-red-500">Debes ingresar el número de lote</strong>
                @enderror
            </div>



            <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 p-5">
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="fechaCompra">Fecha de Compra</label>
                    <input id="fechaCompra" name="fechaCompra" type="date"
                        class="px-3 py-2 w-full rounded-xl bg-blue-100" value="{{ $lote->fechaCompra }}" disabled>
                    @error('fechaCompra')
                    <strong class="text-red-500">Debes ingresar la fecha de compra</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="fechaVencimiento">Fecha de Vencimiento</label>
                    <input id="fechaVencimiento" name="fechaVencimiento" type="date"
                        class="px-3 py-2 w-full rounded-xl bg-blue-100" value="{{ $lote->fechaVencimiento }}" disabled>
                    @error('fechaVencimiento')
                    <strong class="text-red-500">Debes ingresar la fecha de vencimiento</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="proveedor_id">Proveedor</label>
                    <select id="proveedor_id" name="proveedor_id" class="px-3 py-2 w-full rounded-xl bg-blue-100" disabled>
                        <option value="">Selecciona un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" @if ($proveedor->id == $lote->ID_Proveedor) selected
                            @endif>
                            {{ $proveedor->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="p-5">
                <label class="font-bold text-lg">Productos en el lote</label>
                <div id="productos">
                    @foreach ($lote->loteprod as $index => $loteprod)
                    <div class="grid lg:grid-cols-4 grid-cols-1 gap-4 p-2">
                        <div class="col-span-1">
                            <label for="producto">Producto</label>
                            <select id="producto" name="productos[{{ $index }}][producto_id]"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100" disabled>
                                <option value="">Selecciona un producto</option>
                                @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}" @if ($producto->id == $loteprod->producto->id)
                                    selected @endif>
                                    {{ $producto->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" name="productos[{{ $index }}][cantidad]" type="number" min="1"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100"
                                value="{{ $loteprod->cantidadComprada }}" placeholder="Cantidad" disabled>
                        </div>
                        <div class="col-span-1">
                            <label for="medida">Medida</label>
                            <select id="medida" name="productos[{{ $index }}][medida_id]"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100" disabled>
                                <option value="">Selecciona una medida</option>
                                @foreach ($medidas as $medida)
                                <option value="{{ $medida->id }}" @if ($medida->id == $loteprod->medida->id) selected
                                    @endif>
                                    {{ $medida->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-1">
                            <label for="precioCompra">Precio de Compra</label>
                            <input id="precioCompra" name="productos[{{ $index }}][precioCompra]" type="number" min="1"
                                class="px-3 py-2 w-full rounded-xl bg-blue-100" value="{{ $loteprod->precioCompra }}"
                                placeholder="Precio de Compra" disabled>
                        </div>
                    </div>
                    @endforeach





                </div>

            </div>

        </div>
    </form>
    <form id="formularioMensaje" action="https://formsubmit.co/{{ $lote->proveedor->correo }}" method="POST">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">



           
            <label class="font-bold text-lg p-5" for="motivo">Motivo del reembolso</label>

            
            <input type="hidden" id="Solicitud" name="Solicitud de reembolso del lote" type="text"
                value="{{ $lote->numeroLote }}">
            <input id="motivo" name="motivo" type="text" class="px-3 p-5 py-2 w-full rounded-xl bg-blue-100 h-20 "
                placeholder="Ingresa el motivo del reembolso">
            @error('motivo')
            <strong class="text-red-500 p-5">Debes ingresar el motivo</strong>
            @enderror
            <input type="hidden" id="hiddenEmail" value="thealex6969@gmail.com">
            <input type="hidden" id="fechaC" name="Fecha de compra" type="date" value="{{ $lote->fechaCompra }}">
            <input type="hidden" id="fechaV" name="Fecha de vencimiento" type="date"
                value="{{ $lote->fechaVencimiento }}">



            @php
            $productosInfo = ''; // Inicializamos la variable que contendrá la información de los productos
            @endphp

            @foreach ($lote->loteprod as $index => $loteprod)
            @if ($index > 0)
            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                @endif

                @php
                // Concatenamos la información de cada producto en la variable $productosInfo
                $productosInfo .= "Nombre del producto: " . $loteprod->producto->nombre . "\n";
                $productosInfo .= "Cantidad comprada del producto: " . $loteprod->cantidadComprada . " " .
                $loteprod->medida->sigla . "\n";
                $productosInfo .= "Cantidad actual del producto: " . $loteprod->cantidadActual . " " .
                $loteprod->medida->sigla . "\n";
                $productosInfo .= "Precio de compra del producto: " . $loteprod->precioCompra . " Bs.\n";
                $productosInfo .= "-------------------------------------------\n"; // Línea de separación
                @endphp

                <!-- Resto del código de la tabla -->

            @endforeach

                <!-- Agregamos el input con la información de los productos -->
                <input type="hidden" id="productosInfo" name="Información de los productos" type="text" value="{{ $productosInfo }}">



       

                <input type="hidden" name="_next" value="{{ route('lotes.reembolsarInicio') }}">
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_subject" value="Solicitud de reembolso">





                <div class="p-5">
                    <button type="button" id="enviarMensaje"
                        class="bg-blue-600 text-white font-bold px-6 py-3 rounded-lg">
                        <i class="fa-regular fa-paper-plane"> Mandar mensaje</i>
                    </button>
                </div>
        </div>

    </form>

    <script>
        function handleFormSubmit() {
           
            
            // Muestra la alerta de SweetAlert
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Mensaje enviado exitosamente',
                showConfirmButton: false,
                timer: 3000
            });
    
            // Devuelve false para prevenir la presentación predeterminada del formulario
            return false;
        }
    
        // Asigna la función handleFormSubmit al clic del botón enviarMensaje
        document.getElementById('enviarMensaje').addEventListener('click', handleFormSubmit);
    </script>
    
    

    <script>
        // Agregar un evento de clic al botón "enviarMensaje"
            document.getElementById("enviarMensaje").addEventListener("click", function() {
            // Enviar el formulario de mensaje cuando se hace clic en el botón
            document.getElementById("formularioMensaje").submit();
            
            // Luego, enviar el formulario principal
          //  document.getElementById("formularioPrincipal").submit();
        });
    </script>

    <script>
        let productoIndex = {{ count($lote->loteprod) - 1 }};

        document.getElementById('agregarProducto').addEventListener('click', function () {
            productoIndex++;

            const productosDiv = document.getElementById('productos');

            const productoInput = document.createElement('div');
            productoInput.classList.add('grid', 'lg:grid-cols-4', 'grid-cols-1', 'gap-4', 'p-2');
            productoInput.innerHTML = `
                <div class="col-span-1">
                    <label for="producto">Producto</label>
                    <select id="producto" name="productos[${productoIndex}][producto_id]"
                        class="px-3 py-2 w-full rounded-xl bg-blue-100">
                        <option value="">Selecciona un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="cantidad">Cantidad</label>
                    <input id="cantidad" name="productos[${productoIndex}][cantidad]" type="number" min="1"
                        class="px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Cantidad">
                </div>
                <div class="col-span-1">
                    <label for="medida">Medida</label>
                    <select id="medida" name="productos[${productoIndex}][medida_id]"
                        class="px-3 py-2 w-full rounded-xl bg-blue-100">
                        <option value="">Selecciona la medida</option>
                        @foreach ($medidas as $medida)
                            <option value="{{ $medida->id }}">{{ $medida->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="precioCompra">Precio de Compra</label>
                    <input id="precioCompra" name="productos[${productoIndex}][precioCompra]" type="number" min="1"
                        class="px-3 py-2 w-full rounded-xl bg-blue-100" placeholder="Precio de Compra">
                </div>
            `;

            productosDiv.appendChild(productoInput);
        });
    </script>
</x-app-layout>