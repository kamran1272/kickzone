<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fixture;

class FixtureController extends Controller
{
    public function index()
    {
        $fixtures = Fixture::all();
        $sports = \App\Models\Sport::all(); 
        $teams = \App\Models\Team::all();
        return view('admin.fixtures', compact('fixtures', 'sports', 'teams'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'location' => 'required|string|max:255',
    ]);

    Fixture::create($validated);

    return redirect()->route('admin.fixtures')
        ->with('success', 'Fixture created successfully');
}
    public function destroy(Fixture $fixture)
    {
        $fixture->delete();
        return redirect()->route('admin.fixtures')->with('success', 'Fixture deleted successfully.');
    }
}