@extends('admin.layouts.sidebar')

@section('title', 'Staff')

@section('content')


<!-- Judul + Tombol Tambah Staff -->
<div class="flex justify-between items-center mb-6 mt-2">
    <h1 class="text-2xl font-bold text-gray-900">Staff</h1>

    <!-- Tombol Tambah Staff -->
    <a href="{{ route('admin.staff.create') }}" 
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
