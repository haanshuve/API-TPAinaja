@extends('admin.layouts.sidebar')

@section('title', 'Tambah Staf Baru')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-lg p-8 border border-gray-100 mt-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tambah Staf Baru</h2>

    <!-- Form for Adding a New Staff -->
    <form action="{{ route('admin.staff.store') }}" method="POST">
        @csrf

        <!-- Name Field -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
        </div>

        <!-- Email Field -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md px-3 py-2" required>
        </div>

        <!-- Role Field (Dropdown) -->
        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" id="role" class="w-full border border-gray-300 rounded-md px-3 py-2">
                @foreach($roles as $role)
                    <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-5 py-2 rounded-md bg-[#FACC15] hover:bg-[#EAB308] text-gray-900 font-semibold shadow-sm">
                Simpan Staf
            </button>
        </div>
    </form>
</div>
@endsection
