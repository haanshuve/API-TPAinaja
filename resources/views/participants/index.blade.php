@extends('layouts.app')

@section('title', 'Peserta')

@section('content')
<div class="min-h-screen bg-[#F8FAFC] px-8 py-6" x-data="{ openAdd: false }">
    <!-- Header Page -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Peserta</h1>

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
            <div
                class="flex justify-between items-center bg-white rounded-xl shadow-md px-6 py-4 border border-gray-100 hover:shadow-lg transition duration-200">
                
                <!-- Nama & Email -->
                <div class="flex flex-col">
                    <span class="text-lg font-semibold text-gray-800">{{ $participant->name }}</span>
                    <span class="text-sm text-gray-500">{{ $participant->email }}</span>
                </div>

                <!-- Password & Aksi -->
                <div class="flex items-center gap-6">
                    <div class="flex items-center text-gray-700">
                        <span class="tracking-widest font-semibold">********</span>
                        <i class="fas fa-eye-slash text-gray-400 ml-2"></i>
                    </div>

                    <!-- Tombol Edit dan Hapus -->
<div class="flex items-center gap-3 z-10 relative">
    <!-- Edit -->
    <a href="{{ route('participants.edit', $participant->id) }}"
        class="w-9 h-9 flex items-center justify-center rounded-full bg-[#FFF8E1] shadow-md hover:shadow-lg hover:scale-105 transition duration-200"
        title="Edit Peserta">
        <i class="fas fa-pen text-[#FBBF24] text-[14px]"></i>
    </a>

    <!-- Hapus -->
    <form action="{{ route('participants.destroy', $participant->id) }}" method="POST"
        onsubmit="return confirm('Yakin ingin menghapus peserta ini?')" class="inline-block z-10 relative">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="w-9 h-9 flex items-center justify-center rounded-full bg-[#FFE4E6] shadow-md hover:shadow-lg hover:scale-105 transition duration-200"
            title="Hapus Peserta">
            <i class="fas fa-times text-[#EF4444] text-[14px]"></i>
        </button>
    </form>
</div>

                </div>
            </div>
        @empty
            <p class="text-gray-500 italic">Belum ada peserta terdaftar.</p>
        @endforelse
    </div>

</div>
@endsection
