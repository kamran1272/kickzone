<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
{
    $settings = Setting::first();

    if (!$settings) {
        // Optionally, create default settings if none exist
        $settings = Setting::create([
            'site_name' => 'KickZone',
            'admin_email' => 'admin@kickzone.com',
            'timezone' => 'UTC',
            'maintenance_mode' => false,
        ]);
    }

    return view('admin.settings', compact('settings'));
}


public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'admin_email' => 'required|email',
            'timezone' => 'required|string',
            'maintenance_mode' => 'nullable|boolean',
        ]);

        $settings = Setting::first();

        if (!$settings) {
            $settings = new Setting();
        }

        $settings->site_name = $validated['site_name'];
        $settings->admin_email = $validated['admin_email'];
        $settings->timezone = $validated['timezone'];
        $settings->maintenance_mode = $request->has('maintenance_mode');
        $settings->save();

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}