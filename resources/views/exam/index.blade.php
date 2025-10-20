@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Ujian</h2>
    <a href="{{ route('exam.create') }}"
       class="flex items-center gap-2 border-2 border-indigo-500 text-indigo-600 font-semibold px-4 py-2 rounded-lg hover:bg-indigo-50 transition">
        <i class="fas fa-plus"></i> Buat ujian
    </a>
</div>

<div class="bg-white shadow-md rounded-2xl p-6 w-full">
    <table class="w-full text-left border-separate border-spacing-y-2">
        <thead>
            <tr class="text-gray-600 border-b">
                <th class="py-2 px-3">No</th>
                <th class="py-2 px-3">Test</th>
                <th class="py-2 px-3">Bobot</th>
                <th class="py-2 px-3">Pertanyaan</th>
                <th class="py-2 px-3">Waktu</th>
                <th class="py-2 px-3">Edit</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($exams as $index => $exam)
                <tr class="bg-white border rounded-md shadow-sm hover:shadow-md transition">
                    <td class="py-3 px-3 text-gray-500 font-semibold">#{{ $index + 1 }}</td>
                    <td class="py-3 px-3 font-semibold text-gray-800">{{ $exam->name }}</td>
                    <td class="py-3 px-3 text-gray-700 text-sm font-medium">{{ $exam->weight }}</td>
                    <td class="py-3 px-3 text-gray-700 text-sm font-medium">{{ $exam->question_count }}</td>
                    <td class="py-3 px-3 font-semibold {{ strtotime($exam->duration) < strtotime('01:00:00') ? 'text-red-600' : 'text-gray-700' }}">
                        {{ $exam->duration }}
                    </td>
                    <td class="py-3 px-3 flex items-center gap-3">
                        <a href="{{ route('exam.edit', $exam->id) }}" class="text-blue-600 hover:text-blue-800 transition">
                            <i class="fas fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('exam.destroy', $exam->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus ujian ini?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-400 italic">Belum ada ujian terdaftar</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
