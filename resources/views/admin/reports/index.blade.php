@extends('admin.layouts.sidebar')

@section('title', 'Daftar Report')

@section('content')
<div class="flex justify-between items-center mb-6">
    
    <a href="{{ route('admin.reports.create') }}" 
       class="flex items-center gap-2 border border-[#635BFF] text-[#635BFF] font-medium px-4 py-2 rounded-lg hover:bg-[#635BFF] hover:text-white transition">
        <i class="fas fa-plus"></i>
        Tambah Report
    </a>
</div>

<div class="bg-white rounded-2xl shadow-md p-6">
    <p class="text-gray-500 italic">Belum ada data report.</p>
</div>
@endsection
