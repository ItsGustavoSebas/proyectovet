<div>

    <script>
        let seleccionActual = null; // Valor predeterminado, puede ser 'consulta' o 'servicio'.
        let seleccionConfir = null;
 

    </script>

    <div class="fixed flex h-full w-full" style="background-color: #171823;"></div>
    <script src="https://kit.fontawesome.com/e44f857295.js" crossorigin="anonymous"></script>
    <!-- Enlaces a los estilos de Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>









    <style>
        .imagen-con-fondo {
            background-image: url('build/imagenes/utilitarios/ReservarImage.jpg');
            background-size: cover;
            background-position: center 70%;
            height: 49vh;
            /* Ajusta la altura según tus necesidades */
            position: relative;
            /* Cambia "relative" a "fixed" o "absolute" si es necesario */
            z-index: 0;
            /* Asegura que esté sobre .fondo-color-oscuro */



        }
    </style>




    <div class="imagen-con-fondo">

        <div class="relative top-[25px] left-[0%] right-[0%] md:left-[40px] w-full md:w-1/5 h-[420px] bg-[#5E5959]">


            <h1 class="text-5xl font-bold text-white mb-1 text-center md:mb-4">
                Reservar cita
            </h1>




            <div class="flex justify-center -mx-3 mt-12">
                <div class="w-full md:w-5/6 px-3 mb-2">
                    <div class="relative flex">
                        <div class="absolute top-1/2 left-3 transform -translate-y-1/2 z-10">
                            <i class="fa-regular fa-message text-gray-400 text-lg"></i>
                        </div>
                        <input autocomplete="off" wire:model="descripcion" id="descripcion" type="text"
                            name="descripcion"
                            class="w-full pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                            placeholder="Ingresar el movito de la reserva">

                    </div>
                </div>
            </div>





            <!-- Agregar espacio aquí -->
            <div class="flex justify-center">
                <div class="md:mb-2">
                    <div class="ml-0 mb-2 text-white rounded-full border-2 border-black px-1 py-1">
                        <label for="consulta">
                            <input type="radio" id="consulta" name="cita" value="consulta"
                                onclick="mostrarSelect('consulta')">
                            Consulta médica
                        </label>
                    </div>
                    <div class="ml-0 text-white rounded-full border-2 border-black px-1 py-1">
                        <label for="servicio">
                            <input type="radio" id="servicio" name="cita" value="servicio"
                                onclick="mostrarSelect('servicio')">
                            Servicio estético
                        </label>
                    </div>
                </div>
            </div>



            <style>
                .mover-derecha {
                    margin-left: 32px;
                    margin-right: 10px;
                    /* Ajusta el valor según tus necesidades */
                }
            </style>

            <!-- El selector select se muestra solo si el radio de servicios está seleccionado -->
            <select id="miSelect" style="display: none;" class="mover-derecha rounded-full mb-1 mt-2">
                <option value="opcion1">Opción 1</option>
                <option value="opcion2">Opción 2</option>
                <option value="opcion3">Opción 3</option>
            </select>



            <script>
                function mostrarSelect(radioId) {
                 const radioConsulta = document.getElementById('consulta');
                 const radioServicio = document.getElementById('servicio');
                 const select = document.getElementById('miSelect');
                                
                 
                 if (radioId === 'servicio' && radioServicio.checked)
                 {
                   select.style.display = 'none';
                   seleccionActual='servicio';
                 } else if (radioId === 'consulta' && radioConsulta.checked) { 
                   select.style.display = 'none';
                   seleccionActual = 'consulta';
                 }
                   
                }
                        
                 // Asegúrate de que cuando la página se cargue inicialmente, se ajuste según el estado inicial del radio.
                mostrarSelect('consulta');
                mostrarSelect('servicio');

                document.getElementById('miSelect').addEventListener('change', function () {
                 seleccionActual = this.value;
         
                
                 console.log("Nuevo valor de seleccionActual:", seleccionActual); // Agrega esto para verificar el valor
               
             
                }
           
                

                );
                
              
        
            </script>






            <div class="flex justify-center -mx-3">
                <div class="w-full md:w-5/6 px-3 mb-2 mt-1">
                    <div class="relative flex">
                        <div class="absolute top-1/2 left-2 transform -translate-y-1/2 z-10">
                            <i class="fa-regular fa-calendar-days" style="color: #3e4b60;"></i>
                        </div>
                        <button wire:click="$set('modalFecha', true)" wire:click="actualizarTipo(seleccionActual)"
                            id="Fecha-button"
                            class="w-full pl-10 pr-3 py-2 rounded-2xl border-2 border-gray-200 outline-none focus:border-indigo-500"
                            style="background-color: white;">
                            Elegir fecha y hora


                        </button>
                    </div>
                </div>
            </div>






            <h1 class="text-1xl font-bold  text-gray-300 mb-0 text-center md:mt-4">
                "Con paciencia se puede atender a todos"
            </h1>













        </div>
    </div>




    <div class="contenedor-general">

        <style>
            .nosotros-titulo {
                text-align: center;
                font-size: 3.5em;
                /* Ajusta el tamaño de fuente según tus necesidades */
                color: white;
                /* Cambia el color del texto según tus preferencias */

                background: #171823;
                /* Color de fondo fijo */
            }

            .contenedor-general {
                position: relative;
            }
        </style>

        <h1 class="nosotros-titulo">Acerca de nosotros</h1>

        <div class="fondo-color-oscuro">



            <style>
                .fondo-color-oscuro {
                    background-color: #171823;
                    height: 40vh;
                    /* Ajusta la altura según tus necesidades */
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    position: relative;
                    /* Añade "position: relative" */
                    z-index: 1;
                    /* Asegura que esté debajo de .imagen-con-fondo */
                }
            </style>





            <style>
                .image-container {
                    perspective: 1000px;
                    width: calc(50% - 20px);
                    /* Ajusta el tamaño de los contenedores */
                    height: 300px;
                    position: relative;
                    cursor: pointer;
                    margin: 0 10px;
                    /* Ajusta el margen horizontal a 10px */
                    text-align: center;
                }

                .image {
                    width: 100%;
                    height: 100%;
                    transform-style: preserve-3d;
                    transition: transform 0.5s;
                }

                .back {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                    transform: rotateY(180deg);
                    transform-style: preserve-3d;
                    transition: transform 0.5s;
                    background-color: #3b415a;
                    padding: 0px;
                    display: none;
                    border-radius: 30px;
                    width: max-content;
                    /* Establece el radio del borde */
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                    flex-direction: column;
                    /* Añade esta línea para centrar verticalmente */
                    overflow-x: auto;
                    /* Habilita la barra de desplazamiento horizontal */
                    overflow-wrap: break-word;
                    /* Rompe el texto en líneas si es demasiado largo */
                    white-space: normal;
                    /* Permite el ajuste automático de líneas del texto */
                    width: 100%;
                    /* Ancho del contenido del 100% */





                }

                .back p {
                    color: white;
                    font-size: 1.5em;
                    /* Ajusta el tamaño de fuente según tus necesidades */
                    position: absolute;
                    top: 30%;

                }

                .image-container.active .image {
                    transform: rotateY(180deg);
                }

                .image-container.active .back {
                    transform: rotateY(0);
                    display: block;
                }
            </style>

            <script>
                function flipImage(element) {
                 element.classList.toggle('active');
                }
    
    
            </script>



            <div class="image-container w-1/2 md:w-1/1 lg:w-1/5 px-4 mb-5" onclick="flipImage(this)">
                <div class="image">
                    <img src="build/imagenes/utilitarios/personal1.jpg" alt="Imagen"
                        class="rounded-3xl mx-auto w-full md:w-[500px] h-[300px]" style="object-fit: cover;">
                </div>
                <div class="back">
                    <p>Mi nombre es: xxx soy el veterinario principal mi objetivo es brindar el mejor servicio posible
                        para
                        nuestras queridas mascotas
                </div>
            </div>

            <div class="image-container w-1/2 md:w-1/1 lg:w-1/5 px-4 mb-5 " onclick="flipImage(this)">
                <div class="image">
                    <img src="build/imagenes/utilitarios/personal2.jpg" alt="Imagen"
                        class="rounded-3xl mx-auto w-full md:w-[500px] h-[300px]" style="object-fit: cover;">

                </div>
                <div class="back">
                    <!-- Contenido adicional o diálogo -->
                    <p>Mi nombre es: xxx soy la estilista principal mi objetivo es brindar un look increible para las
                        mascotas destacando sus facciones más hermosas

                </div>
            </div>



            <div class="image-container" onclick="flipImage(this)">
                <div class="image">
                    <img src="build/imagenes/utilitarios/personal3.jpg" alt="Imagen"
                        class="rounded-3xl mx-auto w-full md:w-[500px] h-[300px]" style="object-fit: cover;">
                </div>
                <div class="back">
                    <!-- Contenido adicional o diálogo -->
                    <p>Mi nombre es: xxx soy el cirujano principal mi objetivo es realizar una cirujia limpia a las
                        mascotas
                        tal como nosotros necesitamos a alguien experto, nuestra smascotas necesita a alguien experto.
                </div>
            </div>




        </div>

    </div>




    <x-dialog-modal wire:model="modalFecha" id="modalFecha">


        <x-slot name="title">
            <h3 class="text-center text-3xl">Rellenar datos de reserva</h3>

        </x-slot>



        <x-slot name="content">


            <label class="font-bold mb-3" for="fechaInput" style="font-size: 15px;">Seleccionar fecha:</label>

            <div wire:ignore>
                <input class="form-control" type="datetime-local" placeholder="Click para seleccionar"
                    id="fechaProgramada" name="fechaProgramada" wire:model='fechaProgramada'>

            </div>

            <script>
                document.addEventListener('livewire:load', function () { 
                    // Livewire.on('mostrar',(data)=>{
                    // console.log(data)
                    // })
                    const fechaInput = document.getElementById('fechaProgramada');
            
                    // Escucha el evento "change" en el input para detectar cambios en la fecha seleccionada
                    fechaInput.addEventListener('change', function (event) {
                        const fechaSeleccionada = event.target.value;
                        seleccionConfir = fechaSeleccionada;                       
                        console.log(fechaSeleccionada); // Imprime la fecha en la consola}
                    
                       
            
                        // Realiza una llamada a Livewire para obtener las horas reservadas
                        // @this.call('obtenerHorasReservadas', fechaSeleccionada, function(response) {
                          //  console.log(hora);
                        // });
                        Livewire.emit('obtenerHorasReservadas' , [fechaSeleccionada]);
                      



                    });
                });
            </script>









            <style>
                .time-matrix {
                    display: grid;
                    grid-template-columns: repeat(4, 1fr);
                    /* Ajusta el número de columnas según tus necesidades */
                    gap: 10px;
                    /* Espacio entre los elementos */
                    list-style: none;
                    padding: 0;
                    text-align: center;
                }

                .green-box {
                    background-color: green;
                    padding: 10px;
                    /* Ajusta el espacio interior según tus preferencias */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .red-box {
                    background-color: red;
                    padding: 10px;
                    /* Ajusta el espacio interior según tus preferencias */
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
            </style>

            <style>
                .red-outline {
                    border: 4px solid red;
                    box-shadow: 0 0 4px 2px red;

                }
            </style>

            <script>
                function toggleRedOutline(button) {
                button.classList.toggle('red-outline');
                 }
            </script>





            <div>
                <h3>Horarios disponibles</h3>
                <ul class="time-matrix mb-2">

                    @for ($hour = 8; $hour <= 11; $hour++) @if (in_array($hour,$horasReservadas) or $hour<date('H')-3)
                        <li>
                        <div class="red-box rounded-2xl">
                            <button
                                class="btn btn-danger @if($hora === str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00 AM') red-outline rounded-2xl @endif">
                                <span
                                    style="font-size: 18px; color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                    {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00 AM
                                </span>
                            </button>
                        </div>
                        </li>
                        @else
                        <li>
                            <div class="green-box rounded-2xl">
                                <button
                                    class="btn btn-danger @if($hora === str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00 AM') red-outline rounded-2xl @endif"
                                    wire:click="setHora('{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00 AM')">
                                    <span
                                        style="font-size: 18px; color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                        {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00 AM
                                    </span>
                                </button>
                            </div>
                        </li>
                        @endif

                        @endfor
                </ul>

                <ul class="time-matrix mb-2">
                    @for ($hour = 12; $hour <= 23; $hour++) @if (in_array($hour,$horasReservadas) or $hour<date('H')-3)
                        <li>
                        <div class="red-box rounded-2xl">
                            <button
                                class="btn btn-danger @if($hora === str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00 PM') red-outline rounded-2xl @endif">
                                <span
                                    style="font-size: 18px; color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                    {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00 PM
                                </span>
                            </button>
                        </div>
                        </li>
                        @else
                        <li>
                            <div class="green-box rounded-2xl">
                                <button
                                    class="btn btn-danger @if($hora === str_pad($hour, 2, '0', STR_PAD_LEFT) . ':00 PM') red-outline rounded-2xl @endif"
                                    wire:click="setHora('{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00 PM')">
                                    <span
                                        style="font-size: 18px; color: white; text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">
                                        {{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00 PM
                                    </span>
                                </button>
                            </div>
                        </li>
                        @endif

                        @endfor
                </ul>
                @error('descripcion')
                <h1 style="font-weight: bold; font-size: 20px; margin-bottom: 10px;">
                    Ingrese el motivo de la reserva
                </h1>
                @enderror

                @error('fechaProgramada')
                <h1 style="font-weight: bold; font-size: 20px; margin-bottom: 10px;">
                    Seleccione la fecha programada para la cita
                </h1>
                @enderror

                @error('hora')
                <h1 style="font-weight: bold; font-size: 20px; margin-bottom: 10px;">
                    Seleccione la hora para la reserva
                </h1>
                @enderror

                @error('tipo')
                <h1 style="font-weight: bold; font-size: 20px; margin-bottom: 10px;">
                    Selecciona si es consulta médica o servicio estético
                </h1>
                @enderror





            </div>









        </x-slot>






        <x-slot name='footer'>




            <x-secondary-button wire:click="$set('modalFecha', false)" class="mr-2">
                Cancelar
            </x-secondary-button>

            <x-danger-button wire:click="crearReserva(seleccionActual)" onclick="console.log(seleccionActual);">
                {{-- <script>
                    function recargarPagina() {
                        setTimeout(function() {
                            location.reload();
                        }, 1000); // 3000 milisegundos (3 segundos)
                    }
                </scrip>--}}
                Realizar la reserva
            </x-danger-button>


        </x-slot>


    </x-dialog-modal>





    <script>
        config={
    
          dateFormat: "Y-m-d ",
          minDate: "today",
          maxDate: new Date().fp_incr(30),
          altInput: true,
          locale: "es",
          disableMobile: true,
      
     
      
     


        }

        flatpickr("input[type=datetime-local]", config);

        

        


                </script>

                ¿
                <!-- Luego, puedes mostrar las horas reservadas -->
                <script>
                    // Accede al vector de horas reservadas
    var horasReservadas = @json($horasReservadas);

    // Imprime el vector en la consola
 
                </script>












</div>