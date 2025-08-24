<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalDetailController extends Controller
{
    public function index()
    {
        $personalDetail = Auth::user()->personalDetail;
        return view('admin.personal-details.index', compact('personalDetail'));
    }

    public function create()
    {
        return view('admin.personal-details.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'blood_group' => 'required|string|max:5',
            'department' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'dob' => 'required|date',
            'address' => 'required|string',
            'gender' => 'required|in:male,female,other'
        ]);

        $validated['user_id'] = Auth::id();

        PersonalDetail::create($validated);

        return redirect()->route('admin.personal-details.index')
            ->with('success', 'Personal details created successfully.');
    }

    public function edit(PersonalDetail $personalDetail)
    {
        // Ensure user can only edit their own details
        if ($personalDetail->user_id !== Auth::id()) {
            abort(403);
        }

        return view('admin.personal-details.edit', compact('personalDetail'));
    }

    public function update(Request $request, PersonalDetail $personalDetail)
    {
        // Ensure user can only update their own details
        if ($personalDetail->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'description' => 'required|string',
            'blood_group' => 'required|string|max:5',
            'department' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'dob' => 'required|date',
            'address' => 'required|string',
            'gender' => 'required|in:male,female,other'
        ]);

        $personalDetail->update($validated);

        return redirect()->route('admin.personal-details.index')
            ->with('success', 'Personal details updated successfully.');
    }

    public function destroy(PersonalDetail $personalDetail)
    {
        // Ensure user can only delete their own details
        if ($personalDetail->user_id !== Auth::id()) {
            abort(403);
        }

        $personalDetail->delete();

        return redirect()->route('admin.personal-details.index')
            ->with('success', 'Personal details deleted successfully.');
    }
}
