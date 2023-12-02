<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Clientes Frecuentes en Compras') }}
            </h2>
        </div>
    </x-slot>

    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative">
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    ID</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Nombre</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    CI</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Compras Realizadas</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group">
            @foreach ($clientesFrecuentes as $cliente)
            @php
        $user = \App\Models\User::where('id', $cliente->ID_Cliente)->first();
    @endphp
                <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $cliente->ID_Cliente }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $user->name }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $user->ci }}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $cliente->total_ventas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
