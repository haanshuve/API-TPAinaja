@extends('admin.layouts.sidebar')

@section('title', 'Daftar Report')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900">Daftar Report</h1>
    <a href="{{ route('admin.reports.create') }}" 
       class="flex items-center gap-2 bg-[#635BFF] text-white px-4 py-2 rounded-lg hover:bg-[#4f46e5] transition">
        <i class="fas fa-plus"></i>
        Tambah Report
    </a>
</div>

<div class="bg-white rounded-2xl shadow-md p-6">
    <p class="text-gray-500 italic">Belum ada data report.</p>
</div>
@endsection
