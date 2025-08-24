<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\PersonalDetailController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;

//Login Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthenticationController::class, 'login'])->name('login');

// Register Routes
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthenticationController::class, 'register'])->name('register');

// Logout Route
Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

//Admin Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    
    // Personal Details Management
    Route::resource('personal-details', PersonalDetailController::class)->except(['show']);
    
    // Projects Management
    Route::resource('projects', ProjectController::class);
    
    // Skills Management
    Route::resource('skills', SkillController::class)->except(['show']);
    
    // Achievements Management
    Route::resource('achievements', AchievementController::class)->except(['show']);
    
    // Education Management
    Route::resource('education', EducationController::class)->except(['show']);
    
    // Experience Management
    Route::resource('experiences', ExperienceController::class)->except(['show']);
});

// Portfolio Routes
Route::get('/', function () {
    return view('index');
});

Route::get('/eca', function () {
    return view('eca');
});
