<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Show all announcements
    public function index()
{
    $announcements = Announcement::all();
    return view('admin.announcements', compact('announcements'));
}

    // Store a new announcement
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Announcement::create($request->only('title', 'message'));

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement created successfully.');
    }

    // Show the form to edit an announcement
    public function edit(Announcement $announcement)
    {
        return view('admin.edit_announcement', compact('announcement'));
    }

    // Update the announcement
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $announcement->update($request->only('title', 'message'));

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement updated successfully.');
    }

    // Delete the announcement
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('admin.announcements.index')->with('success', 'Announcement deleted successfully.');
    }
}