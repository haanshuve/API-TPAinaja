@extends('staff.layouts.app')

@section('title', 'Ujian')

@section('content')
<div class="min-h-screen bg-[#F8FAFC] px-8 py-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Ujian</h1>

        <!-- Tombol Buat Ujian -->
        <a href="{{ route('staff.exam.create') }}"
           class="flex items-center gap-2 border border-indigo-500 text-indigo-600 font-medium px-4 py-2 rounded-md hover:bg-indigo-50 transition">
            <i class="fas fa-plus"></i>
            Buat Ujian
        </a>
    </div>

    <!-- Grid Card Ujian -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($exams as $exam)
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition p-4 border border-gray-100">

                <!-- Logo Ujian -->
                @if ($exam->logo)
                    <img src="{{ asset('storage/' . $exam->logo) }}" alt="{{ $exam->nama_ujian }}"
                        class="w-full h-32 object-cover rounded-md mb-3">
                @else
                    <div class="w-full h-32 bg-gray-100 rounded-md flex items-center justify-center text-gray-400">
                        <i class="fas fa-image text-2xl"></i>
                    </div>
                @endif

                <!-- Detail Ujian -->
                <h2 class="font-semibold text-gray-800 text-lg mb-1">{{ $exam->nama_ujian }}</h2>
                <p class="text-gray-500 text-sm mb-1">{{ $exam->jumlah_soal ?? 0 }} Soal</p>
                <p class="text-gray-400 text-xs mb-4">{{ $exam->waktu_ujian }} menit</p>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-center gap-3">

                    <!-- Edit -->
                    <a href="{{ route('staff.exam.edit', $exam->id) }}"
                       class="w-8 h-8 flex items-center justify-center rounded-full bg-yellow-100 text-yellow-500 hover:bg-yellow-200 transition"
                       title="Edit Ujian">
                        <i class="fas fa-pen"></i>
                    </a>

                    <!-- Kelola Soal -->
                    <a href="{{ route('staff.questions.index', $exam->id) }}"
                       class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-100 text-blue-500 hover:bg-blue-200 transition"
                       title="Kelola Soal">
                        <i class="fas fa-list"></i>
                    </a>

                    <!-- Hapus -->
                    <form action="{{ route('staff.exam.destroy', $exam->id) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus ujian ini?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-8 h-8 flex items-center justify-center rounded-full bg-red-100 text-red-500 hover:bg-red-200 transition"
                            title="Hapus Ujian">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>
                </div>

            </div>
        @empty
            <p class="text-gray-500 italic col-span-full text-center py-10">
                Belum ada ujian terdaftar.
            </p>
        @endforelse
    </div>
</div>
@endsection
