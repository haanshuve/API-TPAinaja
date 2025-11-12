<!DOCTYPE html>
<html lang="id" x-data="{ openProfile: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | TPAinaja</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (Popper + Bundle) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-[#F8FAFC] text-gray-800 flex h-screen">

    <aside class="w-64 bg-[#FFC100] flex flex-col justify-between py-6 text-gray-800">
        <div>
            <!-- 🔸 Logo -->
            <div class="flex items-center justify-center mb-10">
                <img src="{{ asset('images/logo-tpainaja.png') }}" alt="TPAinaja Logo" class="w-32 h-auto">
            </div>

            <!-- 🔸 Navigasi -->
            <nav class="space-y-2 px-4 font-medium">
                <a href="{{ route('modom.dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                   {{ request()->routeIs('dashboard') ? 'bg-white text-[#FFFFFF]' : 'hover:bg-white/40' }}">
                    <i class="fas fa-home w-5 text-center"></i> <span>Dashboard</span>
                </a>

                <a href="{{ route('exam.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('exam.*') ? ' text-[#FFFFFF]' : 'hover:bg-white/40' }}">
                    <i class="fas fa-book w-5 text-center"></i> <span>Ujian</span>
                </a>

                <a href="{{ route('participants.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('participants.*') ? ' text-[#FFFFFF]' : 'hover:bg-white/40' }}">
                    <i class="fas fa-users w-5 text-center"></i> <span>Peserta</span>
                </a>

                <a href="{{ route('staff.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('staff.*') ? ' text-[#FFFFFF]' : 'hover:bg-white/40' }}">
                    <i class="fas fa-user-tie w-5 text-center"></i> <span>Staff</span>
                </a>

                <a href="{{ route('reports.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('reports.*') ? ' text-[#FFFFFF]' : 'hover:bg-white/40' }}">
                    <i class="fas fa-file-alt w-5 text-center"></i> <span>Reports</span>
                </a>
            </nav>
        </div>

        <!-- 🔸 Tombol Sign Out -->
        <div class="px-4 space-y-3 border-t border-gray-200 pt-4">
            <a href="{{ route('logout') }}" 
               class="flex items-center gap-3 text-black hover:text-yellow-600 transition">
                <i class="fas fa-sign-out-alt w-5 text-center"></i> <span>Sign out</span>
            </a>
        </div>
    </aside>

    <!-- ✅ MAIN CONTENT -->
    <main class="flex-1 flex flex-col overflow-y-auto">

        <!-- 🔹 HEADER / TOP BAR -->
        <header class="flex items-center justify-between px-8 py-4 bg-white border-b border-gray-200 shadow-sm">
            <h1 class="text-lg font-semibold text-gray-700">@yield('title', 'Dashboard')</h1>

            <div class="flex items-center space-x-4">
                <select class="border border-gray-300 rounded-md text-sm px-2 py-1">
                    <option>Last Week</option>
                    <option>This Month</option>
                </select>

               <!-- 🔘 Tombol Profil -->
            <button type="button" class="w-10 h-10 bg-[#6366F1] hover:bg-[#4F46E5] text-white font-bold rounded-full flex items-center justify-center shadow-md"
                    data-bs-toggle="modal" data-bs-target="#profileModal">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </button>
            </div>
        </header>

        <!-- 🔹 ISI HALAMAN -->
        <section class="flex-1 p-8 bg-[#F8FAFC]">
            @yield('content')
        </section>
    </main>

    <!-- 🔹 INCLUDE MODAL PROFIL -->
    @include('modal.modalprofile')

</body>
</html>
