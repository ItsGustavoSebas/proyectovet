<div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <div class="bg-black min-h-screen flex flex-col items-center justify-center p-4">
    <!-- Title -->
    <h1 class="text-5xl text-gray-200 mb-8 text-center">
      Servicios disponibles
    </h1>

    <!-- Profiles -->
    <div class="flex flex-wrap justify-center -mx-2">
      @for ($i = 0; $i < $cantidadFilas; $i++) @php $servicio=App\Models\Servicio::skip($i)->first();
        @endphp
        <div class="w-1/2 md:w-1/1 lg:w-1/5 px-4 mb-5">
          <a href="#" wire:click="cargarDetallesServicio({{ (int)$servicio->id }})" class="block">
            <img src="{{ asset($servicio->ruta_imagen) }}" class="rounded-3xl mx-auto w-full md:w-[700px] h-[200px]"
              style="object-fit: cover;">
            <p class="text-gray-500 group-hover:text-gray-300 text-center">{{ $servicio->nombre }}</p>
          </a>
        </div>
      @endfor

    <!-- Add Profile -->
    <a href="#" class="flex flex-col items-center group gap-3 mt-4">
      <svg wire:click="$set('modalCrear', true)"
        class="w-[150px] h-[150px] group-hover:bg-gray-300 border-2 border-transparent" viewBox="0 0 20 20"
        fill="#6b7280">
        <path fill-rule="evenodd"
          d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
          clip-rule="evenodd" />
      </svg>
      <p class="text-gray-500 group-hover:text-gray-300 text-center"> Add Profile </p>
    </a>
  </div>
</div>










  <x-dialog-modal wire:model="modalCrear">
    <x-slot name='title'>
      Añadir servicio

    </x-slot>


    <x-slot name='content'>
      <label class"font-bold mb-3" for="">Nombre:</label>
      <br>
      <input autocomplete="off" id="nombre" name="nombre" wire:model="nombre" type="text"
        class="px-3 py-2 border-black rounded-lg w-full" placeholder="Nombre del servicio">
      <br>

      <label class"font-bold mb-3" for="">Descripción:</label>
      <br>
      <textarea rows="4" id="descripcion" name="descripcion" wire:model="descripcion" type="text"
        class="px-3 py-2 border-black rounded-lg w-full" placeholder="Descripción del servicio"></textarea>
      <br>

      <label class"font-bold mb-3" for="">Precio:</label>
      <br>
      <input autocomplete="off" id="precio" name="precio" wire:model="precio" type="text"
        class="px-3 py-2 border-black rounded-lg w-full" placeholder="Precio del servicio">
      <br>

      <label class"font-bold mb-3" for="">Reservable:</label>
      <br>
      <input autocomplete="off" id="reservable" name="reservable" wire:model="reservable" type="text"
        class="px-3 py-2 border-black rounded-lg w-full" placeholder="¿Es reservable?">
      <br>

      <label class"font-bold mb-3" for="">imagen:</label>
      <input autocomplete="off" type="file" name="ruta_imagen" wire:model="ruta_imagen">



    </x-slot>



    <x-slot name='footer'>

      <x-secondary-button wire:click="$set('modalCrear', false)" class="mr-2"
        onclick="console.log('Botón Cancelar presionado');">
        cancelar
      </x-secondary-button>


      <x-danger-button wire:click="crearServicio" onclick="console.log('Botón crear presionado');">
        crear
        @if ($reservaExitosa)
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Servicio creado exitosamente',
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                // Restablece la variable después de mostrar el mensaje
                @this.reservaExitosa = false;
            });
        </script>
         @endif   
      </x-danger-button>



    </x-slot>

  </x-dialog-modal>






  <x-dialog-modal wire:model="modalServicio">
    <x-slot name="title">
      <h3 class="text-center text-3xl">Detalles del servicio</h3>
    </x-slot>

    <x-slot name="content">

      @if ($modoEdicion)
      <div class="mb-3">
        <label class="font-bold mb-3" for="nombre">Nombre:</label>
        <br>
        <input wire:model="servicioActual.nombre" type="text" class="px-3 py-2 border-black rounded-lg w-full"
          placeholder="Nombre del servicio">
        <br>
      </div>

      <div class="mb-3">
        <label class="font-bold mb-3" for="descripcion">Descripción:</label>
        <br>
        <input wire:model="servicioActual.descripcion" type="text" class="px-3 py-2 border-black rounded-lg w-full"
          placeholder="Descripción del servicio">
        <br>
      </div>

      <div class="mb-3">
        <label class="font-bold mb-3" for="precio">Precio:</label>
        <br>
        <input wire:model="servicioActual.precio" type="number" class="px-3 py-2 border-black rounded-lg w-full"
          placeholder="Precio del servicio">
        <br>
      </div>

      <div class="mb-3">
        <label class="font-bold mb-3" for="reservable">Reservable:</label>
        <br>
        <input wire:model="servicioActual.reservable" type="text" class="px-3 py-2 border-black rounded-lg w-full"
          placeholder="Reservable">
        <br>
      </div>

      <div class="mb-3">
        <label class="font-bold mb-3" for="imagen">Imagen:</label>
        <br>
        <input autocomplete="off" type="file" wire:model="servicioActual.ruta_imagen">
      </div>

      @else
      @if ($servicioActual)

      <div class="mb-3">
        <label class="font-bold">Nombre:</label>
        <p>{{ $servicioActual->nombre }}</p>
      </div>

      <div class="mb-3">
        <label class="font-bold">Descripción:</label>
        <p>{{ $servicioActual->descripcion }}</p>
      </div>

      <div class="mb-3">
        <label class="font-bold">Precio:</label>
        <p>{{ $servicioActual->precio }}</p>
      </div>

      <div class="mb-3">
        <label class="font-bold">Reservable:</label>
        <p>{{ $servicioActual->reservable }}</p>
      </div>

      <div class="mb-3">
        <label class="font-bold">Imagen:</label>
        <img src="{{ asset($servicioActual->ruta_imagen) }}" alt="{{ $servicioActual->nombre }} "
          style="max-width: 100%;" class="rounded-3xl">
      </div>

      @else
      Cargando...
      @endif
      @endif
    </x-slot>



    <x-slot name='footer'>


      @if ($modoEdicion)
      <button wire:click="guardarEdicion" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Guardar Cambios

      </button>

      <button wire:click="cancelarEdicion" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
        Cancelar
      </button>
      @elseif ($confirmacionEliminar)
      <!-- Aquí aparecen los botones "Sí" y "No para confirmar eliminación" -->
      <div class="modal">
        <div class="modal-content">
          <p>¿Estás seguro de que deseas eliminar este servicio?</p>
          <div class="button-container">
            <button wire:click="eliminarServicio"
              class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Sí</button>
            <button wire:click="cancelarEliminar"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">No</button>
          </div>
        </div>
      </div>
      @else

      <x-secondary-button wire:click="$set('modalServicio', false)" class="mr-2"
        onclick="console.log('Botón Cancelar presionado');">
        Cerrar
      </x-secondary-button>

      <button wire:click="confirmarEliminar" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
        Eliminar Servicio
      </button>

      @if($confirmacionEliminar)
      <div class="modal">
        <div class="modal-content">
          <p>¿Estás seguro de que deseas eliminar este servicio?</p>
          <div class="button-container">
            <button wire:click="eliminarServicio"
              class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Sí</button>
            <button wire:click="cancelarEliminar"
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">No</button>
          </div>
        </div>
      </div>
      @endif



      <button wire:click="editarServicio" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Editar Servicio
      </button>
      @endif





    </x-slot>

  </x-dialog-modal>





</div>