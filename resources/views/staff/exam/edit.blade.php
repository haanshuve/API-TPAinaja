@extends('staff.layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Ujian</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Edit --}}
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-3xl">
        <form action="{{ route('staff.exam.update', $exam->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Nama Ujian --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Nama Ujian</label>
                <input type="text" name="nama_ujian" value="{{ old('nama_ujian', $exam->nama_ujian) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-yellow-300"
                       placeholder="Masukkan nama ujian" required>
            </div>

            {{-- Jumlah Soal --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Jumlah Soal</label>
                <input type="number" name="jumlah_soal" value="{{ old('jumlah_soal', $exam->jumlah_soal) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-yellow-300"
                       placeholder="Contoh: 50" required>
            </div>

            {{-- Durasi Ujian --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Durasi (menit)</label>
                <input type="number" name="waktu_ujian" value="{{ old('waktu_ujian', $exam->waktu_ujian) }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-yellow-300"
                       placeholder="Contoh: 60" required>
            </div>

            {{-- Logo Ujian --}}
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-1">Logo Ujian</label>
                <input type="file" name="logo"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-yellow-300">

                {{-- Preview Logo Lama --}}
                @if ($exam->logo)
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 mb-1">Logo saat ini:</p>
                        <img src="{{ asset('storage/' . $exam->logo) }}" alt="Logo" class="w-24 h-24 object-cover rounded shadow">
                    </div>
                @endif
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end space-x-3">
                <a href="{{ route('staff.exam.index') }}"
                   class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">Batal</a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
