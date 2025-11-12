@extends('admin.layouts.sidebar')

@section('content')
<body class="bg-[#F8FAFC] text-gray-800 flex h-screen">
    <main class="flex-1 p-8 overflow-y-auto">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
                <p class="text-gray-500 text-sm">Welcome back, {{ Auth::user()->name ?? 'Admin' }}</p>
            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
            <!-- Card for Total Ujian -->
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition">
                <h2 class="text-gray-400 mb-1 font-medium">Ujian</h2>
                <h3 class="text-3xl font-bold mb-4 text-gray-900">{{ $totalUjian }}</h3>
                <canvas id="chartUjian" height="120"></canvas>
            </div>

            <!-- Card for Total Peserta -->
            <div class="bg-white rounded-2xl p-6 shadow-md hover:shadow-lg transition">
                <h2 class="text-gray-400 mb-1 font-medium">User</h2>
                <h3 class="text-3xl font-bold mb-4 text-gray-900">{{ $totalPeserta }}</h3>
                <canvas id="chartPeserta" height="120"></canvas>
            </div>
        </div>
    </main>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Data passed from the controller
        const ujianLabels = @json($ujianLabels);  // Array of labels for Ujian chart
        const ujianData = @json($ujianData);      // Array of data for Ujian chart

        const pesertaLabels = @json($pesertaLabels); // Array of labels for Peserta chart
        const pesertaData = @json($pesertaData);     // Array of data for Peserta chart

        // Chart for Ujian
        new Chart(document.getElementById('chartUjian'), {
            type: 'bar',
            data: {
                labels: ujianLabels,  // Labels for the X-axis
                datasets: [{
                    data: ujianData,  // Data for the bars
                    backgroundColor: 'rgba(250, 204, 21, 0.7)',  // Bar color
                    borderRadius: 6  // Rounded corners for bars
                }]
            },
            options: {
                plugins: { 
                    legend: { display: false }  // Hide legend
                },
                scales: { 
                    y: { display: false },  // Hide Y-axis
                    x: { display: true }  // Show X-axis
                }
            }
        });

        // Chart for Peserta (User)
        new Chart(document.getElementById('chartPeserta'), {
            type: 'bar',
            data: {
                labels: pesertaLabels,  // Labels for the X-axis
                datasets: [{
                    data: pesertaData,  // Data for the bars
                    backgroundColor: 'rgba(234, 179, 8, 0.7)',  // Bar color
                    borderRadius: 3  // Rounded corners for bars
                }]
            },
            options: {
                plugins: { 
                    legend: { display: false }  // Hide legend
                },
                scales: { 
                    y: { display: true },  // Show Y-axis
                    x: { display: false }  // Hide X-axis
                }
            }
        });
    </script>
</body>
@endsection
