@extends('admin.layouts.sidebar')

@section('title', 'Buat Ujian')

@section('content')

<div class="p-6">
    <form action="{{ route('admin.exam.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        {{-- Judul Ujian --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Judul Ujian</label>
            <input type="text" name="nama_ujian" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
        </div>

        {{-- Jumlah Soal (questions_count) --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Jumlah Soal</label>
            <input type="number" name="questions_count" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
        </div>

        {{-- Bobot Nilai (weight) --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Bobot Nilai</label>
            <input type="number" name="weight" required step="0.01"
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
        </div>

        {{-- Durasi Ujian (duration) --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Waktu Ujian (menit)</label>
            <input type="number" name="duration" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
        </div>

        {{-- Tipe Ujian --}}
       <div>
            <label class="block font-medium text-gray-700 mb-1">Tipe Ujian</label>
            <select name="exam_type" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
                <option value="tpa">TPA</option>
                <option value="cbt">CBT</option>
            </select>
        </div>

        {{-- Tanggal Ujian --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Tanggal Ujian</label>
            <input type="date" name="exam_date" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
        </div>

        {{-- Logo --}}
        <div>
            <label class="block font-medium text-gray-700 mb-1">Masukkan Logo</label>
            <input type="file" name="logo"
                class="w-full text-sm border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
        </div>

        <div class="flex justify-end gap-3 pt-3">
            <a href="{{ route('admin.exam.index') }}"
                class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-medium rounded-md shadow-sm">
                Batal
            </a>
            <button type="submit"
                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md shadow-sm">
                Simpan
            </button>
        </div>

    </form>
</div>

@endsection
