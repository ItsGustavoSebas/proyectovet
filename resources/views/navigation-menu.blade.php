<nav x-data="{ open: false }">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


    <div id="main">
        <div class="w3-teal">
            <button id="openNav" class="w3-button w3-xlarge" onclick="toggleMenu1()">&#9776; Menú</button>
        </div>
    </div>

    <style>
        .w-100 {
            background-color: rgb(31 41 55 / var(--tw-bg-opacity));
            color: #fff;
            padding: 1rem;
            text-align: right;
            border-bottom: 2px solid white;
        }

        h4 {
            font-family: "Tahoma", sans-serif;
            font-weight: bold;
            font-size: 1rem;
            line-height: 2;
            text-transform: uppercase;
        }

        .rounded {
            border-radius: 0rem;
        }
        #main .w3-teal {
        background: linear-gradient(to right, #4338ca, #1e1b4b) !important;
        color: #fff !important;
    }
    </style>

    <body class="h-screen" style="background- color: rgb(31 41 55 / var(--tw-bg-opacity))">

        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
            <div class="bg-gray-800 text-white px-3" style="height:inherit">
                
                @can('Vizualizar Menu')
                <nav>
                    <div class="w-100 rounded px-1" style="display: flex; align-items:center; justify-content:center; text-align:center">
                        <img src="{{ asset('build/imagenes/utilitarios/logotransp.png') }}" alt="Logo" style="float:none;" width="70" height="65" >
                        <h4>Paquetes Identificados</h4>
                    </div>
                    <ul class="space-y-2">
                        <li class="opcion-con-desplegable">
                            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-address-card mr-2" style="color: #ffffff;"></i>
                                    <span>Usuarios y Autentificacion</span>
                                </div>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                            <ul class="desplegable ml-4 hidden">
                                @can('Listar Roles')
                                <li>
                                    
                                    <a href="{{ route('bitacoras.rinicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Visualizar Bitácora
                                    </a>
                                </li>
                                @endcan
                                <li>
                                    <a href="{{ route('register') }}" id="logout-and-register"
                                        class="p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Registrar Usuario
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}" id="logout-and-login"
                                        class="p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Iniciar Sesión
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <button type="submit" class="p-2 hover:bg-gray-700 flex items-center">
                                            <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                            Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                                @can('Listar Roles')
                                    <li>
                                    <a href="{{ route('roles.inicio') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Permisos
                                    </a>
                                    </li>
                                @endcan
                                @can('Listar Empleados')
                                   <li>
                                    <a href="{{ route('empleados.inicio') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Empleado
                                    </a>
                                    </li> 
                                @endcan
                                @can('Listar Clientes')
                                <li>
                                    <a href="{{ route('clientes2.inicio') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Cliente
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="opcion-con-desplegable">
                            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-briefcase-medical mr-2" style="color: #fafcff;"></i>
                                    <span>Mascotas y Atencion Veterinaria</span>
                                </div>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                            <ul class="desplegable ml-4 hidden">
                                @can('Listar Mascotas')
                                <li>
                                    <a href="{{ route('mascotas.rinicio') }}"
                                        class="p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Mascota
                                    </a>
                                </li>
                                @endcan
                                @can('Listar Mascotas')
                                <li>
                                    <a href="{{ route('mascotas.rinicio') }}"
                                        class="p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Generar Historial Médico
                                    </a>
                                </li>
                                @endcan
                                @can('Listar Reservas')
                                <li>
                                    <a href="{{ route('reservar.consultar', Auth::id()) }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Consultar Reservas
                                    </a>
                                </li>
                                @endcan
                                @can('Listar Consultas')
                                <li>
                                    <a href="{{ route('consulta.consultas') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Consulta
                                    </a>
                                </li>
                                @endcan
                                <li>
                                    <a href="consulta.consultas" class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Tratamiento de la Consulta
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Receta Medica
                                    </a>
                                </li>
                                @can('Listar Tratamientos')
                                <li>
                                    <a href="{{ route('tratamientos.inicio') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Tratamiento
                                    </a>
                                </li>
                                @endcan
                                @can('Visualizar Servicios')
                                <li>
                                    <a href="{{ route('servicios.inicio') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Servicio
                                    </a>
                                </li>
                                @endcan
                                @can('Crear Reserva')
                                <li>
                                    <a href="{{ route('reservar.inicio', Auth::id()) }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Reserva
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="opcion-con-desplegable">
                            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                                <div class="flex items-center">
                                    <i class="fas fa-chart-bar mr-2"></i>
                                    <span>Inventario y Productos</span>
                                </div>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                            <ul class="desplegable ml-4 hidden">
                                <li>
                                    <a href="{{ route('lotes.reembolsarInicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Devolucion al Proveedor
                                    </a>
                                </li>
                                @can('Listar Proveedores')
                                <li>
                                    <a href="{{ route('proveedor.inicio') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Proveedor
                                    </a>
                                </li>
                                @endcan
                                @can('Listar Productos')
                                <li>
                                    <a href="{{ route('productos.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Producto
                                    </a>
                                </li>
                                @endcan
                                @can('Listar Lotes')
                                <li>
                                    <a href="{{ route('lotes.inicio') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Lote
                                    </a>
                                </li>
                                @endcan
                                @can('Listar Categorias')
                                <li>
                                    <a href="{{ route('categorias.inicio') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Categoria
                                    </a>
                                </li>
                                @endcan
                                @can('Listar Marcas')
                                <li>
                                    <a href="{{ route('marcas.inicio') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Marca
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="opcion-con-desplegable">
                            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                                <div class="flex items-center">
                                    <i class="fas fa-file-alt mr-3"></i>
                                    <span>Ventas y Finanzas</span>
                                </div>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                            <ul class="desplegable ml-4 hidden">
                                <li>
                                    <a href="{{ route('nota_venta.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Nota de Venta
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('facturas.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar facturas
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Recibos.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar recibos
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Nota de Compra
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('reporte.inicio') }}" class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Gestionar Reportes Financieros
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <div class="w-100 rounded px-3">
                            <h4></h4>
                        </div>
                        <!-- Agrega más enlaces para la navegación lateral -->
                        <a href="{{ route('dashboard') }}" :active="request() - > routeIs('dashboard')"
                            class=" p-1 py-2 hover:bg-gray-700 flex items-center">
                            <i class="fas fa-home mr-2"></i>
                            Inicio
                        </a>
                        <li class="opcion-con-desplegable">
                            <div class="flex items-center justify-between p-2 py-2 hover:bg-gray-700">
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-2"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </div>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                            <ul class="desplegable ml-4 hidden">
                                <li>
                                    <a href="{{ route('profile.show') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Perfil
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <button type="submit" class="p-2 hover:bg-gray-700 flex items-center">
                                            <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                            Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                @endcan

                {{-- MENU PARA EL CLIENTE --}}
                @can('Menu Cliente')
                <nav>
                    <div class="w-100 rounded px-3">
                        <h4>La Hacienda</h4>
                    </div>
                    <ul class="space-y-2">
                        <li class="opcion-con-desplegable">
                            <div class="flex items-center justify-between p-2 hover:bg-gray-700">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    <span>Reservas</span>
                                </div>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                            <ul class="desplegable ml-4 hidden">
                                <li>
                                    <a href="{{ route('mascotas.inicio', Auth::id()) }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Mis Mascotas
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('reservar.consultar_cliente', Auth::id()) }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Consulta tus Reservas
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('reservar.inicio', Auth::id()) }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Crea Tu Reserva
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('productos.inicio')}}" class=" p-2 hover:bg-gray-700 flex items-center">
                                <i class="fas fa-chart-bar mr-2"></i>
                                Productos
                            </a>
                        </li>
                        
                        <div class="w-100 rounded px-3">
                            <h4></h4>
                        </div>
                        <!-- Agrega más enlaces para la navegación lateral -->
                        <a href="{{ route('dashboard') }}" :active="request() - > routeIs('dashboard')"
                            class=" p-1 py-2 hover:bg-gray-700 flex items-center">
                            <i class="fas fa-home mr-2"></i>
                            Inicio
                        </a>
                        <li class="opcion-con-desplegable">
                            <div class="flex items-center justify-between p-2 py-2 hover:bg-gray-700">
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-2"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </div>
                                <i class="fas fa-chevron-down text-xs"></i>
                            </div>
                            <ul class="desplegable ml-4 hidden">
                                <li>
                                    <a href="{{ route('profile.show') }}"
                                        class=" p-2 hover:bg-gray-700 flex items-center">
                                        <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                        Perfil
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <button type="submit" class="p-2 hover:bg-gray-700 flex items-center">
                                            <i class="fas fa-chevron-right mr-2 text-xs"></i>
                                            Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                @endcan

            </div>
        </div>
    </body>



    <script>
        function toggleMenu1() {
            var mainElement = document.getElementById("main");
            var sidebarElement = document.getElementById("mySidebar");
            var openNavElement = document.getElementById("openNav");

            if (window.innerWidth > 600) {
                // Si el ancho de la ventana es mayor a 600px, muestra la barra lateral
                if (mainElement.style.marginLeft === "0%") {
                    mainElement.style.marginLeft = "0.1%";
                    sidebarElement.style.display = "none";
                    openNavElement.innerHTML = "&#9776; Menú";
                } else {
                    mainElement.style.marginLeft = "0%";
                    sidebarElement.style.width = "18%";
                    sidebarElement.style.display = "block";
                    openNavElement.innerHTML = "&times; Cerrar";
                }
            } else {
                /// Si el ancho de la ventana es 600px o menos, mueve el menú y cambia la palabra a "Cerrar"
                if (sidebarElement.style.display === 'block') {
                    mainElement.style.marginLeft = "0%";
                    sidebarElement.style.display = "none";
                    openNavElement.innerHTML = "&#9776; Menú";
                } else {
                    mainElement.style.marginLeft = "0%";
                    sidebarElement.style.width = "100%";
                    sidebarElement.style.display = "block";
                    openNavElement.innerHTML = "&times; Cerrar";
                }
            }
        }

        // Cierra la barra lateral cuando se hace clic en algún enlace
        document.addEventListener("DOMContentLoaded", function() {
            var opcionesDesplegables = document.querySelectorAll('.opcion-con-desplegable');

            opcionesDesplegables.forEach(function(opcion) {
                opcion.addEventListener('click', function() {
                    var desplegable = this.querySelector('.desplegable');

                    // Cierra todas las listas desplegables excepto la actual
                    cerrarTodasLasListasDesplegables(opcion);

                    if (desplegable) {
                        // Abre o cierra la lista desplegable actual
                        desplegable.style.display = (desplegable.style.display === 'block') ?
                            'none' : 'block';
                    }
                });
            });

            // Cierra todas las listas desplegables excepto la actual
            function cerrarTodasLasListasDesplegables(opcionActual) {
                opcionesDesplegables.forEach(function(opcion) {
                    var desplegable = opcion.querySelector('.desplegable');
                    if (opcion !== opcionActual && desplegable && desplegable.style.display === 'block') {
                        desplegable.style.display = 'none';
                    }
                });
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#logout-and-register').click(function(e) {
                e.preventDefault(); // Evita el comportamiento predeterminado del enlace

                // Realiza la solicitud de cierre de sesión
                $.ajax({
                    url: "{{ route('logout') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function() {
                        // Después de cerrar sesión, redirige al usuario a la ventana de registro
                        window.location.href = "{{ route('register') }}";
                    },
                    error: function() {
                        // Manejar errores si es necesario
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#logout-and-login').click(function(e) {
                e.preventDefault(); // Evita el comportamiento predeterminado del enlace

                // Realiza la solicitud de cierre de sesión
                $.ajax({
                    url: "{{ route('logout') }}",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function() {
                        // Después de cerrar sesión, redirige al usuario a la ventana de inicio de sesión
                        window.location.href = "{{ route('login') }}";
                    },
                    error: function() {
                        // Manejar errores si es necesario
                    }
                });
            });
        });
    </script>

</nav>
