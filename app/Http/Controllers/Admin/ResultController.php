<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Storage;

class ResultController extends Controller
{
    // Display all results
    public function index()
    {
        $results = Result::latest()->get();
        return view('admin.results', compact('results'));
    }

    // Store new result
    public function store(Request $request)
    {
        $request->validate([
            'match_name' => 'required|string|max:255',
            'date' => 'required|date',
            'winner' => 'required|string|max:255',
            'details' => 'required|string',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('results', 'public');
        }

        $validated['notify'] = $request->has('notify');
        $validated['email'] = $request->has('email');
        $validated['sms'] = $request->has('sms');
        $validated['push'] = $request->has('push');
        $validated['webhook'] = $request->has('webhook');

        Result::create($request->only(['match_name', 'date', 'winner', 'details']));

        return redirect()->back()->with('success', 'Result uploaded successfully.');
    }

    // Delete a result
    public function destroy($id)
    {
        $result = Result::findOrFail($id);

        if ($result->file && Storage::disk('public')->exists($result->file)) {
            Storage::disk('public')->delete($result->file);
        }

        $result->delete();

        return redirect()->back()->with('success', 'Result deleted successfully.');
    }
}