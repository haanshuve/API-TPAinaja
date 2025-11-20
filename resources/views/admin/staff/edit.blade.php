@extends('admin.layouts.sidebar')

@section('title', 'Edit Staff')

@section('content')
<div class="p-6">
    <div class="max-w-xl mx-auto bg-white shadow rounded-lg p-6">
        
        <h2 class="text-2xl font-semibold mb-6">Edit Staff</h2>

        {{-- Alert jika ada error --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded">
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.staff.update', $staff->id) }}">
            @csrf
            @method('PUT')

            {{-- Nama --}}
            <div class="mb-5">
                <label class="block mb-1 font-medium text-gray-700">Nama</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name', $staff->name) }}"
                    class="w-full border-gray-300 p-2 rounded-lg shadow-sm 
                           focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
            </div>

            {{-- Email --}}
            <div class="mb-5">
                <label class="block mb-1 font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ old('email', $staff->email) }}"
                    class="w-full border-gray-300 p-2 rounded-lg shadow-sm 
                           focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required
                >
            </div>

            {{-- Password Opsional --}}
            <div class="mb-5">
                <label class="block mb-1 font-medium text-gray-700">
                    Password (Opsional)
                </label>
                <input 
                    type="password" 
                    name="password"
                    placeholder="Kosongkan jika tidak ingin mengganti"
                    class="w-full border-gray-300 p-2 rounded-lg shadow-sm 
                           focus:ring-2 focus:ring-blue-500 focus:outline-none"
                >
            </div>

            <div class="flex items-center mt-6">
                <button 
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow"
                >
                    Update
                </button>

                <a 
                    href="{{ route('admin.staff.index') }}" 
                    class="ml-4 text-gray-600 hover:text-gray-800"
                >
                    Batal
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
