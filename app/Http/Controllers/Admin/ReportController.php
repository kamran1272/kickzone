<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('admin.reports', compact('reports'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'details' => 'nullable|string',
            'file' => 'nullable|file|max:2048',
            // Add any boolean notification fields too
        ]);
    
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('reports', 'public');
        }
    
        $validated['status'] = 'pending'; // default or logic
        $validated['notify'] = $request->has('notify');
        $validated['email'] = $request->has('email');
        $validated['sms'] = $request->has('sms');
        $validated['push'] = $request->has('push');
        $validated['webhook'] = $request->has('webhook');
    
        // Add date (use current date)
        $validated['date'] = now(); // This will insert the current date
    
        Report::create($validated);
    
        return redirect()->back()->with('success', 'Report generated successfully.');
    }
    


    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('admin.reports')->with('success', 'Report deleted successfully!');
    }

    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('admin.reports.show', compact('report'));
    }
}