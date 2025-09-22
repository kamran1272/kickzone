<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FixtureController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ResultController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route; 

// Public route
Route::get('/', fn () => view('welcome'))->name('welcome');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit'); 

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    Route::get('/home', fn () => view('user.home'))->name('home');
    Route::get('/user/home', fn () => view('user.home'))->middleware('verified')->name('home');
    Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile/avatar', [UserController::class, 'updateAvatar'])->name('profile.avatar');    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/events', [EventController::class, 'userIndex'])->name('user.events');
    Route::get('/players', [PlayerController::class, 'userIndex'])->name('user.players');
    Route::get('/teams', [TeamController::class, 'userIndex'])->name('user.teams');
    Route::get('/games', [GameController::class, 'userIndex'])->name('user.games');
});

// Admin routes
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        $sports = \App\Models\Sport::all(); 
        return view('admin.dashboard', compact('sports'));
    })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

    // Sports Management
    Route::get('/sports', [SportController::class, 'index'])->name('sports');
    Route::post('/sports', [SportController::class, 'store'])->name('sports.store');
    Route::delete('/sports/{sport}', [SportController::class, 'destroy'])->name('sports.destroy');

    // User Management
    Route::resource('users', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Player Management
    Route::resource('players', PlayerController::class);
    Route::get('/players', [PlayerController::class, 'index'])->name('players');
    Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
    Route::put('/players/{id}', [PlayerController::class, 'update'])->name('players.update');
    Route::delete('/players/{id}', [PlayerController::class, 'destroy'])->name('players.destroy');

    // Announcement Management
    Route::resource('announcements', \App\Http\Controllers\Admin\AnnouncementController::class);

    //Event Management
    Route::resource('events', EventController::class);
    Route::get('/events', [EventController::class, 'index'])->name('events');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    //Fixture Management
    Route::get('/fixtures', [FixtureController::class, 'index'])->name('fixtures');
    Route::post('/fixtures', [FixtureController::class, 'store'])->name('fixtures.store');
    Route::delete('/fixtures/{fixture}', [FixtureController::class, 'destroy'])->name('fixtures.destroy');
 
    //Profile Management
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    //Ragistration Management
    Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations');
    Route::get('/registrations/create', [RegistrationController::class, 'create'])->name('registrations.create');
    Route::post('/registrations', [RegistrationController::class, 'store'])->name('registrations.store');
    Route::get('/registrations/{id}/edit', [RegistrationController::class, 'edit'])->name('registrations.edit');
    Route::put('/registrations/{id}', [RegistrationController::class, 'update'])->name('registrations.update');
    Route::delete('/registrations/{id}', [RegistrationController::class, 'destroy'])->name('registrations.destroy');

    //Report Management
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    Route::post('/reports/store', [ReportController::class, 'store'])->name('reports.store');
    Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');
    Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
    Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');

    //Results Management
    Route::get('/results', [ResultController::class, 'index'])->name('results');
    Route::post('/results', [ResultController::class, 'store'])->name('results.store');
    Route::put('/results/{id}', [ResultController::class, 'update'])->name('results.update');
    Route::delete('/results/{id}', [ResultController::class, 'destroy'])->name('results.destroy');
    Route::get('/results/create', [ResultController::class, 'create'])->name('results.create'); 

    //Team Management
    Route::get('/teams', [TeamController::class, 'index'])->name('teams');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::put('/teams/{id}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{id}', [TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');

    //Schedule Management
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules');
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::put('/schedules/{id}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::delete('/schedules/{id}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');
    Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');

    //Settings Management
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::post('/settings/{id}', [SettingController::class, 'update'])->name('settings.update');
    Route::get('/settings/create', [SettingController::class, 'create'])->name('settings.create');
    Route::put('/settings/{id}', [SettingController::class, 'update'])->name('settings.update');
    Route::delete('/settings/{id}', [SettingController::class, 'destroy'])->name('settings.destroy');

});

require __DIR__.'/auth.php';