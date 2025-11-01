@extends('layouts.app')

@section('content')
<body class="bg-[#F8FAFC] text-gray-800 flex h-screen">

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8 overflow-y-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
                <p class="text-gray-500 text-sm">
                    Welcome back, {{ Auth::user()->name ?? 'Admin' }}
                </p>
            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition">
                <h2 class="text-gray-400 mb-1 font-medium">Ujian</h2>
                <h3 class="text-3xl font-bold mb-4 text-gray-900">203</h3>
                <canvas id="chartUjian" height="120"></canvas>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition">
                <h2 class="text-gray-400 mb-1 font-medium">Peserta</h2>
                <h3 class="text-3xl font-bold mb-4 text-gray-900">351</h3>
                <canvas id="chartPeserta" height="120"></canvas>
            </div>
        </div>
    </main>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/a2c34e8fdc.js" crossorigin="anonymous"></script>

    <script>
        // Chart Ujian
        const ctxUjian = document.getElementById('chartUjian');
        new Chart(ctxUjian, {
            type: 'bar',
            data: {
                labels: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                datasets: [{
                    data: [2, 3, 4, 5, 6, 7, 8],
                    backgroundColor: 'rgba(250, 204, 21, 0.7)',
                    borderRadius: 6
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: { y: { display: false }, x: { display: false } }
            }
        });

        // Chart Peserta
        const ctxPeserta = document.getElementById('chartPeserta');
        new Chart(ctxPeserta, {
            type: 'bar',
            data: {
                labels: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                datasets: [{
                    data: [3, 2, 6, 5, 7, 8, 4],
                    backgroundColor: 'rgba(234, 179, 8, 0.7)',
                    borderRadius: 6
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: { y: { display: false }, x: { display: false } }
            }
        });
    </script>
</body>
@endsection
