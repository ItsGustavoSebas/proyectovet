<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-5 px-3">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @livewire('producto.producto-inicio')
        </div>
    </div>

    hola
</x-app-layout> 
