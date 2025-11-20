@extends('staff.layouts.app')

@section('content')
<body class="bg-[#F8FAFC] text-gray-800 flex h-screen">
    <main class="flex-1 p-8 overflow-y-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Staff Dashboard</h1>
                <p class="text-gray-500 text-sm">Welcome back, {{ Auth::user()->name ?? 'staff' }}</p>
            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition">
                <h2 class="text-gray-400 mb-1 font-medium">Ujian</h2>
                <h3 class="text-3xl font-bold mb-4 text-gray-900">{{ $totalUjian }}</h3>
                <canvas id="chartUjian" height="120"></canvas>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition">
                <h2 class="text-gray-400 mb-1 font-medium">user</h2>
                <h3 class="text-3xl font-bold mb-4 text-gray-900">{{ $totalPeserta }}</h3>
                <canvas id="chartPeserta" height="120"></canvas>
            </div>
        </div>
    </main>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ujianLabels = @json($ujianLabels);
        const ujianData = @json($ujianData);

        const pesertaLabels = @json($pesertaLabels);
        const pesertaData = @json($pesertaData);

        // Chart Ujian
        new Chart(document.getElementById('chartUjian'), {
            type: 'bar',
            data: {
                labels: ujianLabels,
                datasets: [{
                    data: ujianData,
                    backgroundColor: 'rgba(250, 204, 21, 0.7)',
                    borderRadius: 6
                }]
            },
            options: {
                plugins: { legend: { display: false } },
                scales: { y: { display: false }, x: { display: true } }
            }
        });

        // Chart user
        new Chart(document.getElementById('chartPeserta'), {
            type: 'bar',
            data: {
                labels: pesertaLabels,
                datasets: [{
                    data: pesertaData,
                    backgroundColor: 'rgba(234, 179, 8, 0.7)',
                    borderRadius: 3
                }]
            },
            options: {
                plugins: { legend: { display: true } },
                scales: { y: { display: false }, x: { display: true } }
            }
        });
    </script>
</body>
@endsection
