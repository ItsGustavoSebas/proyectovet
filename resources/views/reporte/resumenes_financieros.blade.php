<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reportes') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <div style="width: 80%; margin: auto; background-color: white;">
                        <canvas id="chartVentasPorDia"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ventasPorDiaData = <?php echo json_encode($ventasPorDia); ?>;

        var labels = ventasPorDiaData.map(data => data.fecha);
        var data = ventasPorDiaData.map(data => data.total);

        var chartData = {
            labels: labels,
            datasets: [{
                label: 'Ventas por Día',
                data: data,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        var chartOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var ctx = document.getElementById('chartVentasPorDia').getContext('2d');
        var chartVentasPorDia = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: chartOptions
        });
    </script>
</x-app-layout>
