@extends('admin.layouts.sidebar')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h2 class="text-xl font-bold mb-4">Edit Peserta</h2>

    <form method="POST" action="{{ route('admin.participants.update', $participant->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1 font-medium">Nama</label>
            <input type="text" name="name" value="{{ $participant->name }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" value="{{ $participant->email }}" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.participants.index') }}" class="ml-2 text-gray-600">Batal</a>
    </form>
</div>
@endsection
