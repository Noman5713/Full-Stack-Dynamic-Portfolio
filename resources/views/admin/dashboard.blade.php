@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
    <!-- Statistics Cards -->
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-500 bg-opacity-75">
                <i class="fas fa-project-diagram text-white"></i>
            </div>
            <div class="ml-4">
                <p class="mb-2 text-sm font-medium text-gray-600">Projects</p>
                <p class="text-lg font-semibold text-gray-700">{{ $stats['projects_count'] }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-500 bg-opacity-75">
                <i class="fas fa-cogs text-white"></i>
            </div>
            <div class="ml-4">
                <p class="mb-2 text-sm font-medium text-gray-600">Skills</p>
                <p class="text-lg font-semibold text-gray-700">{{ $stats['skills_count'] }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-500 bg-opacity-75">
                <i class="fas fa-trophy text-white"></i>
            </div>
            <div class="ml-4">
                <p class="mb-2 text-sm font-medium text-gray-600">Achievements</p>
                <p class="text-lg font-semibold text-gray-700">{{ $stats['achievements_count'] }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-500 bg-opacity-75">
                <i class="fas fa-graduation-cap text-white"></i>
            </div>
            <div class="ml-4">
                <p class="mb-2 text-sm font-medium text-gray-600">Education</p>
                <p class="text-lg font-semibold text-gray-700">{{ $stats['education_count'] }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-red-500 bg-opacity-75">
                <i class="fas fa-briefcase text-white"></i>
            </div>
            <div class="ml-4">
                <p class="mb-2 text-sm font-medium text-gray-600">Experience</p>
                <p class="text-lg font-semibold text-gray-700">{{ $stats['experiences_count'] }}</p>
            </div>
        </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex items-center">
            <div class="p-3 rounded-full {{ $stats['has_personal_details'] ? 'bg-green-500' : 'bg-gray-500' }} bg-opacity-75">
                <i class="fas fa-user text-white"></i>
            </div>
            <div class="ml-4">
                <p class="mb-2 text-sm font-medium text-gray-600">Personal Details</p>
                <p class="text-lg font-semibold text-gray-700">
                    {{ $stats['has_personal_details'] ? 'Complete' : 'Incomplete' }}
                </p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Projects -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b">
            <h3 class="text-lg font-semibold text-gray-800">Recent Projects</h3>
        </div>
        <div class="p-6">
            @if($recentProjects->count() > 0)
                <div class="space-y-4">
                    @foreach($recentProjects as $project)
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium text-gray-800">{{ $project->name }}</h4>
                                <p class="text-sm text-gray-600">{{ Str::limit($project->description, 60) }}</p>
                                <span class="inline-block px-2 py-1 text-xs rounded-full {{ $project->status === 'active' ? 'bg-green-100 text-green-800' : ($project->status === 'in-progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </div>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 pt-4 border-t">
                    <a href="{{ route('admin.projects.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        View all projects →
                    </a>
                </div>
            @else
                <p class="text-gray-500">No projects yet. <a href="{{ route('admin.projects.create') }}" class="text-blue-600 hover:text-blue-800">Create your first project</a></p>
            @endif
        </div>
    </div>
    
    <!-- Recent Achievements -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6 border-b">
            <h3 class="text-lg font-semibold text-gray-800">Recent Achievements</h3>
        </div>
        <div class="p-6">
            @if($recentAchievements->count() > 0)
                <div class="space-y-4">
                    @foreach($recentAchievements as $achievement)
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-medium text-gray-800">{{ $achievement->title }}</h4>
                                <p class="text-sm text-gray-600">{{ $achievement->organization }}</p>
                                <p class="text-xs text-gray-500">{{ $achievement->date_achieved->format('M Y') }}</p>
                            </div>
                            <a href="{{ route('admin.achievements.edit', $achievement) }}" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 pt-4 border-t">
                    <a href="{{ route('admin.achievements.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        View all achievements →
                    </a>
                </div>
            @else
                <p class="text-gray-500">No achievements yet. <a href="{{ route('admin.achievements.create') }}" class="text-blue-600 hover:text-blue-800">Add your first achievement</a></p>
            @endif
        </div>
    </div>
</div>

<div class="mt-8">
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-info-circle text-blue-500 text-xl"></i>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-blue-800">Quick Start Guide</h3>
                <div class="mt-2 text-sm text-blue-700">
                    <ul class="list-disc list-inside space-y-1">
                        @unless($stats['has_personal_details'])
                            <li><a href="{{ route('admin.personal-details.create') }}" class="underline hover:text-blue-900">Set up your personal details</a></li>
                        @endunless
                        @if($stats['projects_count'] === 0)
                            <li><a href="{{ route('admin.projects.create') }}" class="underline hover:text-blue-900">Add your first project</a></li>
                        @endif
                        @if($stats['skills_count'] === 0)
                            <li><a href="{{ route('admin.skills.create') }}" class="underline hover:text-blue-900">Add your skills</a></li>
                        @endif
                        @if($stats['experiences_count'] === 0)
                            <li><a href="{{ route('admin.experiences.create') }}" class="underline hover:text-blue-900">Add your work experience</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection