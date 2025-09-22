<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::orderBy('date', 'asc')->get();
        return view('admin.schedule', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        Schedule::create($request->all());

        return redirect()->back()->with('success', 'Schedule added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'event' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required'
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update($request->all());

        return redirect()->back()->with('success', 'Schedule updated successfully!');
    }

    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->back()->with('success', 'Schedule deleted successfully!');
    }
}