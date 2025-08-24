<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $user = Auth::user();
        
        $stats = [
            'projects_count' => $user->projects()->count(),
            'skills_count' => $user->skills()->count(),
            'achievements_count' => $user->achievements()->count(),
            'education_count' => $user->education()->count(),
            'experiences_count' => $user->experiences()->count(),
            'has_personal_details' => $user->personalDetail ? true : false,
        ];

        $recentProjects = $user->projects()->latest()->take(5)->get();
        $recentAchievements = $user->achievements()->latest('date_achieved')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentProjects', 'recentAchievements'));
    }
}
