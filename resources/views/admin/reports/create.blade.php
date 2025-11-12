@extends('admin.layouts.sidebar')

@section('title', 'Tambah Report')

@section('content')
<!-- Header Atas -->
<div class="flex justify-between items-center mb-6">
    <!-- Sort -->
    <div class="flex items-center gap-2">
        <label for="sort" class="text-gray-600 text-sm">Sort:</label>
        <select id="sort" class="border border-gray-300 rounded-md px-3 py-1 text-sm text-gray-500 bg-gray-50 cursor-not-allowed" disabled>
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

<!-- Kartu Form -->
<div class="bg-white rounded-2xl shadow-md p-0 max-w-3xl mx-auto">
    <!-- Header Kuning -->
    <div class="bg-yellow-400 text-gray-800 font-semibold px-6 py-2 rounded-t-2xl">
        Tambah Report
    </div>

    <!-- Form -->
    <form action="#" method="POST" class="p-6">
        @csrf

        <!-- Dropdown Test -->
        <div class="mb-5">
            <label for="test" class="block text-gray-700 font-medium mb-2">Test</label>
            <select id="test" name="test" class="w-full border border-gray-300 rounded-md px-3 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <option selected disabled>Soal Test</option>
                <option>Biology</option>
                <option>Math</option>
                <option>English</option>
                <option>CTH</option>
            </select>
        </div>

        <!-- Total Peserta -->
        <div class="mb-5">
            <label for="total_peserta" class="block text-gray-700 font-medium mb-2">Total Peserta</label>
            <input type="number" id="total_peserta" name="total_peserta" placeholder="Masukkan total peserta"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Lulus -->
        <div class="mb-5">
            <label for="lulus" class="block text-gray-700 font-medium mb-2">Lulus</label>
            <input type="number" id="lulus" name="lulus" placeholder="Masukkan jumlah lulus"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Tidak Lulus -->
        <div class="mb-5">
            <label for="tidak_lulus" class="block text-gray-700 font-medium mb-2">Tidak Lulus</label>
            <input type="number" id="tidak_lulus" name="tidak_lulus" placeholder="Masukkan jumlah tidak lulus"
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
        </div>

        <!-- Tombol -->
        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('admin.reports.index') }}"
               class="bg-red-500 text-white px-6 py-2 rounded-md font-medium hover:bg-red-600 transition">
                Batal
            </a>
            <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-md font-medium hover:bg-blue-600 transition">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
