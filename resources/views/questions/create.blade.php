@extends('layouts.app')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Tambah Soal untuk {{ $exam->name }}</h2>
    <form action="{{ route('questions.store', $exam->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Isi Soal</label>
            <textarea name="question_text" class="w-full border p-2 rounded" required></textarea>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div><label>Opsi A</label><input type="text" name="option_a" class="w-full border p-2 rounded"></div>
            <div><label>Opsi B</label><input type="text" name="option_b" class="w-full border p-2 rounded"></div>
            <div><label>Opsi C</label><input type="text" name="option_c" class="w-full border p-2 rounded"></div>
            <div><label>Opsi D</label><input type="text" name="option_d" class="w-full border p-2 rounded"></div>
        </div>

        <div class="mt-3">
            <label>Jawaban Benar</label>
            <select name="correct_answer" class="border p-2 rounded">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>
        </div>

        <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
