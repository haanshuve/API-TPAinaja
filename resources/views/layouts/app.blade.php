<!DOCTYPE html>
<html lang="id" x-data="{ openProfile: false }">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - TPAinaja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a2c34e8fdc.js" crossorigin="anonymous"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>

<body class="bg-[#F8FAFC] text-gray-800 flex h-screen">

    <!-- ✅ SIDEBAR KUNING -->
    <aside class="w-64 bg-[#FACC15] flex flex-col justify-between py-6 text-gray-800">
        <div>
            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 mb-10">
                <img src="{{ asset('images/logo-tpainaja.png') }}" alt="TPAinaja Logo" class="w-10 h-10">
                <span class="font-bold text-lg text-gray-800">TPAinaja</span>
            </div>

            <!-- Navigasi -->
            <nav class="space-y-2 px-4 font-medium">
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition 
                   {{ request()->routeIs('dashboard') ? 'bg-white text-[#FACC15]' : 'hover:bg-white/40' }}">
                    <i class="fas fa-home w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('exam.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('exam.*') ? 'bg-white text-[#FACC15]' : 'hover:bg-white/40' }}">
                    <i class="fas fa-book w-5 text-center"></i>
                    <span>Ujian</span>
                </a>

                <a href="{{ route('participants.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('participants.*') ? 'bg-white text-[#FACC15]' : 'hover:bg-white/40' }}">
                    <i class="fas fa-network-wired w-5 text-center"></i>
                    <span>Peserta</span>
                </a>

                <a href="{{ route('staff.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('staff.*') 
                        ? 'bg-white text-[#FACC15]' 
                        : 'hover:bg-white/40' }}">
                    <i class="fas fa-user-tie w-5 text-center"></i>
                    <span>Staff</span>
                </a>

                <a href="{{ route('reports.index') }}" 
                   class="flex items-center gap-3 px-4 py-2 rounded-lg transition
                   {{ request()->routeIs('reports.*') ? 'bg-white text-[#FACC15]' : 'hover:bg-white/40' }}">
                    <i class="fas fa-file-alt w-5 text-center"></i>
                    <span>Reports</span>
                </a>
            </nav>
        </div>

        <div class="px-4 space-y-3 border-t border-white/50 pt-4">
            <a href="#" class="flex items-center gap-3 hover:text-white transition">
                <i class="fas fa-cog w-5 text-center"></i>
                <span>Settings</span>
            </a>
            <a href="{{ route('logout') }}" class="flex items-center gap-3 hover:text-white transition">
                <i class="fas fa-sign-out-alt w-5 text-center"></i>
                <span>Sign out</span>
            </a>
        </div>
    </aside>

    <!-- ✅ MAIN CONTENT -->
    <main class="flex-1 flex flex-col overflow-y-auto">

        <!-- HEADER / TOP BAR -->
        <header class="flex items-center justify-between px-8 py-4 bg-white border-b border-gray-200 shadow-sm">
            <h1 class="text-lg font-semibold text-gray-700">@yield('title', 'Dashboard')</h1>

            <div class="flex items-center space-x-4">
                <select class="border border-gray-300 rounded-md text-sm px-2 py-1">
                    <option>Last Week</option>
                    <option>This Month</option>
                </select>

                <!-- 🔘 Tombol Profil -->
                <button @click="openProfile = true" 
                    class="w-10 h-10 bg-[#6366F1] hover:bg-[#4F46E5] text-white font-bold rounded-full flex items-center justify-center shadow-md focus:outline-none">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </button>
            </div>
        </header>

        <!-- ISI HALAMAN -->
        <section class="flex-1 p-8 bg-[#F8FAFC]">
            @yield('content')
        </section>
    </main>

    <!-- ✅ MODAL EDIT PROFIL -->
    <div x-show="openProfile" 
         x-transition.opacity.duration.300ms
         x-transition.scale.origin.center.duration.300ms
         x-cloak
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50" 
         @click.self="openProfile = false">

        <div class="bg-white rounded-xl shadow-lg p-6 w-[450px]">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Edit Profil</h2>

            <!-- 🖼️ Foto Profil -->
            <div class="flex items-center space-x-4 mb-4">
                <img id="profile-preview"
                     src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                     alt="Foto Profil"
                     class="w-16 h-16 rounded-full object-cover border border-gray-300">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Upload Foto Profil</label>
                    <input type="file" name="profile_picture" id="profile_picture"
                        class="mt-1 text-sm border border-gray-300 rounded-md px-2 py-1 focus:ring-2 focus:ring-[#FACC15] focus:outline-none"
                        accept="image/*"
                        onchange="previewProfile(event)">
                </div>
            </div>

            <!-- 🧾 Form -->
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm text-gray-700">Nama</label>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full border rounded-md px-2 py-1">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Alamat</label>
                        <input type="text" name="address" value="{{ Auth::user()->address }}" class="w-full border rounded-md px-2 py-1">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="text-sm text-gray-700">Telepon</label>
                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="w-full border rounded-md px-2 py-1">
                    </div>
                    <div>
                        <label class="text-sm text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full border rounded-md px-2 py-1">
                    </div>
                </div>

                <div class="flex justify-end space-x-3 mt-4">
                    <button type="button" @click="openProfile = false" 
                        class="px-4 py-2 rounded-md border text-red-500 border-gray-300 hover:bg-gray-100">Close</button>
                    <button type="submit" 
                        class="px-4 py-2 rounded-md bg-[#FACC15] hover:bg-[#EAB308] text-gray-900 font-semibold shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 🖼️ Preview Foto -->
    <script>
        function previewProfile(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('profile-preview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <!-- 🧩 Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>
