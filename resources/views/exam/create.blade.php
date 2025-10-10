@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Ujian</h1>

    {{-- isi konten ujian --}}
@endsection




@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h2 class="text-xl font-semibold mb-4">Tambah Ujian</h2>
    <form action="{{ route('exam.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Ujian</label>
            <input type="text" name="name" class="w-full border p-2 rounded">
        </div>
        <div class="mb-3">
            <label>Bobot</label>
            <input type="number" name="weight" class="w-full border p-2 rounded">
        </div>
        <div class="mb-3">
            <label>Jumlah Soal</label>
            <input type="number" name="question_count" class="w-full border p-2 rounded">
        </div>
        <div class="mb-3">
            <label>Durasi (misal: 01:30:00)</label>
            <input type="time" name="duration" class="w-full border p-2 rounded">
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
