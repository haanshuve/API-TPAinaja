<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - TPAinaja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a2c34e8fdc.js" crossorigin="anonymous"></script>
</head>
<body class="bg-[#F8FAFC] text-gray-800 flex h-screen">

    <!-- SIDEBAR PUTIH -->
    <aside class="w-64 bg-white flex flex-col justify-between py-6 border-r border-gray-200 shadow-sm">
        <div>
            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 mb-10">
                <img src="{{ asset('images/logo-tpainaja.png') }}" alt="TPAinaja Logo" class="w-30 h-30">
            </div>

            <!-- Navigasi -->
            <nav class="space-y-3 px-4 font-medium">
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('dashboard') ? 'bg-yellow-100 text-yellow-600 font-semibold' : 'text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600' }}">
                    <i class="fas fa-home w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('exam.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('exam.*') ? 'bg-yellow-100 text-yellow-600 font-semibold' : 'text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600' }}">
                    <i class="fas fa-book w-5 text-center"></i>
                    <span>Ujian</span>
                </a>

                <a href="{{ route('participants.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('participants.*') ? 'bg-yellow-100 text-yellow-600 font-semibold' : 'text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600' }}">
                    <i class="fas fa-users w-5 text-center"></i>
                    <span>Peserta</span>
                </a>

               <!-- Staff -->
<a href="{{ route('staff.index') }}" 
   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
   {{ request()->routeIs('staff.*') 
        ? 'bg-yellow-100 text-yellow-600 font-semibold' 
        : 'text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600' }}">
    <i class="fas fa-user-tie w-5 text-center"></i>
    <span>Staff</span>
</a>


               <a href="{{ route('reports.index') }}" 
   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
   {{ request()->routeIs('reports.*') ? 'bg-yellow-100 text-yellow-600 font-semibold' : 'text-yellow-500 hover:bg-yellow-50 hover:text-yellow-600' }}">
    <i class="fas fa-file-alt w-5 text-center"></i>
    <span>Reports</span>
</a>

            </nav>
        </div>

        <div class="px-4 space-y-3 border-t border-gray-200 pt-4">
            <a href="#" class="flex items-center gap-3 text-yellow-500 hover:text-yellow-600 transition">
                <i class="fas fa-cog w-5 text-center"></i>
                <span>Settings</span>
            </a>
            <a href="{{ route('logout') }}" class="flex items-center gap-3 text-yellow-500 hover:text-yellow-600 transition">
                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                <span>Sign out</span>
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8 overflow-y-auto">
        @yield('content')
    </main>

</body>
</html>
