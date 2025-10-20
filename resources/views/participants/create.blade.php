@extends('layouts.app')

@section('title', 'Tambah Peserta')

@section('content')
<!-- Header atas (Sort & Avatar) -->
<div class="flex justify-between items-center mb-6">
    <!-- Sort -->
    <div class="flex items-center gap-2">
        <label for="sort" class="text-gray-600 text-sm">Sort:</label>
        <select id="sort"
            class="border border-gray-300 rounded-md px-3 py-1 text-sm text-gray-500 bg-gray-50 cursor-not-allowed"
            disabled>
            <option>Last Week</option>
        </select>
    </div>

    <!-- Notifikasi & Avatar -->
    <div class="flex items-center gap-4">
        <button class="text-gray-400 hover:text-gray-600">
            <i class="fas fa-bell text-lg"></i>
        </button>
        <div class="w-8 h-8 bg-[#635BFF] text-white flex items-center justify-center rounded-full font-semibold">
            {{ strtoupper(substr(Auth::user()->name ?? 'J', 0, 1)) }}
        </div>
    </div>
</div>

<!-- CARD FORM TAMBAH PESERTA -->
<div class="bg-white rounded-2xl shadow-md p-0 max-w-3xl mx-auto">
    <!-- Header kuning -->
    <div class="bg-yellow-400 text-gray-800 font-semibold px-6 py-2 rounded-t-2xl">
        Tambah Peserta
    </div>

    <!-- Form -->
    <form action="#" method="POST" class="p-6">
        @csrf

        <!-- Nama -->
        <div class="mb-5">
            <label for="nama" class="block text-gray-700 font-medium mb-2">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama peserta"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Email -->
        <div class="mb-5">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email peserta"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Tombol aksi -->
        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('participants.index') }}"
                class="bg-red-500 text-white px-5 py-2 rounded-md font-medium hover:bg-red-600 transition">
                Batal
            </a>
            <button type="submit"
                class="bg-blue-500 text-white px-5 py-2 rounded-md font-medium hover:bg-blue-600 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
