@extends('staff.layouts.app')

@section('title', 'Buat Ujian')

@section('content')
<div class="min-h-screen bg-[#F8FAFC] px-8 py-6 flex justify-center">
    <div class="w-full max-w-3xl bg-white rounded-xl shadow-lg border border-gray-200">
        <!-- Header -->
        <div class="bg-yellow-400 text-gray-900 text-lg font-semibold px-6 py-3 rounded-t-xl">
            Buat Ujian
        </div>

        <div class="p-6">
            <form action="{{ route('staff.exam.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf

                <div>
                    <label class="block font-medium text-gray-700 mb-1">Judul Ujian</label>
                    <input type="text" name="nama_ujian" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-1">Jumlah Soal</label>
                    <input type="number" name="jumlah_soal" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-1">Bobot Nilai</label>
                    <input type="number" name="bobot_nilai" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-1">Waktu Ujian (menit)</label>
                    <input type="number" name="waktu_ujian" required
                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-1">Masukkan Logo</label>
                    <input type="file" name="logo"
                        class="w-full text-sm border border-gray-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-yellow-400 outline-none">
                </div>

                <div class="flex justify-end gap-3 pt-3">
                    <a href="{{ route('staff.exam.index') }}"
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
    </div>
</div>
@endsection
