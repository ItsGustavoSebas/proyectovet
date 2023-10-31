<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="width: 20%; float:left">
        @include('layouts.sidebar')
    </div>
    <div style="width: 80%; float:right">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <x-welcome />
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtener todas las opciones principales con desplegables
            const opcionesConDesplegable = document.querySelectorAll(".opcion-con-desplegable");

            // Agregar evento de clic a cada opción principal
            opcionesConDesplegable.forEach(function(opcion) {
                opcion.addEventListener("click", function() {
                    // Obtener el desplegable asociado a la opción
                    const desplegable = opcion.querySelector(".desplegable");

                    // Alternar la clase "hidden" para mostrar u ocultar el desplegable
                    desplegable.classList.toggle("hidden");
                });
            });
        });
    </script>
</x-app-layout>
