<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\Sport;
use Illuminate\Http\Request;

class TeamController extends Controller
{
  public function userIndex()
{
    $teams = Team::with(['players', 'coach'])->orderBy('name', 'asc')->get();
    return view('user.teams', compact('teams'));
}
    public function index()
    {
        $teams = Team::all();
        $sports = Sport::all();
        return view('admin.teams', compact('teams', 'sports'));
    }

    // Store a new team
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sport_id' => 'required|exists:sports,id',
        ]);

        Team::create([
            'name' => $request->name,
            'sport_id' => $request->sport_id,
        ]);
        return redirect()->route('admin.teams')->with('success', 'Team created successfully.');
    }

    // Show the form to edit a team
    public function edit(Team $team)
    {
        $sports = Sport::all();
        return view('admin.edit_team', compact('team', 'sports'));
    }

    // Update the team
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sport_id' => 'required|exists:sports,id',
        ]);

        $team->update($request->only('name', 'sport_id'));

        return redirect()->route('admin.teams')->with('success', 'Team updated successfully.');
    }

    // Delete the team
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('admin.teams')->with('success', 'Team deleted successfully.');
    }
}