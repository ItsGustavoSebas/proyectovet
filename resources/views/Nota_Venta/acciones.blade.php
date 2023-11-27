<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Acciones de Nota de Venta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <button id="reciboBtn" class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">Recibo</button>
                    <button id="facturaBtn" class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">Factura</button>
                    <button id="qrBtn" class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">QR</button>
                    <form action="{{ route('nota_venta.guardar', $notaVentaId) }}" method="POST">
                    @csrf
                    <input type="hidden" id="qrStatus" name="qr" value="false">
                    <!-- Campos para Recibo -->
                    <div id="reciboFields" style="display: none;">
                        <label for="nroRecibo">NroRecibo</label>
                        <input type="text" id="nroRecibo" name="nroRecibo">
                    </div>

                    <!-- Campos para Factura -->
                    <div id="facturaFields" style="display: none;">
                        <label for="nit">NIT</label>
                        <input type="text" id="nit" name="nit">
                        <label for="nroFactura">NroFactura</label>
                        <input type="text" id="nroFactura" name="nroFactura">
                    </div>
                    <!-- Campo para QR -->
                    <div id="qrFields" style="display: none;">

                        <!-- Aquí mostrarás el QR -->
                        <!-- <img src="{{ $qrUrl }}" alt="QR para realizar el pago"> -->
                        <p>QR para realizar el pago aquí</p>
                    </div>

                    <!-- Botón para confirmar el pago -->
                    <button id="confirmarPagoBtn" class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg">Confirmar Pago</button>
                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        // Event listeners para los botones de Recibo, Factura y QR
        const reciboBtn = document.getElementById('reciboBtn');
        const facturaBtn = document.getElementById('facturaBtn');
        const qrBtn = document.getElementById('qrBtn');
        const reciboFields = document.getElementById('reciboFields');
        const facturaFields = document.getElementById('facturaFields');
        const qrFields = document.getElementById('qrFields');
    
        reciboBtn.addEventListener('click', function() {
            reciboFields.style.display = 'block';
            facturaFields.style.display = 'none';
            qrFields.style.display = 'none';
        });
    
        facturaBtn.addEventListener('click', function() {
            facturaFields.style.display = 'block';
            reciboFields.style.display = 'none';
            qrFields.style.display = 'none';
        });
    
        qrBtn.addEventListener('click', function() {
            qrStatus.value = 'true';
            qrFields.style.display = 'block';
            reciboFields.style.display = 'none';
            facturaFields.style.display = 'none';
        });
    </script>
</x-app-layout>
