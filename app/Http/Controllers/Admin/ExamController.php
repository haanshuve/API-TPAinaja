<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question; // ⬅️ Tambahkan ini untuk ambil data soal
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
        $validated = $request->validate([
            'nama_ujian'   => 'required|string|max:255',
            'jumlah_soal'  => 'required|integer|min:1',
            'bobot_nilai'  => 'required|numeric|min:0',
            'waktu_ujian'  => 'required|integer|min:1',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan logo jika ada
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Exam::create($validated);

        return redirect()->route('exam.index')->with('success', 'Ujian berhasil ditambahkan!');
    }

    /**
     * Form edit ujian
     */
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        return view('exam.edit', compact('exam'));
    }

    /**
     * Update ujian
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_ujian'   => 'required|string|max:255',
            'jumlah_soal'  => 'required|integer|min:1',
            'bobot_nilai'  => 'required|numeric|min:0',
            'waktu_ujian'  => 'required|integer|min:1',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $exam = Exam::findOrFail($id);

        // Jika upload logo baru
        if ($request->hasFile('logo')) {
            // Hapus logo lama kalau masih ada di storage
            if ($exam->logo && Storage::disk('public')->exists($exam->logo)) {
                Storage::disk('public')->delete($exam->logo);
            }

            // Upload logo baru
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        } else {
            // Jika tidak ada upload baru, pakai logo lama
            $validated['logo'] = $exam->logo;
        }

        $exam->update($validated);

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
     * Halaman daftar soal untuk ujian tertentu
     */
    public function questions($id)
    {
        $exam = Exam::findOrFail($id);

        // Ambil soal berdasarkan ujian (kalau tabel questions sudah ada)
        if (class_exists(Question::class)) {
            $questions = Question::where('exam_id', $exam->id)->get();
        } else {
            // Kalau model Question belum dibuat
            $questions = [];
        }

        return view('questions.index', compact('exam', 'questions'));
    }
}
