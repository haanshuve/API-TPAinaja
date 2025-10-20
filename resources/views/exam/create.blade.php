@extends('layouts.app')

@section('title', 'Tambah Ujian')

@section('content')
<!-- Header Atas -->
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
            {{ strtoupper(substr(Auth::user()->name ?? 'Y', 0, 1)) }}
        </div>
    </div>
</div>

<!-- CARD FORM TAMBAH UJIAN -->
<div class="bg-white rounded-2xl shadow-md p-0 max-w-3xl mx-auto">
    <!-- Header Kuning -->
    <div class="bg-yellow-400 text-gray-800 font-semibold px-6 py-2 rounded-t-2xl">
        Tambah Ujian
    </div>

    <!-- Form -->
    <form action="{{ route('exam.store') }}" method="POST" class="p-6">
        @csrf

        <!-- Nama Test -->
        <div class="mb-5">
            <label for="nama_test" class="block text-gray-700 font-medium mb-2">Nama Test</label>
            <input type="text" id="nama_test" name="nama_test" placeholder="Masukkan nama ujian"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                required>
        </div>

        <!-- Jumlah Soal -->
        <div class="mb-5">
            <label for="jumlah_soal" class="block text-gray-700 font-medium mb-2">Jumlah Soal</label>
            <input type="number" id="jumlah_soal" name="jumlah_soal" placeholder="Masukkan jumlah soal"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                required>
        </div>

        <!-- Bobot Nilai -->
        <div class="mb-5">
            <label for="bobot" class="block text-gray-700 font-medium mb-2">Bobot Nilai</label>
            <input type="number" id="bobot" name="bobot" placeholder="Masukkan bobot nilai"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                required>
        </div>

        <!-- Waktu Ujian -->
        <div class="mb-5">
            <label for="waktu" class="block text-gray-700 font-medium mb-2">Waktu Ujian (menit)</label>
            <input type="number" id="waktu" name="waktu" placeholder="Masukkan durasi waktu"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400"
                required>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('exam.index') }}"
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
