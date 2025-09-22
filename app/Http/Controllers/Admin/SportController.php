<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function index()
    {
        // Fetch all sports from the database
        $sports = Sport::all();

        // Pass the sports data to the view
        return view('admin.sports', compact('sports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create a new sport
        Sport::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.sports')->with('success', 'Sport added successfully!');
    }

    public function destroy(Sport $sport)
    {
        // Delete the sport
        $sport->delete();

        return redirect()->route('admin.sports')->with('success', 'Sport deleted successfully!');
    }
}