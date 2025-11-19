@extends('admin.layouts.sidebar')

@section('title', 'Staff')

@section('content')


<!-- Judul + Tombol Tambah Staff -->
<div class="flex justify-between items-center mb-6 mt-2">
   
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
    @forelse ($staff as $index => $s)
        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
            <td class="py-3">{{ $index + 1 }}</td>
            <td class="py-3 font-medium text-gray-800">{{ $s->name }}</td>
            <td class="py-3 text-gray-600">{{ $s->email }}</td>

            <td class="py-3 text-center">
                <a href="{{ route('admin.staff.edit', $s->id) }}"
                    class="text-blue-600 hover:text-blue-800 transition">
                    <i class="fas fa-pen"></i>
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center text-gray-400 italic py-6">
                Belum ada staff terdaftar.
            </td>
        </tr>
    @endforelse
</tbody>

    </table>
</div>
@endsection
