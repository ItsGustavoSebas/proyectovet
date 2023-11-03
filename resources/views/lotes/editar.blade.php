<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Lote') }}
        </h2>
    </x-slot>

    <form action="{{ route('lotes.actualizar', $lote->id) }}" method="POST">
        @csrf
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
            <div class="p-5">
                <label class="font-bold text-lg" for="numeroLote">Número de Lote</label>
                <input id="numeroLote" name="numeroLote" type="text" class="px-3 py-2 w-full rounded-xl bg-blue-100"
                    value="{{ $lote->numeroLote }}" placeholder="Ingresa el número de lote">
                @error('numeroLote')
                    <strong class="text-red-500">Debes ingresar el número de lote</strong>
                @enderror
            </div>
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 p-5">
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="fechaCompra">Fecha de Compra</label>
                    <input id="fechaCompra" name="fechaCompra" type="date"
                        class="px-3 py-2 w-full rounded-xl bg-blue-100" value="{{ $lote->fechaCompra }}">
                    @error('fechaCompra')
                        <strong class="text-red-500">Debes ingresar la fecha de compra</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="fechaVencimiento">Fecha de Vencimiento</label>
                    <input id="fechaVencimiento" name="fechaVencimiento" type="date"
                        class="px-3 py-2 w-full rounded-xl bg-blue-100" value="{{ $lote->fechaVencimiento }}">
                    @error('fechaVencimiento')
                        <strong class="text-red-500">Debes ingresar la fecha de vencimiento</strong>
                    @enderror
                </div>
                <div class="col-span-1">
                    <label class="font-bold text-lg" for="proveedor_id">Proveedor</label>
                    <select id="proveedor_id" name="proveedor_id" class="px-3 py-2 w-full rounded-xl bg-blue-100">
                        <option value="">Selecciona un proveedor</option>
                        @foreach ($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}" @if ($proveedor->id == $lote->ID_Proveedor) selected @endif>
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
                                    class="px-3 py-2 w-full rounded-xl bg-blue-100">
                                    <option value="">Selecciona un producto</option>
                                    @foreach ($productos as $producto)
                                        <option value="{{ $producto->id }}" @if ($producto->id == $loteprod->producto->id) selected @endif>
                                            {{ $producto->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label for="cantidad">Cantidad</label>
                                <input id="cantidad" name="productos[{{ $index }}][cantidad]" type="number" min="1"
                                    class="px-3 py-2 w-full rounded-xl bg-blue-100" value="{{ $loteprod->cantidadComprada }}" placeholder="Cantidad">
                            </div>
                            <div class="col-span-1">
                                <label for="medida">Medida</label>
                                <select id="medida" name="productos[{{ $index }}][medida_id]"
                                    class="px-3 py-2 w-full rounded-xl bg-blue-100">
                                    <option value="">Selecciona una medida</option>
                                    @foreach ($medidas as $medida)
                                        <option value="{{ $medida->id }}" @if ($medida->id == $loteprod->medida->id) selected @endif>
                                            {{ $medida->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-1">
                                <label for="precioCompra">Precio de Compra</label>
                                <input id="precioCompra" name="productos[{{ $index }}][precioCompra]" type="number" min="1"
                                    class="px-3 py-2 w-full rounded-xl bg-blue-100" value="{{ $loteprod->precioCompra }}" placeholder="Precio de Compra">
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" id="agregarProducto" class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">Agregar Producto</button>
            </div>
            <div class="p-5">
                <button type="submit" class="bg-blue-600 text-white font-bold px-6 py-3 rounded-lg">
                    <i class="fa-solid fa-floppy-disk">Guardar</i>
                </button>
            </div>
        </div>
    </form>

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
