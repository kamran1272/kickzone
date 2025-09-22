<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function userIndex()
    {
        $games = Game::with(['homeTeam', 'awayTeam', 'venue'])
                    ->where('date', '>=', now()->toDateString())
                    ->orderBy('date')
                    ->orderBy('time')
                    ->get();
                    
        return view('user.games', compact('games'));
    }

    // Admin methods would go here
    public function index()
    {
        // Admin view logic
    }
}