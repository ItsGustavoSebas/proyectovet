<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Nota de Venta') }}
        </h2>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
        <div class="p-5">
            <!-- Mostrar detalles de la nota de venta -->
            <p><strong>Cliente:</strong> {{ $nota_venta->cliente->usuario->name }}</p>
            <p><strong>Factura:</strong> {{ $nota_venta->factura ? 'Sí' : 'No' }}</p>
            @if ($nota_venta->factura)
                <p><strong>NIT:</strong> {{ $nota_venta->nit }}</p>
            @endif
            <p><strong>Recibo:</strong> {{ $nota_venta->recibo ? 'Sí' : 'No' }}</p>
            <p><strong>QR:</strong> {{ $nota_venta->qr ? 'Sí' : 'No' }}</p>

            <hr>
         
            <p class="font-bold text-lg">Productos en la Nota de Venta</p>
            @foreach ($nota_venta->detalleVenta as $detalle)
                <p><strong>Producto:</strong> {{ $detalle->producto->nombre }}</p>
                <p><strong>Cantidad:</strong> {{ $detalle->cantidad }}</p>
                <p><strong>Precio:</strong> ${{ $detalle->precio }}</p>
                <hr>
            @endforeach

            <p class="font-bold text-lg">Citas en la Nota de Venta</p>
            @foreach ($nota_venta->detalleCita as $detalle)
                <p><strong>Cita:</strong> {{ $detalle->descripcion }}</p>
                <p><strong>Precio:</strong> ${{ $detalle->montoTotal }}</p>
                <hr>
            @endforeach

            <!-- Mostrar el monto total -->
            <p><strong>Monto Total:</strong> ${{ $nota_venta->montoTotal }}</p>
        </div>
    </div>
</x-app-layout>
