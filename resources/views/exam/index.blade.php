

@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Daftar Ujian</h2>
        <a href="{{ route('exam.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Ujian</a>
    </div>

    <div class="bg-white shadow rounded p-4">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="p-2">No</th>
                    <th class="p-2">Nama Ujian</th>
                    <th class="p-2">Bobot</th>
                    <th class="p-2">Jumlah Soal</th>
                    <th class="p-2">Durasi</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
              
            </tbody>
        </table>
    </div>
</div>
@endsection
