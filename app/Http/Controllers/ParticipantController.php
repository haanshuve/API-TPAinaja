<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use Illuminate\Support\Facades\Hash;

class ParticipantController extends Controller
{
    /**
     * 🟡 Tampilkan daftar peserta
     */
    public function index()
    {
        $participants = Participant::all(); // ambil semua data peserta
        return view('participants.index', compact('participants'));
    }

    /**
     * 🟢 Simpan peserta baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'password' => 'required|min:6',
        ]);

        Participant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('participants.index')
            ->with('success', 'Peserta berhasil ditambahkan!');
    }

    /**
     * 🟠 Edit peserta
     */
    public function edit($id)
    {
        $participant = Participant::findOrFail($id);
        return view('participants.edit', compact('participant'));
    }

    /**
     * 🔵 Update peserta
     */
    public function update(Request $request, $id)
    {
        $participant = Participant::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email,' . $participant->id,
            'password' => 'nullable|min:6',
        ]);

        $participant->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
                ? Hash::make($request->password)
                : $participant->password,
        ]);

        return redirect()->route('participants.index')
            ->with('success', 'Peserta berhasil diperbarui!');
    }

    /**
     * 🔴 Hapus peserta
     */
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();

        return redirect()->route('participants.index')
            ->with('success', 'Peserta berhasil dihapus yaa!');
    }
}
