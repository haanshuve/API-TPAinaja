<!-- Sidebar Layout - TPAinaja Admin Panel -->
<div class="flex flex-col w-64 h-screen bg-blue-600 text-white shadow-xl fixed">
    <!-- Header / Logo -->
    <div class="flex items-center justify-center h-16 border-b border-blue-500">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-10 h-10 mr-2">
        <h1 class="text-xl font-semibold tracking-wide">TPAinaja</h1>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
        <!-- Dashboard -->
        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-3 py-2 rounded-md font-medium transition 
           {{ request()->routeIs('dashboard') ? 'bg-blue-700 text-white' : 'hover:bg-blue-700 hover:text-gray-100' }}">
            <i class="fas fa-home w-5 text-center"></i>
            <span class="ml-3">Dashboard</span>
        </a>





        <!-- Register -->
        <a href="#" 
           class="flex items-center px-3 py-2 rounded-md font-medium transition hover:bg-blue-700 hover:text-gray-100">
            <i class="fas fa-user-plus w-5 text-center"></i>
            <span class="ml-3">Register</span>
        </a>

        <!-- Staff -->
        <a href="#" 
           class="flex items-center px-3 py-2 rounded-md font-medium transition hover:bg-blue-700 hover:text-gray-100">
            <i class="fas fa-users w-5 text-center"></i>
            <span class="ml-3">Staff</span>
        </a>

        <!-- Reports -->
        <a href="#" 
           class="flex items-center px-3 py-2 rounded-md font-medium transition hover:bg-blue-700 hover:text-gray-100">
            <i class="fas fa-file-alt w-5 text-center"></i>
            <span class="ml-3">Reports</span>
        </a>
    </nav>

    <!-- Footer -->
    <div class="p-4 border-t border-blue-500">
        <a href="{{ route('logout') }}" 
           class="flex items-center px-3 py-2 rounded-md font-medium transition hover:bg-blue-700 hover:text-gray-100">
            <i class="fas fa-sign-out-alt w-5 text-center"></i>
            <span class="ml-3">Sign Out</span>
        </a>
    </div>
</div>
