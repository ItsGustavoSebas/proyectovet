<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reportes') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-white" >
    <div class="container mx-auto px-4 sm:px-8 ">
        <div class="py-8">
            <div class="grid grid-cols-2 gap-4">
                <!-- Botón para Ventas en la Semana -->
                <a href="{{ route('reporte.ventas_semanal') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Ventas en la Semana
                </a>

                <!-- Botón para Ventas en el Mes -->
                <a href="{{ route('reporte.ventas_mes') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Ventas en el Mes
                </a>

                <!-- Botón para Ventas en el Año -->
                <a href="{{ route('reporte.ventas_año') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Ventas en el Año
                </a>

                <!-- Botón para Clientes en ventas -->
                <a href="{{ route('reporte.clientesFrecuentesCompras') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Clientes Frecuentes en Compras
                </a>

                <!-- Botón para Clientes Frecuentes -->
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Clientes Frecuentes en Atención Veterinaria
                </a>

                <!-- Botón para Servicios Populares -->
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Servicios Populares
                </a>

                <!-- Botón para Productos Más Vendidos -->
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Productos Más Vendidos
                </a>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
