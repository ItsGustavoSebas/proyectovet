<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Productos más vendidos') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <div style="width: 80%; margin: auto; background-color: white;">
                        <canvas id="chartProductosMasVendidos"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var productosMasVendidosData = <?php echo json_encode($productosMasVendidos); ?>;

        var labels = productosMasVendidosData.map(data => data.nombre);
        var data = productosMasVendidosData.map(data => data.total_vendido);

        var chartData = {
            labels: labels,
            datasets: [{
                label: 'Productos más vendidos',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        var chartOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        var ctx = document.getElementById('chartProductosMasVendidos').getContext('2d');
        var chartProductosMasVendidos = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: chartOptions
        });
    </script>
</x-app-layout>
