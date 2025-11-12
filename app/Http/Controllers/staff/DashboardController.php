<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\Peserta;

class DashboardController extends Controller
{
    public function index()
    {
        // Contoh: Ambil total ujian dan peserta
        $totalUjian = Exam::count();
        $totalPeserta = Participant::count();

        // Contoh data chart (jumlah ujian & peserta tiap hari)
        $ujianPerHari = Exam::selectRaw('DAYNAME(created_at) as hari, COUNT(*) as total')
            ->groupBy('hari')
            ->pluck('total', 'hari');

        $pesertaPerHari = Participant::selectRaw('DAYNAME(created_at) as hari, COUNT(*) as total')
            ->groupBy('hari')
            ->pluck('total', 'hari');

        return view('staff.dashboard', [
            'totalUjian' => $totalUjian,
            'totalPeserta' => $totalPeserta,
            'ujianLabels' => $ujianPerHari->keys(),
            'ujianData' => $ujianPerHari->values(),
            'pesertaLabels' => $pesertaPerHari->keys(),
            'pesertaData' => $pesertaPerHari->values(),
        ]);
    }
}
