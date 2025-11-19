@extends('admin.layouts.sidebar')

@section('title', 'Tambah Staf Baru')

@section('content')

<form action="{{ route('admin.staff.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-md">
    @csrf

    <!-- Name Field -->
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
        <input
            type="text"
            name="name"
            id="name"
            class="w-full border border-gray-300 rounded-md px-3 py-2"
            value="{{ old('name') }}"
            required
        >
        @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Email Field -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input
            type="email"
            name="email"
            id="email"
            class="w-full border border-gray-300 rounded-md px-3 py-2"
            value="{{ old('email') }}"
            required
        >
        @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Password Field -->
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input
            type="password"
            name="password"
            id="password"
            class="w-full border border-gray-300 rounded-md px-3 py-2"
            required
        >
        @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end">
        <button
            type="submit"
            class="px-5 py-2 rounded-md bg-[#FACC15] hover:bg-[#EAB308] text-gray-900 font-semibold shadow-sm"
        >
            Simpan Staf
        </button>
    </div>

</form>

@endsection
