<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - TPAinaja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-[#F8FAFC] text-gray-800 flex h-screen">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#007BFF] flex flex-col justify-between py-6">
        <div>
            <div class="flex items-center gap-3 px-6 mb-10">
                <img src="{{ asset('images/logo-tpainaja.png') }}" alt="TPAinaja Logo" class="w-10 h-10">
                <h1 class="text-white text-2xl font-bold">TPAinaja</h1>
            </div>
            <nav class="space-y-3 px-4">
                <a href="#" class="flex items-center gap-3 text-white font-medium bg-white/10 px-4 py-2 rounded-lg">
                    Dashboard
                </a>
                        <!-- Ujian -->
<a href="{{ route('exam.index') }}" 
   class="flex items-center p-2 rounded-md hover:bg-blue-700 transition {{ request()->routeIs('exam.*') ? 'bg-blue-700' : '' }}">
    <i class="fas fa-book w-5"></i>
    <span class="ml-3">Ujian</span>
</a>
                <a href="#" class="flex items-center gap-3 text-white/90 hover:bg-white/10 px-4 py-2 rounded-lg transition">
                    Staff
                </a>
                <a href="#" class="flex items-center gap-3 text-white/90 hover:bg-white/10 px-4 py-2 rounded-lg transition">
                    Reports
                </a>
            </nav>
        </div>

        <div class="px-4 space-y-3">
            <a href="#" class="flex items-center gap-3 text-white/90 hover:bg-white/10 px-4 py-2 rounded-lg transition">
                Settings
            </a>
            <a href="/logout" class="flex items-center gap-3 text-white/90 hover:bg-white/10 px-4 py-2 rounded-lg transition">
                Sign out
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8 overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Admin Dashboard</h1>
                <p class="text-gray-500">Welcome back, {{ Auth::user()->name ?? 'Admin' }}</p>
            </div>
            <div class="flex items-center gap-3">
                <select class="border rounded-md px-3 py-1 text-sm">
                    <option>Last Week</option>
                    <option>Last Month</option>
                </select>
                <div class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center rounded-full font-semibold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-2xl p-6 shadow-md">
                <h2 class="text-gray-400 mb-1">Ujian</h2>
                <h3 class="text-2xl font-bold mb-3">203</h3>
                <canvas id="chartUjian" height="120"></canvas>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md">
                <h2 class="text-gray-400 mb-1">Peserta</h2>
                <h3 class="text-2xl font-bold mb-3">351</h3>
                <canvas id="chartPeserta" height="120"></canvas>
            </div>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/a2c34e8fdc.js" crossorigin="anonymous"></script>
    <script>
        const ctxUjian = document.getElementById('chartUjian');
        new Chart(ctxUjian, {
            type: 'bar',
            data: {
                labels: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                datasets: [{
                    data: [2, 3, 4, 5, 6, 7, 8],
                    backgroundColor: 'rgba(59, 130, 246, 0.7)',
                    borderRadius: 6
                }]
            },
            options: { plugins: { legend: { display: false } }, scales: { y: { display: false }, x: { display: false } } }
        });

        const ctxPeserta = document.getElementById('chartPeserta');
        new Chart(ctxPeserta, {
            type: 'bar',
            data: {
                labels: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
                datasets: [{
                    data: [3, 2, 6, 5, 7, 8, 4],
                    backgroundColor: 'rgba(34, 197, 94, 0.7)',
                    borderRadius: 6
                }]
            },
            options: { plugins: { legend: { display: false } }, scales: { y: { display: false }, x: { display: false } } }
        });
    </script>
</body>
</html>
