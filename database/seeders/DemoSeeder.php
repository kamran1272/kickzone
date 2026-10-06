<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Event;
use App\Models\Fixture;
use App\Models\Game;
use App\Models\Player;
use App\Models\Registration;
use App\Models\Result;
use App\Models\Schedule;
use App\Models\Sport;
use App\Models\Team;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Football', 'Cricket', 'Basketball', 'Tennis'] as $name) {
            Sport::firstOrCreate(['name' => $name]);
        }

        $teams = [
            ['name' => 'Lahore Lions', 'founded_year' => 2015, 'home_ground' => 'Gaddafi Stadium', 'ranking' => 1, 'wins' => 18, 'losses' => 4, 'win_rate' => 81.82, 'description' => 'Premier football club from Lahore with a strong attacking lineup.'],
            ['name' => 'Karachi Kings XI', 'founded_year' => 2016, 'home_ground' => 'National Stadium', 'ranking' => 2, 'wins' => 16, 'losses' => 6, 'win_rate' => 72.73, 'description' => 'Coastal giants known for disciplined defense and quick counters.'],
            ['name' => 'Islamabad United Stars', 'founded_year' => 2018, 'home_ground' => 'Jinnah Stadium', 'ranking' => 3, 'wins' => 14, 'losses' => 8, 'win_rate' => 63.64, 'description' => 'Capital city side with a young, energetic squad.'],
            ['name' => 'Peshawar Panthers', 'founded_year' => 2019, 'home_ground' => 'Arbab Niaz Stadium', 'ranking' => 4, 'wins' => 12, 'losses' => 10, 'win_rate' => 54.55, 'description' => 'Fearless newcomers making waves in the league.'],
        ];
        $sportIds = Sport::pluck('id', 'name')->toArray();
        $teamIds = [];
        foreach ($teams as $i => $t) {
            $t['sport_id'] = $sportIds['Football'] ?? null;
            $team = Team::firstOrCreate(['name' => $t['name']], $t);
            if (!$team->sport_id) { $team->update(['sport_id' => $t['sport_id']]); }
            $teamIds[] = $team->id;
        }

        $players = [
            ['name' => 'Ahmed Raza', 'age' => 24, 'position' => 'Striker', 'team_id' => $teamIds[0], 'nationality' => 'Pakistan', 'jersey_number' => '9', 'height' => '182 cm', 'weight' => '76 kg'],
            ['name' => 'Bilal Ahmed', 'age' => 27, 'position' => 'Midfielder', 'team_id' => $teamIds[0], 'nationality' => 'Pakistan', 'jersey_number' => '8', 'height' => '178 cm', 'weight' => '72 kg'],
            ['name' => 'Usman Tariq', 'age' => 22, 'position' => 'Goalkeeper', 'team_id' => $teamIds[1], 'nationality' => 'Pakistan', 'jersey_number' => '1', 'height' => '188 cm', 'weight' => '82 kg'],
            ['name' => 'Danish Ali', 'age' => 25, 'position' => 'Defender', 'team_id' => $teamIds[1], 'nationality' => 'Pakistan', 'jersey_number' => '4', 'height' => '184 cm', 'weight' => '79 kg'],
            ['name' => 'Fahad Khan', 'age' => 23, 'position' => 'Winger', 'team_id' => $teamIds[2], 'nationality' => 'Pakistan', 'jersey_number' => '11', 'height' => '176 cm', 'weight' => '70 kg'],
            ['name' => 'Imran Sheikh', 'age' => 29, 'position' => 'Striker', 'team_id' => $teamIds[3], 'nationality' => 'Pakistan', 'jersey_number' => '10', 'height' => '180 cm', 'weight' => '75 kg'],
        ];
        foreach ($players as $p) {
            Player::firstOrCreate(['name' => $p['name'], 'team_id' => $p['team_id']], $p);
        }

        $events = [
            ['title' => 'National Football Championship', 'date' => now()->addDays(12)->toDateString(), 'location' => 'Gaddafi Stadium, Lahore'],
            ['title' => 'Youth Talent Hunt Trials', 'date' => now()->addDays(20)->toDateString(), 'location' => 'Jinnah Stadium, Islamabad'],
            ['title' => 'Inter-City Cricket Cup', 'date' => now()->addDays(30)->toDateString(), 'location' => 'National Stadium, Karachi'],
        ];
        foreach ($events as $e) {
            Event::firstOrCreate($e);
        }

        $fixtures = [
            ['title' => 'Lahore Lions vs Karachi Kings XI', 'date' => now()->addDays(5)->toDateString(), 'time' => '18:00', 'location' => 'Gaddafi Stadium, Lahore'],
            ['title' => 'Islamabad United Stars vs Peshawar Panthers', 'date' => now()->addDays(6)->toDateString(), 'time' => '19:30', 'location' => 'Jinnah Stadium, Islamabad'],
        ];
        foreach ($fixtures as $i => $f) {
            $f['team1_id'] = $teamIds[$i * 2] ?? null;
            $f['team2_id'] = $teamIds[$i * 2 + 1] ?? null;
            $fx = Fixture::firstOrCreate(['title' => $f['title']], $f);
            if (!$fx->team1_id) { $fx->update(['team1_id' => $f['team1_id'], 'team2_id' => $f['team2_id']]); }
        }

        $games = [
            ['date' => now()->addDays(5)->toDateString(), 'time' => '18:00:00', 'home_team_id' => $teamIds[0], 'away_team_id' => $teamIds[1], 'competition' => 'National League', 'referee' => 'K. Mehmood', 'description' => 'Top-of-the-table clash.'],
            ['date' => now()->addDays(6)->toDateString(), 'time' => '19:30:00', 'home_team_id' => $teamIds[2], 'away_team_id' => $teamIds[3], 'competition' => 'National League', 'referee' => 'S. Anwar', 'description' => 'Mid-table battle with playoff implications.'],
            ['date' => now()->subDays(3)->toDateString(), 'time' => '18:00:00', 'home_team_id' => $teamIds[0], 'away_team_id' => $teamIds[2], 'home_score' => 3, 'away_score' => 1, 'competition' => 'National League', 'referee' => 'K. Mehmood', 'description' => 'Completed fixture.'],
        ];
        foreach ($games as $g) {
            Game::firstOrCreate([
                'date' => $g['date'], 'home_team_id' => $g['home_team_id'], 'away_team_id' => $g['away_team_id'],
            ], $g);
        }

        $results = [
            ['match_name' => 'Lahore Lions vs Islamabad United Stars', 'date' => now()->subDays(3)->toDateString(), 'winner' => 'Lahore Lions', 'details' => 'Lahore Lions won 3-1 with two goals from Ahmed Raza.'],
            ['match_name' => 'Karachi Kings XI vs Peshawar Panthers', 'date' => now()->subDays(10)->toDateString(), 'winner' => 'Karachi Kings XI', 'details' => 'A late winner sealed a 2-1 victory for Karachi Kings XI.'],
        ];
        foreach ($results as $r) {
            Result::firstOrCreate(['match_name' => $r['match_name']], $r);
        }

        $schedules = [
            ['event' => 'Team training session', 'date' => now()->addDays(2)->toDateString(), 'time' => '09:00:00'],
            ['event' => 'Press conference', 'date' => now()->addDays(4)->toDateString(), 'time' => '14:00:00'],
        ];
        foreach ($schedules as $s) {
            Schedule::firstOrCreate($s);
        }

        $announcements = [
            ['title' => 'Season tickets now on sale', 'message' => 'Season tickets for the National League are now available at all stadium box offices and online.'],
            ['title' => 'New head coach appointed', 'message' => 'We are delighted to welcome our new head coach ahead of the upcoming championship.'],
        ];
        foreach ($announcements as $a) {
            Announcement::firstOrCreate(['title' => $a['title']], $a);
        }

        $regs = [
            ['player_name' => 'Hamza Yousaf', 'email' => 'hamza@example.com', 'sport' => 'Football'],
            ['player_name' => 'Ali Nawaz', 'email' => 'ali.n@example.com', 'sport' => 'Cricket'],
        ];
        foreach ($regs as $r) {
            Registration::firstOrCreate(['email' => $r['email']], $r);
        }
    }
}
