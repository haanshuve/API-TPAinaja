@extends('admin.layouts.sidebar')

@section('title', 'Tambah Report')

@section('content')
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

@endsection
