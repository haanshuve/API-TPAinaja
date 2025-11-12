@extends('admin.layouts.sidebar')

@section('title', 'Tambah Peserta')

@section('content')

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
            <a href="{{ route('admin.participants.index') }}"
                class="bg-red-500 text-white px-5 py-2 rounded-md font-medium hover:bg-red-600 transition">
                Batal
            </a>
            <button type="submit"
                class="bg-blue-500 text-white px-5 py-2 rounded-md font-medium hover:bg-blue-600 transition">
                Simpan
            </button>
        </div>
    </form>

@endsection
