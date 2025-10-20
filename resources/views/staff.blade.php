@extends('layouts.app')

@section('title', 'Staff')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Staff</h1>
    </div>

    <!-- Sort & Tambah Staff -->
    <div class="flex items-center gap-4">
        <div class="flex items-center gap-2">
            <label for="sort" class="text-gray-600 text-sm">Sort:</label>
            <select id="sort" class="border border-gray-300 rounded-md px-3 py-1 text-sm text-gray-600 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                <option>Last Week</option>
                <option>Last Month</option>
                <option>All</option>
            </select>
        </div>

        <!-- Tombol Tambah Staff (kuning glow) -->
        <a href="{{ route('staff.create') }}" 
           class="flex items-center gap-2 border border-yellow-400 text-yellow-500 font-medium px-4 py-2 rounded-lg bg-white 
                  hover:text-yellow-600 hover:shadow-[0_0_12px_rgba(250,204,21,0.5)] transition duration-300 ease-in-out shadow-sm">
            <i class="fas fa-plus"></i>
            Tambah Staff
        </a>
    </div>
</div>

<!-- Table Staff -->
<div class="bg-white rounded-2xl shadow-md p-6">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b border-gray-200 text-gray-600">
                <th class="pb-3 font-semibold">No</th>
                <th class="pb-3 font-semibold">Nama</th>
                <th class="pb-3 font-semibold">Email</th>
                <th class="pb-3 font-semibold text-center">Edit</th>
            </tr>
        </thead>
        <tbody>
            @php
                $staffs = [
                    ['id' => 1, 'nama' => 'Jhon', 'email' => 'Jhon@gmail.com'],
                    ['id' => 2, 'nama' => 'Polibatam', 'email' => 'Jhon@gmail.com'],
                    ['id' => 3, 'nama' => 'Avyz', 'email' => 'Jhon@gmail.com'],
                    ['id' => 4, 'nama' => 'Destia', 'email' => 'Jhon@gmail.com'],
                ];
            @endphp

            @forelse ($staffs as $staff)
            <tr class="border-b border-gray-100 hover:bg-gray-50 transition">
                <td class="py-3 text-gray-500">#{{ $staff['id'] }}</td>
                <td class="py-3 font-medium text-gray-800">{{ $staff['nama'] }}</td>
                <td class="py-3 text-gray-600">{{ $staff['email'] }}</td>
                <td class="py-3 text-center flex items-center justify-center gap-3">
                    <!-- Icon edit & delete warna kuning -->
                    <a href="#" class="text-yellow-500 hover:text-yellow-600 text-lg transition">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#" class="text-yellow-500 hover:text-yellow-600 text-lg transition">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-gray-400 italic py-6">Belum ada staff terdaftar</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
