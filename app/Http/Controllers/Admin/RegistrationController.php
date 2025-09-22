<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration; // Assuming you have a Registration model
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    // Display all registrations
    public function index()
    {
        $registrations = Registration::all();
        return view('admin.registrations', compact('registrations'));
    }

    // Show the form for creating a new registration
    public function create()
    {
        return view('admin.registrations.create');
    }

    // Store a newly created registration
    public function store(Request $request)
    {
        $request->validate([
            'player_name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email',
            'sport' => 'required|string|max:255',
        ]);

        // Store the registration
        Registration::create([
            'player_name' => $request->player_name,
            'email' => $request->email,
            'sport' => $request->sport,
        ]);

        return redirect()->route('admin.registrations')->with('success', 'Registration created successfully.');
    }

    // Show the form for editing an existing registration
    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        return view('admin.registrations.edit', compact('registration'));
    }

    // Update an existing registration
    public function update(Request $request, $id)
    {
        $request->validate([
            'player_name' => 'required|string|max:255',
            'email' => 'required|email|unique:registrations,email,' . $id,
            'sport' => 'required|string|max:255',
        ]);

        $registration = Registration::findOrFail($id);
        $registration->update([
            'player_name' => $request->player_name,
            'email' => $request->email,
            'sport' => $request->sport,
        ]);

        return redirect()->route('admin.registrations')->with('success', 'Registration updated successfully.');
    }

    // Delete a registration
    public function destroy($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect()->route('admin.registrations')->with('success', 'Registration deleted successfully.');
    }
}