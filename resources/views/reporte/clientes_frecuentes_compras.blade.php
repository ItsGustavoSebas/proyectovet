<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Clientes Frecuentes en Compras') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="bg-white p-4">
                <h3>Clientes Frecuentes en Compras:</h3>
                <ul>
                    @foreach ($clientesFrecuentes as $cliente)
                        <li>{{ $cliente->ID_Cliente }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
