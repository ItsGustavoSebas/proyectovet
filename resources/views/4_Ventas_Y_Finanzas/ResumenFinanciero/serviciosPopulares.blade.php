
<x-app-layout>
    
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reporte Servicios mas populares') }}
            </h2>
        </div>
    </x-slot>
    <div class="mx-auto max-w-screen-lg px-4 sm:px-8 py-8">
        <div class="h-full bg-white shadow-lg rounded-lg">
            <div id="chartpie" class="h-96 lg:h-auto"></div>
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

        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var chartPie = document.querySelector('#chartpie');

            var cantidadServicios = {!! json_encode($cantidadServicios) !!};
            var cantidadConsultas = {!! $cantidadConsultas !!};

            var totalServicios = cantidadServicios.reduce((total, servicio) => total + servicio.cantidad, 0);

            var porcentajes = cantidadServicios.map(servicio => ((servicio.cantidad / (totalServicios + cantidadConsultas)) *
                100).toFixed(2));
            var porcentajeConsultas = ((cantidadConsultas / (totalServicios + cantidadConsultas)) * 100).toFixed(2);

            var options = {
                series: [...porcentajes, porcentajeConsultas],
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
                                label: 'Total Servicios',
                                formatter: function(w) {
                                    return totalServicios + cantidadConsultas;
                                }
                            }
                        }
                    }
                },
                labels: [...cantidadServicios.map(servicio => [servicio.nombre]), 'Consultas'],
            };

            var chart = new ApexCharts(chartPie, options);
            chart.render();
        </script>
</x-app-layout>
