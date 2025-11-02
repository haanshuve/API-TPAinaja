@extends('layouts.app')

@section('title', 'Staff')

@section('content')
<div class="flex justify-between items-center mb-6">
    <!-- Bagian kiri: Sort -->
    <div class="flex items-center gap-2">
        <label for="sort" class="text-gray-600 text-sm">Sort:</label>
        <select id="sort" class="border border-gray-300 rounded-md px-3 py-1 text-sm text-gray-500 bg-gray-50 cursor-not-allowed" disabled>
            <option>Last Week</option>
        </select>
    </div>

    <!-- Bagian kanan: Notifikasi & Avatar -->
    <div class="flex items-center gap-4">
        <button class="text-gray-400 hover:text-gray-600">
            <i class="fas fa-bell text-lg"></i>
        </button>
        <div class="w-8 h-8 bg-[#635BFF] text-white flex items-center justify-center rounded-full font-semibold">
            {{ strtoupper(substr(Auth::user()->name ?? 'Y', 0, 1)) }}
        </div>
    </div>
</div>

<!-- Judul + Tombol Tambah Staff -->
<div class="flex justify-between items-center mb-6 mt-2">
    <h1 class="text-2xl font-bold text-gray-900">Staff</h1>

    <!-- Tombol Tambah Staff -->
    <a href="{{ route('staff.create') }}" 
       class="flex items-center gap-2 border border-[#635BFF] text-[#635BFF] font-medium px-4 py-2 rounded-lg hover:bg-[#635BFF] hover:text-white transition">
        <i class="fas fa-plus"></i>
        Tambah Staff
    </a>
</div>

<!-- Tabel Staff -->
<div class="bg-white rounded-2xl shadow-md p-6 max-w-5xl mx-auto">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b border-gray-300 text-gray-700">
                <th class="pb-3 font-semibold w-16">No</th>
                <th class="pb-3 font-semibold">Nama</th>
                <th class="pb-3 font-semibold">Email</th>
                <th class="pb-3 font-semibold text-center">Edit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="4" class="text-center text-gray-400 italic py-6">
                    Belum ada staff terdaftar
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
