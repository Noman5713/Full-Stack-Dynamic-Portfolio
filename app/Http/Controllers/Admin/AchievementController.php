<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Auth::user()->achievements()->latest('date_achieved')->get();
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_achieved' => 'required|date',
            'organization' => 'required|string|max:255',
            'certificate_url' => 'nullable|url',
            'type' => 'required|in:award,certification,recognition'
        ]);

        $validated['user_id'] = Auth::id();

        Achievement::create($validated);

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement created successfully.');
    }

    public function edit(Achievement $achievement)
    {
        if ($achievement->user_id !== Auth::id()) {
            abort(403);
        }

        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        if ($achievement->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_achieved' => 'required|date',
            'organization' => 'required|string|max:255',
            'certificate_url' => 'nullable|url',
            'type' => 'required|in:award,certification,recognition'
        ]);

        $achievement->update($validated);

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement updated successfully.');
    }

    public function destroy(Achievement $achievement)
    {
        if ($achievement->user_id !== Auth::id()) {
            abort(403);
        }

        $achievement->delete();

        return redirect()->route('admin.achievements.index')
            ->with('success', 'Achievement deleted successfully.');
    }
}
