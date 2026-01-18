<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Show the general settings page.
     */
    public function edit()
    {
        $appName = \App\Models\Setting::where('key', 'app_name')->value('value') ?? config('app.name');
        return view('settings.general', compact('appName'));
    }

    /**
     * Update the general settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'app_name' => 'required|string|max:255',
        ]);

        \App\Models\Setting::updateOrCreate(
            ['key' => 'app_name'],
            ['value' => $validated['app_name']]
        );

        return redirect()->route('settings.general.edit')->with('status', 'Settings updated successfully.');
    }
}
