<!-- resources/views/profile/edit.blade.php -->

@extends('admin.layouts.sidebar')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8 border border-gray-100 mt-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
        <i class="fas fa-user-edit text-[#FACC15]"></i> Edit Profil
    </h2>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="mb-5 flex items-center gap-2 p-3 rounded-lg bg-green-50 border border-green-300 text-green-700">
            <i class="fas fa-check-circle text-green-500 text-lg"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <form id="profileForm" action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Profile Picture -->
        <div class="flex items-center gap-5">
            <img id="profile-preview"
                 src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                 alt="Foto Profil"
                 class="w-20 h-20 rounded-full object-cover border-2 border-[#FACC15] shadow-sm">
            
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                <input type="file" name="profile_picture" id="profile_picture" 
                       class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-[#FACC15] focus:outline-none"
                       accept="image/*"
                       onchange="previewProfile(event)">
                @error('profile_picture')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Name & Address Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" 
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[#FACC15] focus:outline-none" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <input type="text" name="address" value="{{ old('address', Auth::user()->address) }}" 
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[#FACC15] focus:outline-none">
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Phone & Email Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', Auth::user()->phone) }}" 
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[#FACC15] focus:outline-none">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                       class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[#FACC15] focus:outline-none" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end items-center gap-3 pt-5 border-t border-gray-100">
            <a href="{{ url()->previous() }}" 
               class="px-5 py-2 rounded-md border border-gray-300 text-gray-600 hover:bg-gray-100 transition-all">Batal</a>
            
            <button id="saveBtn" type="submit" 
                    class="flex items-center justify-center gap-2 px-5 py-2 rounded-md bg-[#FACC15] hover:bg-[#EAB308] text-gray-900 font-semibold shadow-sm transition-all">
                <svg id="loadingSpinner" class="animate-spin h-5 w-5 text-gray-900 hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
                <span id="saveText">Simpan</span>
            </button>
        </div>
    </form>
</div>

<!-- Profile Preview Script -->
<script>
function previewProfile(event) {
    const reader = new FileReader();
    reader.onload = function() {
        document.getElementById('profile-preview').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

document.getElementById('profileForm').addEventListener('submit', function() {
    document.getElementById('saveText').textContent = 'Menyimpan...';
    document.getElementById('loadingSpinner').classList.remove('hidden');
});
</script>
@endsection
