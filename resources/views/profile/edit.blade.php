@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow p-8">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Profil</h2>

    <!-- ✅ Alert Sukses -->
    @if(session('success'))
        <div class="mb-4 p-3 rounded-lg bg-green-100 border border-green-300 text-green-700 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 000-1.414z" clip-rule="evenodd" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- 🖼️ Foto Profil -->
        <div class="flex items-center space-x-4">
            <img id="profile-preview"
                 src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                 alt="Foto Profil"
                 class="w-20 h-20 rounded-full object-cover border border-gray-300 shadow-sm">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload Foto Profil</label>
                <input type="file" name="profile_picture" id="profile_picture" 
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none"
                       accept="image/*"
                       onchange="previewProfile(event)">
                @error('profile_picture')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 🧾 Form Nama & Alamat -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" 
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}" 
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- ☎️ Form Telepon & Email -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" 
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 🔘 Tombol Aksi -->
        <div class="flex justify-end space-x-3 pt-4">
            <a href="{{ url()->previous() }}" 
               class="px-5 py-2 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100 transition">Close</a>
            <button id="saveBtn" type="submit" 
                    class="flex items-center justify-center gap-2 px-5 py-2 rounded-md bg-yellow-400 hover:bg-yellow-500 text-gray-900 font-semibold shadow-sm transition">
                <svg id="loadingSpinner" class="animate-spin h-5 w-5 text-gray-900 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
                <span id="saveText">Simpan</span>
            </button>
        </div>
    </form>
</div>

<!-- 🪄 Script Preview & Spinner -->
<script>
function previewProfile(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('profile-preview');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

// Spinner loading saat submit
document.getElementById('profileForm').addEventListener('submit', function() {
    document.getElementById('saveText').textContent = 'Menyimpan...';
    document.getElementById('loadingSpinner').classList.remove('hidden');
});
</script>
@endsection
