<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ParticipantController extends Controller
{
    // Display all participants
    public function index()
    {
        // Fetch all participants from the database
        $participants = User::where('role', 'peserta')->get();
        return view('admin.participants.index', compact('participants'));
    }

    // Show the form for creating a new participant
    public function create()
    {
        return view('admin.participants.create');
    }
    // Store a new participant
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email',  // Unique email validation
            'password' => 'required|min:6|confirmed',  // Added confirmation for password
        ]);

        // Create a new participant
        Participant::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hash the password before storing
        ]);

        return redirect()->route('admin.participants.index')
            ->with('success', 'Peserta berhasil ditambahkan!');
    }

    // Show the form for editing an existing participant
public function edit($id)
{
    // Ambil peserta dengan role 'peserta' berdasarkan ID
    $participant = User::where('role', 'peserta')->where('id', $id)->firstOrFail();

    // Kirim variable participant ke view
    return view('admin.participants.edit', compact('participant'));
}


    // Update the participant's information
   public function update(Request $request, $id)
{
    $participant = User::where('role', 'peserta')->where('id', $id)->firstOrFail();

    $participant->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('admin.participants.index')
                     ->with('success', 'Peserta berhasil diperbarui');
}

    // Delete a participant
    public function destroy($id)
    {
        // Find and delete the participant
        $participant = User::where('role', 'peserta')->where('id', $id)->firstOrFail();
        $participant->delete();

        return redirect()->route('admin.participants.index')
            ->with('success', 'Peserta berhasil dihapus!');
    }
}
