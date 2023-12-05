<x-app-layout>


    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="https://cdn.tailwindcss.com" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
            rel="stylesheet" />
        <!-- Favicon -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>

    <body>
        <div class="flex min-h-screen bg-gray-800 justify-center items-center">
            <main class="container mx-auto">
                <div class="grid mb-4 pb-10 px-8 rounded-3xl bg-gray-100 border-4 border-green-400">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-12 lg:col-span-12">
                            <div class="flex items-center h-10 intro-y py-7">
                                <h2 class="mr-5 text-lg font-medium truncate">Resumen Financiero</h2>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                    href="#">
                                    <div class="p-5">
                                        <div class="flex justify-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />

                                            </svg>
                                            <div
                                                class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                @if ($porcentajeCambioEntradas > 0)
                                                    <span
                                                        class="flex items-center">+{{ number_format($porcentajeCambioEntradas, 2) }}%</span>
                                                @elseif($porcentajeCambioEntradas < 0)
                                                    <span
                                                        class="flex items-center">{{ number_format($porcentajeCambioEntradas, 2) }}%</span>
                                                @else
                                                    <span
                                                        class="flex items-center">{{ number_format($porcentajeCambioEntradas, 2) }}%</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div class="mt-3 text-3xl font-bold leading-8">
                                                    {{ $cantidadEntradasHoy }}</div>

                                                <div class="mt-1 text-base text-gray-600">Los usuarios de hoy</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                    href="#">
                                    <div class="p-5">
                                        <div class="flex justify-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <div
                                                class="bg-red-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                <span
                                                    class="flex items-center">{{ number_format($porcentajeCitasPendientes, 2) }}%</span>
                                            </div>
                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div class="mt-3 text-3xl font-bold leading-8">
                                                    {{ $cantidadCitasHoy }}</div>

                                                <div class="mt-1 text-base text-gray-600">Citas Pendientes</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                    href="#">
                                    <div class="p-5">
                                        <div class="flex justify-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-pink-600"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                            </svg>
                                            <div
                                                class="bg-yellow-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                <span
                                                    class="flex items-center">{{ number_format($porcentajeCambioVentasDia, 2) }}%</span>
                                            </div>
                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div class="mt-3 text-3xl font-bold leading-8">
                                                    {{ $cantidadVentaHoy }}</div>

                                                <div class="mt-1 text-base text-gray-600">Ventas de hoy</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                    href="#">
                                    <div class="p-5">
                                        <div class="flex justify-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                            </svg>
                                            <div
                                                class="bg-blue-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                <span
                                                    class="flex items-center">{{ number_format($porcentajeCambioVentasMes, 2) }}%</span>
                                            </div>
                                        </div>
                                        <div class="ml-2 w-full flex-1">
                                            <div>
                                                <div class="mt-3 text-3xl font-bold leading-8">
                                                    {{ $cantidadVentasMesActual }}</div>

                                                <div class="mt-1 text-base text-gray-600">Ventas en el mes</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-span-12 mt-5">
                            <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                                <div class="bg-white shadow-lg p-4" id="chartline"></div>
                                <div class="bg-white shadow-lg" id="chartpie"></div>
                            </div>
                            <div class="bg-white">
                                <div class="container mx-auto px-4 sm:px-8">
                                    <div class="py-8">
                                        <div class="grid grid-cols-4 gap-4">
                                            <!-- Botones -->
                                            <!-- Botón para Ventas en la Semana -->
                                            <a href="{{ route('reporte.ventas_semanal') }}"
                                                class="bg-white shadow-md rounded-lg flex items-center p-4 hover:shadow-lg transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <!-- Icono -->
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <!-- Texto -->
                                                <div class="ml-4">
                                                    <!-- Nombre del botón -->
                                                    <div class="font-semibold">Ventas en la Semana</div>
                                                </div>
                                            </a>

                                            <!-- Botón para Ventas en el Mes -->
                                            <a href="{{ route('reporte.ventas_mes') }}"
                                                class="bg-white shadow-md rounded-lg flex items-center p-4 hover:shadow-lg transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <!-- Icono -->
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5.5 4.5h13v15h-13z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M8 9h4m0 0v6m0-6l4-3m-4 3-4 3" />
                                                </svg>
                                                <!-- Texto -->
                                                <div class="ml-4">
                                                    <!-- Nombre del botón -->
                                                    <div class="font-semibold">Ventas en el Mes</div>
                                                </div>
                                            </a>

                                            <!-- Botón para Ventas en el Año -->
                                            <a href="{{ route('reporte.ventas_año') }}"
                                                class="bg-white shadow-md rounded-lg flex items-center p-4 hover:shadow-lg transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <!-- Icono -->
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                </svg>
                                                <!-- Texto -->
                                                <div class="ml-4">
                                                    <!-- Nombre del botón -->
                                                    <div class="font-semibold">Ventas en el Año</div>
                                                </div>
                                            </a>

                                            <!-- Botón para Clientes Frecuentes en Compras -->
                                            <a href="{{ route('reporte.clientesFrecuentesCompras') }}"
                                                class="bg-white shadow-md rounded-lg flex items-center p-4 hover:shadow-lg transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-7 w-7 text-yellow-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                </svg>
                                                <div class="ml-4">
                                                    <div class="font-semibold">Clientes Frecuentes en Compras</div>
                                                </div>
                                            </a>
                                            <a href="{{ route('reporte.clientesFrecuentesAtencionVeterinaria') }}"
                                                class="bg-white shadow-md rounded-lg flex items-center p-4 hover:shadow-lg transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-7 w-7 text-purple-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                                </svg>
                                                <div class="ml-4">
                                                    <div class="font-semibold">Clientes Frecuentes en Atención
                                                        Veterinaria
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="{{ route('reporte.serviciosPopulares') }}"
                                                class="bg-white shadow-md rounded-lg flex items-center p-4 hover:shadow-lg transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-7 w-7 text-indigo-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                                </svg>
                                                <div class="ml-4">
                                                    <div class="font-semibold">Servicios Populares</div>
                                                </div>
                                            </a>
                                            <a href="{{ route('reporte.productosMasVendidos') }}"
                                                class="bg-white shadow-md rounded-lg flex items-center p-4 hover:shadow-lg transition duration-300">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-pink-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 14l-6-6 6-6" />
                                                </svg>
                                                <div class="ml-4">
                                                    <div class="font-semibold">Productos Más Vendidos</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        function data() {

            return {

                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false
                },
                isNotificationsMenuOpen: false,
                toggleNotificationsMenu() {
                    this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                },
                closeNotificationsMenu() {
                    this.isNotificationsMenuOpen = false
                },
                isProfileMenuOpen: false,
                toggleProfileMenu() {
                    this.isProfileMenuOpen = !this.isProfileMenuOpen
                },
                closeProfileMenu() {
                    this.isProfileMenuOpen = false
                },
                isPagesMenuOpen: false,
                togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen
                },

            }
        }
    </script>
    <script>
        var chart = document.querySelector('#chartline');

        var ventasPorDia = {!! json_encode($ventasPorDia) !!};
        var citasUltimos11Dias = {!! json_encode($citasUltimos11Dias) !!};

        var options = {
            series: [{
                    name: 'Ventas',
                    type: 'area',
                    data: ventasPorDia.map(item => item.total_precio)
                },
                {
                    name: 'Citas',
                    type: 'line',
                    data: citasUltimos11Dias.map(item => item.total_precio)
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            title: {
                text: 'Ventas y Citas de los Últimos 11 Días',
                align: 'center'
            },
            colors: ['#6E707E', '#4CAF50'],
            xaxis: {
                categories: ventasPorDia.map(item => item.fecha_venta),
            },
            yaxis: [{
                    title: {
                        text: 'Ventas',
                    },
                },
                {
                    opposite: true,
                    title: {
                        text: 'Citas',
                    },
                },
            ],
            tooltip: {
                shared: true,
                intersect: false,
            },
        };

        var chart = new ApexCharts(chart, options);
        chart.render();
    </script>

<script>
    var chartPie = document.querySelector('#chartpie');

    var citasPorTipoHoy = {!! json_encode($citasPorTipoHoy) !!};

    var totalCitasHoy = citasPorTipoHoy.reduce((total, cita) => total + cita.cantidad, 0);

    var porcentajes = citasPorTipoHoy.map(cita => ((cita.cantidad / totalCitasHoy) * 100).toFixed(2));

    var options = {
        series: porcentajes,
        chart: {
            height: 350,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                dataLabels: {
                    name: {
                        fontSize: '22px',
                    },
                    value: {
                        fontSize: '16px',
                    },
                    total: {
                        show: true,
                        label: 'Citas Hoy',
                        formatter: function(w) {
                            return totalCitasHoy;
                        }
                    }
                }
            }
        },
        labels: citasPorTipoHoy.map(cita => cita.tipo), // Corregido aquí
    };

    var chart = new ApexCharts(chartPie, options);
    chart.render();
</script>


</x-app-layout>
