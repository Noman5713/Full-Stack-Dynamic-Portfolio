<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects()->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'type' => 'required|in:personal,client,academic',
            'reference' => 'nullable|string|max:255',
            'tools' => 'required|array',
            'tools.*' => 'string|max:100',
            'keywords' => 'nullable|array',
            'keywords.*' => 'string|max:100',
            'status' => 'required|in:active,inactive,in-progress',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageUrls = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                $imageUrls[] = $path;
            }
        }

        $validated['images'] = $imageUrls;
        $validated['user_id'] = Auth::id();

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'github_url' => 'nullable|url',
            'demo_url' => 'nullable|url',
            'type' => 'required|in:personal,client,academic',
            'reference' => 'nullable|string|max:255',
            'tools' => 'required|array',
            'tools.*' => 'string|max:100',
            'keywords' => 'nullable|array',
            'keywords.*' => 'string|max:100',
            'status' => 'required|in:active,inactive,in-progress',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageUrls = $project->images ?? [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                $imageUrls[] = $path;
            }
        }

        $validated['images'] = $imageUrls;

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403);
        }

        // Delete associated images
        if ($project->images) {
            foreach ($project->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
