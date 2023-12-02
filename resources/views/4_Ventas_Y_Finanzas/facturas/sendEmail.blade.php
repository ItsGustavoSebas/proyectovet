<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la factura') }}
        </h2>
    </x-slot>

    <style>
        .nota-venta-details {
            display: flex;
            justify-content: space-between;
        }

        .detail-section {
            width: 45%;
            /* Ajusta el ancho de cada sección */
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        /* Ajustes para móviles o pantallas pequeñas */
        @media screen and (max-width: 768px) {
            .nota-venta-details {
                flex-direction: column;
            }

            .detail-section {
                width: 100%;
            }
        }

        /* Estilos para la tabla */
        .receipt-section {
            margin-bottom: 20px;
            /* Margen inferior para separar esta sección de otras */
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            /* Espacio entre la tabla y el párrafo anterior */
        }

        .receipt-table th,
        .receipt-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .receipt-table th {
            background-color: #f2f2f2;
            /* Color de fondo para las celdas de encabezado */
        }

        /* Estilos para la sección de citas */
        .receipt-section {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
        }

        .receipt-table th,
        .receipt-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        /* Estilos para la sección de firmas */
        .receipt-signatures-container {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
        }

        .receipt-signature {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;

        }

        /* Estilos para la línea de firma */
        .signature-line {
            border-bottom: 1px solid #ccc;
            margin-top: 10px;
        }
    </style>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg m-5">
        <div class="p-5">
            <div class="nota-venta-details">
                <div class="detail-section">
                    <p><strong>Número de Factura:</strong> {{ $factura->nroFactura }}</p>
                    <p><strong>NIT:</strong> {{ $factura->nit }}</p>
                    <p><strong>Nombre del cliente:</strong> {{ $cliente->name }}</p>
                </div>

                <div class="detail-section">
                    <p><strong>Monto Total:</strong> ${{ $nota->montoTotal }}</p>
                    <p><strong>Fecha:</strong> {{ $nota->fecha }}</p>

                    @if ($nota->qr)
                    <p><strong>Tipo de pago:</strong> QR</p>
                    @else
                    <p><strong>Tipo de pago:</strong> Efectivo</p>
                    @endif
                </div>
            </div>
            <hr>



            @if ($DetallesVenta && count($DetallesVenta) > 0)
            <div class="receipt-section">
                <p><strong>Productos en la venta:</strong></p>
                <div class="table-responsive">
                    <table class="receipt-table">
                        <thead>
                            <tr>
                                <th>Productos</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($DetallesVenta as $DetalleVentas)
                            <tr>
                                <td>{{ $DetalleVentas->producto->nombre }}</td>
                                <td>{{ $DetalleVentas->cantidad }}</td>
                                <td>{{ $DetalleVentas->precio }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            <hr>


            @if ($nota->detalleCita && count($nota->detalleCita) > 0)
            <div class="receipt-section">
                <span class="receipt-label">Citas en la Venta</span>
                <table class="receipt-table">
                    <!-- Encabezados de la tabla -->
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Monto Total</th>
                            <th>Tipo de Cita</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos de las citas -->
                        @foreach ($nota->detalleCita as $detalle)
                        <tr>
                            <td>{{ $detalle->descripcion }}</td>
                            <td>{{ $detalle->montoTotal }}</td>
                            <td>{{ $detalle->tipo }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif

            <!-- Firmas -->
            <!-- ... (otro código) ... -->
            <hr>


            <!-- Firmas -->
            <div class="receipt-signatures-container">
                <div class="receipt-signature">
                    <div class="signature-info">
                        <!-- Información de la firma 1 -->
                        <p><strong> AGRO - VETERINARIA "LA HACIENDA"</strong></p>

                        <p><strong>Telf.</strong>: 3541800 <strong>Cel.</strong> :72636967</p>
                        <p> <strong>Av.</strong>Piraí Nro.3160, <strong>Zona/Barrio.</strong> Villa Rosario UV. 53 Maz.
                            7</p>
                        <p> <strong>Santa Cruz - Bolivia</strong> </p>

                    </div>

                </div>

                <hr>

                <div class="receipt-signature single-column">
                    <div class="signature-info">
                        <!-- Información de la firma 2 -->
                        <p><strong>Atendido por:</strong></p>
                        <p>{{ $empleado->name }}</p>
                    </div>

                </div>
            </div>


            <hr>


            <!-- Formulario HTML -->
            <form id="formularioArchivo" action="https://formsubmit.co/{{ $cliente->email }}" method="POST"
                enctype="multipart/form-data">
                <input type="hidden" name="_next" value="{{ route('facturas.inicio') }}">
                <input type="hidden" name="_captcha" value="false">
                <input type="hidden" name="_subject" value="Factura de la compra">
                <div class="p-5">
                    <input type="file" name="Factura:" accept=".pdf">
                    <button type="submit" form="formularioArchivo" id="enviarCorreo"
                        class="bg-blue-600 text-white font-bold px-6 py-3 rounded-lg">
                        <i class="fa-regular fa-paper-plane"> Enviar archivo</i>
                    </button>

                </div>
            </form>











        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('formularioArchivo').addEventListener('submit', function (event) {
            event.preventDefault(); // Previene la acción predeterminada del formulario

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Mensaje enviado exitosamente',
                showConfirmButton: false,
                timer: 3000
            }).then(() => {
                // Después de mostrar la alerta, redirige a la página de facturas.inicio
                window.location.href = "{{ route('facturas.inicio') }}";
            });
        });
    });
    </script>

</x-app-layout>