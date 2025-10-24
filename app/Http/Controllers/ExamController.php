<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    /**
     * Menampilkan daftar ujian
     */
    public function index()
    {
        $exams = Exam::latest()->get();
        return view('exam.index', compact('exams'));
        
    }

    /**
     * Form tambah ujian
     */
    public function create()
    {
       return view('exam.create');

    }

    /**
     * Simpan ujian baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'jumlah_soal' => 'required|integer|min:1',
            'bobot_nilai' => 'required|numeric|min:0',
            'waktu_ujian' => 'required|integer|min:1',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan logo kalau ada
        $logoPath = $request->file('logo')
            ? $request->file('logo')->store('logos', 'public')
            : null;

        Exam::create([
            'nama_ujian' => $request->nama_ujian,
            'jumlah_soal' => $request->jumlah_soal,
            'bobot_nilai' => $request->bobot_nilai,
            'waktu_ujian' => $request->waktu_ujian,
            'logo' => $logoPath,
        ]);

        return redirect()->route('exam.index')->with('success', 'Ujian berhasil ditambahkan!');
    }

    /**
     * Form edit ujian
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        return view('exams.edit', compact('exam'));
    }

    /**
     * Update ujian
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'jumlah_soal' => 'required|integer|min:1',
            'bobot_nilai' => 'required|numeric|min:0',
            'waktu_ujian' => 'required|integer|min:1',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $exam = Exam::findOrFail($id);

        // Simpan logo baru jika diupload
        if ($request->hasFile('logo')) {
            // Hapus logo lama (jika ada)
            if ($exam->logo && Storage::disk('public')->exists($exam->logo)) {
                Storage::disk('public')->delete($exam->logo);
            }
            $logoPath = $request->file('logo')->store('logos', 'public');
            $exam->logo = $logoPath;
        }

        $exam->update([
            'nama_ujian' => $request->nama_ujian,
            'jumlah_soal' => $request->jumlah_soal,
            'bobot_nilai' => $request->bobot_nilai,
            'waktu_ujian' => $request->waktu_ujian,
            'logo' => $exam->logo,
        ]);

        return redirect()->route('exam.index')->with('success', 'Ujian berhasil diperbarui!');
    }

    /**
     * Hapus ujian
     */
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);

        // Hapus logo jika ada di storage
        if ($exam->logo && Storage::disk('public')->exists($exam->logo)) {
            Storage::disk('public')->delete($exam->logo);
        }

        $exam->delete();

        return redirect()->route('exam.index')->with('success', 'Ujian berhasil dihapus!');
    }

    /**
     * Halaman tambah soal untuk ujian tertentu
     */
    public function questions($id)
    {
        $exam = Exam::findOrFail($id);
        return view('questions.index', compact('exam'));
    }
}
