<x-app-layout>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    </head>

    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                                    <h2 class="mr-5 text-lg font-medium truncate">Reportes Financieros</h2>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-5">
                                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                        href="#">
                                        <div class="p-5">
                                            <div class="flex justify-between">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                <div
                                                    class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                    <span class="flex items-center">30%</span>
                                                </div>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8">4.510</div>

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
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                                </svg>
                                                <div
                                                    class="bg-red-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                    <span class="flex items-center">30%</span>
                                                </div>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8">4.510</div>

                                                    <div class="mt-1 text-base text-gray-600">Citas Activas</div>
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
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                                </svg>
                                                <div
                                                    class="bg-yellow-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                    <span class="flex items-center">30%</span>
                                                </div>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8">4.510</div>

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
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                                </svg>
                                                <div
                                                    class="bg-blue-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                    <span class="flex items-center">30%</span>
                                                </div>
                                            </div>
                                            <div class="ml-2 w-full flex-1">
                                                <div>
                                                    <div class="mt-3 text-3xl font-bold leading-8">4.510</div>

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
                            </div>
                        </div>
                    </div>
            </div>
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
                var chart = document.querySelector('#chartline')
                var options = {
                    series: [{
                        name: 'TEAM A',
                        type: 'area',
                        data: [44, 55, 31, 47, 31, 43, 26, 41, 31, 47, 33]
                    }, {
                        name: 'TEAM B',
                        type: 'line',
                        data: [55, 69, 45, 61, 43, 54, 37, 52, 44, 61, 43]
                    }],
                    chart: {
                        height: 350,
                        type: 'line',
                        zoom: {
                            enabled: false
                        }
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    fill: {
                        type: 'solid',
                        opacity: [0.35, 1],
                    },
                    labels: ['Dec 01', 'Dec 02', 'Dec 03', 'Dec 04', 'Dec 05', 'Dec 06', 'Dec 07', 'Dec 08', 'Dec 09 ',
                        'Dec 10', 'Dec 11'
                    ],
                    markers: {
                        size: 0
                    },
                    yaxis: [{
                            title: {
                                text: 'Series A',
                            },
                        },
                        {
                            opposite: true,
                            title: {
                                text: 'Series B',
                            },
                        },
                    ],
                    tooltip: {
                        shared: true,
                        intersect: false,
                        y: {
                            formatter: function(y) {
                                if (typeof y !== "undefined") {
                                    return y.toFixed(0) + " points";
                                }
                                return y;
                            }
                        }
                    }
                };
                var chart = new ApexCharts(chart, options);
                chart.render();
            </script>
            <script>
                var chart = document.querySelector('#chartpie')
                var options = {
                    series: [44, 55, 67, 83],
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
                                    label: 'Total',
                                    formatter: function(w) {
                                        // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                                        return 249
                                    }
                                }
                            }
                        }
                    },
                    labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
                };
                var chart = new ApexCharts(chart, options);
                chart.render();
            </script>
        </body>
    </body>
    <div class="bg-white">
        <div class="container mx-auto px-4 sm:px-8 ">
            <div class="py-8">
                <div class="grid grid-cols-2 gap-4">
                    <!-- Botón para Ventas en la Semana -->
                    <a href="{{ route('reporte.ventas_semanal') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ventas en la Semana
                    </a>

                    <!-- Botón para Ventas en el Mes -->
                    <a href="{{ route('reporte.ventas_mes') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ventas en el Mes
                    </a>

                    <!-- Botón para Ventas en el Año -->
                    <a href="{{ route('reporte.ventas_año') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ventas en el Año
                    </a>

                    <!-- Botón para Clientes en ventas -->
                    <a href="{{ route('reporte.clientesFrecuentesCompras') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Clientes Frecuentes en Compras
                    </a>

                    <!-- Botón para Clientes Frecuentes -->
                    <a href="{{ route('reporte.clientesFrecuentesAtencionVeterinaria') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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

    <style>
        .graphBox {
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            grid-gap: 30px;
            min-height: 200рх;
        }

        .graphBox .box {
            position: relative;
            background: #fff;
            padding: 20px;
            width: 100%;
            box-shadow: 0 7px 25px rgba(@, e, e, e.e8);
            border-radius: 20px;
        }
    </style>
</x-app-layout>
