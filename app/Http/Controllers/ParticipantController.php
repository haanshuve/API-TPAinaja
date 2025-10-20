<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::all();
        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        return view('participants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',
            'password' => 'required|min:6'
        ]);

        Participant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('participants.index')->with('success', '✅ Peserta berhasil ditambahkan!');
    }

    public function edit(Participant $participant)
    {
        return view('participants.edit', compact('participant'));
    }

    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:participants,email,' . $participant->id,
        ]);

        $participant->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->route('participants.index')->with('success', '✅ Peserta berhasil diperbarui!');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return redirect()->route('participants.index')->with('success', '🗑️ Peserta berhasil dihapus!');
    }
}
