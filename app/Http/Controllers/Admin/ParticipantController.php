<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParticipantController extends Controller
{
    // Display all participants
    public function index()
    {
        // Fetch all participants from the database
        $participants = Participant::all(); // You might want to paginate results for large datasets
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
        // Find the participant by ID, fail if not found
        $participant = Participant::findOrFail($id);
        return view('admin.participants.edit', compact('participant'));
    }

    // Update the participant's information
    public function update(Request $request, $id)
    {
        // Find the participant by ID, fail if not found
        $participant = Participant::findOrFail($id);

        // Validate incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:participants,email,' . $participant->id,  // Exclude current participant's email
            'password' => 'nullable|min:6|confirmed',  // Password is optional during update, but needs confirmation if provided
        ]);

        // Update participant data
        $participant->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
                ? Hash::make($request->password)  // Hash the new password if provided
                : $participant->password,  // Otherwise, keep the old password
        ]);

        return redirect()->route('admin.participants.index')
            ->with('success', 'Peserta berhasil diperbarui!');
    }

    // Delete a participant
    public function destroy($id)
    {
        // Find and delete the participant
        $participant = Participant::findOrFail($id);
        $participant->delete();

        return redirect()->route('admin.participants.index')
            ->with('success', 'Peserta berhasil dihapus!');
    }
}
