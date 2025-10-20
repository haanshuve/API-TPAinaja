@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Peserta</h2>
        <a href="{{ route('participants.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Peserta</a>
    </div>

    <div class="bg-white shadow rounded p-4">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="p-2">No</th>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($participants as $index => $participant)
                <tr class="border-t">
                    <td class="p-2">{{ $index + 1 }}</td>
                    <td class="p-2">{{ $participant->name }}</td>
                    <td class="p-2">{{ $participant->email }}</td>
                    <td class="p-2">
                        <a href="{{ route('participants.edit', $participant->id) }}" class="text-blue-500">Edit</a>
                        <form action="{{ route('participants.destroy', $participant->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500 italic">Belum ada peserta terdaftar</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
