<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player; 
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    public function userIndex()
    {
        $players = Player::with('team')->orderBy('name', 'asc')->get();
        return view('user.players', compact('players'));
    }

    public function index()
    {
        $teams = Team::all();
        $players = Player::with('team')->get();
        return view('admin.players', compact('players', 'teams'));
    }

    // Store a newly created player in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'position' => 'required|string|max:255',
            'team_id' => 'nullable|exists:teams,id',
            'photo_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $player = new Player($request->except('photo_url'));

        if ($request->hasFile('photo_url')) {
            // Save image inside storage/app/public/players
            $path = $request->file('photo_url')->store('players', 'public');
            $player->photo_url = $path;
        }

        $player->save();

        return redirect()->route('admin.players')
            ->with('success', 'Player added successfully!')
            ->with('activeTab', 'players');
    }

    // Update the specified player in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'position' => 'required|string|max:255',
            'team_id' => 'nullable|exists:teams,id',
            'photo_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $player = Player::findOrFail($id);
        $player->fill($request->except('photo_url'));

        if ($request->hasFile('photo_url')) {
            // delete old image if exists
            if ($player->photo_url && Storage::disk('public')->exists($player->photo_url)) {
                Storage::disk('public')->delete($player->photo_url);
            }

            // store new image
            $path = $request->file('photo_url')->store('players', 'public');
            $player->photo_url = $path;
        }

        $player->save();

        return redirect()->route('admin.players')
            ->with('success', 'Player updated successfully!')
            ->with('activeTab', 'players');
    }

    // Remove the specified player from the database
    public function destroy($id)
    {
        $player = Player::findOrFail($id);

        // delete image if exists
        if ($player->photo_url && Storage::disk('public')->exists($player->photo_url)) {
            Storage::disk('public')->delete($player->photo_url);
        }

        $player->delete();

        return redirect()->route('admin.players')
            ->with('success', 'Player deleted successfully!')
            ->with('activeTab', 'players');
    }
}