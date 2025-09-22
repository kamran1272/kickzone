<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Sport;
use App\Models\Player;
use App\Models\Fixture;

class DashboardController extends Controller
{
    public function index()
    {
        $sports = Sport::all();
        $users = User::all();
        $players = Player::all();
        $recentRegistrations = User::latest()->take(5)->get(); // Fetch the 5 most recent users
        $upcomingFixtures = Fixture::where('date', '>=', now())->orderBy('date')->take(5)->get(); // Fetch the next 5 fixtures

        return view('admin.dashboard', compact('sports', 'users', 'players', 'recentRegistrations', 'upcomingFixtures'));
    }
}