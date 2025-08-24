<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    public function index()
    {
        $education = Auth::user()->education()->latest('start_date')->get();
        return view('admin.education.index', compact('education'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'grade' => 'nullable|string|max:100',
            'description' => 'nullable|string'
        ]);

        $validated['user_id'] = Auth::id();

        Education::create($validated);

        return redirect()->route('admin.education.index')
            ->with('success', 'Education record created successfully.');
    }

    public function edit(Education $education)
    {
        if ($education->user_id !== Auth::id()) {
            abort(403);
        }

        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        if ($education->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'grade' => 'nullable|string|max:100',
            'description' => 'nullable|string'
        ]);

        $education->update($validated);

        return redirect()->route('admin.education.index')
            ->with('success', 'Education record updated successfully.');
    }

    public function destroy(Education $education)
    {
        if ($education->user_id !== Auth::id()) {
            abort(403);
        }

        $education->delete();

        return redirect()->route('admin.education.index')
            ->with('success', 'Education record deleted successfully.');
    }
}
