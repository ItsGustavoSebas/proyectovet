<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reporte de Ventas en el Año') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div style="width: 80%; margin: auto; background-color: white;">
                <canvas id="chartVentasPorMes"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var ventasPorMesData = <?php echo json_encode($ventasPorMes); ?>;

        var labels = ventasPorMesData.map(data => data.month);
        var data = ventasPorMesData.map(data => data.total);

        var chartData = {
            labels: labels,
            datasets: [{
                label: 'Ventas por Mes',
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
            },
            backgroundColor: 'white'
        };

        var ctx = document.getElementById('chartVentasPorMes').getContext('2d');
        var chartVentasPorMes = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: chartOptions
        });
    </script>
</x-app-layout>
