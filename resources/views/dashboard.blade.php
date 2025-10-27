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

    <!-- SIDEBAR PUTIH (seragam di semua halaman) -->
    <aside class="w-64 bg-white flex flex-col justify-between py-6 border-r border-gray-200 shadow-sm">
        <div>
            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 mb-10">
                <img src="{{ asset('images/logo-tpainaja.png') }}" alt="TPAinaja Logo" class="w-30 h-30">
            </div>

            <!-- Navigasi -->
            <nav class="space-y-3 px-4 font-medium">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                   {{ request()->routeIs('dashboard') 
                       ? 'bg-yellow-100 text-yellow-600 font-semibold' 
                       : 'text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600' }}">
                    <i class="fas fa-home w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Ujian -->
                <a href="{{ route('exam.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                   {{ request()->routeIs('exam.*') 
                       ? 'bg-yellow-100 text-yellow-600 font-semibold' 
                       : 'text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600' }}">
                    <i class="fas fa-book w-5 text-center"></i>
                    <span>Ujian</span>
                </a>

                <!-- Peserta -->
                <a href="{{ route('participants.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                   {{ request()->routeIs('participants.*') 
                       ? 'bg-yellow-100 text-yellow-600 font-semibold' 
                       : 'text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600' }}">
                    <i class="fas fa-users w-5 text-center"></i>
                    <span>Peserta</span>
                </a>

                <!-- Staff -->
                <a href="#" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                   {{ request()->routeIs('staff.*') 
                       ? 'bg-yellow-100 text-yellow-600 font-semibold' 
                       : 'text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600' }}">
                    <i class="fas fa-user-tie w-5 text-center"></i>
                    <span>Staff</span>
                </a>

                <!-- Reports -->
                <a href="#" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                   {{ request()->routeIs('reports.*') 
                       ? 'bg-yellow-100 text-yellow-600 font-semibold' 
                       : 'text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600' }}">
                    <i class="fas fa-file-alt w-5 text-center"></i>
                    <span>Reports</span>
                </a>
            </nav>
        </div>

        <!-- Footer Sidebar -->
        <div class="px-4 space-y-3 border-t border-gray-200 pt-4">
            {{-- <a href="#" class="flex items-center gap-3 text-yellow-500 hover:text-yellow-600 transition">
                <i class="fas fa-cog w-5 text-center"></i>
                <span>Settings</span>
            </a> --}}
            <a href="{{ route('logout') }}" class="flex items-center gap-3 text-yellow-500 hover:text-yellow-600 transition">
                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                <span>Sign out</span>
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
                <select class="border rounded-md px-3 py-1 text-sm text-gray-600">
                    <option>Last Week</option>
                    <option>Last Month</option>
                </select>
                <div class="w-8 h-8 bg-yellow-500 text-white flex items-center justify-center rounded-full font-semibold">
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

    <!-- JS -->
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
            options: { plugins: { legend: { display: false } }, scales: { y: { display: false }, x: { display: false } } }
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
            options: { plugins: { legend: { display: false } }, scales: { y: { display: false }, x: { display: false } } }
        });
    </script>
</body>
</html>
