@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between mb-4">
        <h2 class="text-2xl font-bold">Soal Ujian: {{ $exam->name }}</h2>
        <a href="{{ route('questions.create', $exam->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Soal</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow rounded p-4">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b">
                    <th>No</th>
                    <th>Soal</th>
                    <th>Jawaban Benar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $q)
                <tr class="border-t">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::limit($q->question_text, 60) }}</td>
                    <td>{{ $q->correct_answer }}</td>
                    <td>
                        <a href="{{ route('questions.edit', [$exam->id, $q->id]) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('questions.destroy', [$exam->id, $q->id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
