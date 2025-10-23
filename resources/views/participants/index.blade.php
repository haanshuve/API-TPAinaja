@extends('layouts.app')

@section('title', 'Peserta')

@section('content')
<div class="min-h-screen bg-[#F8FAFC] px-8 py-6" x-data="{ openAdd: false }">
    <!-- Header Page -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-800">Peserta</h1>
        </div>

        <div class="flex items-center space-x-3">
            <select class="border border-gray-300 rounded-md text-sm px-3 py-1 text-gray-600">
                <option>Last Week</option>
                <option>This Month</option>
            </select>

            <!-- 🔘 Tombol Tambah Peserta -->
            <button @click="openAdd = true"
                class="flex items-center gap-2 bg-[#6366F1] hover:bg-[#4F46E5] text-white font-medium px-4 py-2 rounded-md shadow-sm transition">
                <i class="fas fa-plus-circle"></i>
                Tambah Peserta
            </button>
        </div>
    </div>

    <!-- 📋 Daftar Peserta -->
    <div class="space-y-4">
        @forelse ($participants as $participant)
            <div class="flex justify-between items-center bg-white rounded-xl shadow-sm px-6 py-3 border border-gray-100">
                <!-- Nama & Email -->
                <div class="flex flex-col">
                    <span class="text-lg font-semibold text-gray-800">{{ $participant->name }}</span>
                    <span class="text-sm text-gray-500">{{ $participant->email }}</span>
                </div>

                <!-- Password & Aksi -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center">
                        <span class="text-gray-700 tracking-widest font-medium">********</span>
                        <i class="fas fa-eye-slash text-gray-500 ml-2"></i>
                    </div>

                    <div class="flex items-center space-x-2">
                        <a href="{{ route('participants.edit', $participant->id) }}" 
                           class="p-2 bg-yellow-100 hover:bg-yellow-200 rounded-full text-yellow-600 transition">
                            <i class="fas fa-pen"></i>
                        </a>

                        <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" onsubmit="return confirm('Hapus peserta ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                class="p-2 bg-red-100 hover:bg-red-200 rounded-full text-red-600 transition">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500 italic">Belum ada peserta terdaftar.</p>
        @endforelse
    </div>

    <!-- ✅ Modal Tambah Peserta -->
    <div x-show="openAdd"
         x-cloak
         x-transition.opacity.duration.300ms
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50"
         @click.self="openAdd = false">

        <div class="bg-white rounded-xl shadow-lg p-6 w-[400px]">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Tambah Peserta</h2>

            <form action="{{ route('participants.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Nama</label>
                    <input type="text" name="name" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[#6366F1] outline-none">
                </div>

                <div>
                    <label class="block text-sm text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[#6366F1] outline-none">
                </div>

                <div>
                    <label class="block text-sm text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-[#6366F1] outline-none">
                </div>

                <div class="flex justify-end space-x-3 mt-4">
                    <button type="button" @click="openAdd = false"
                        class="px-4 py-2 rounded-md border text-gray-600 hover:bg-gray-100">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 rounded-md bg-[#6366F1] hover:bg-[#4F46E5] text-white font-semibold shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
