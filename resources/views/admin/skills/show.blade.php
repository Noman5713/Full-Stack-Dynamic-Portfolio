@extends('admin.layout')

@section('title', 'View Skill')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">{{ $skill->name }}</h2>
    <div class="flex space-x-2">
        <a href="{{ route('admin.skills.edit', $skill) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-edit mr-2"></i>Edit
        </a>
        <a href="{{ route('admin.skills.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-arrow-left mr-2"></i>Back to Skills
        </a>
    </div>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Skill Details</h3>
            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-gray-600">Skill Name:</label>
                    <p class="text-gray-800">{{ $skill->name }}</p>
                </div>
                
                <div>
                    <label class="text-sm font-medium text-gray-600">Category:</label>
                    <span class="inline-block bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm capitalize">
                        {{ $skill->category }}
                    </span>
                </div>
            </div>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Proficiency</h3>
            <div class="space-y-3">
                <div>
                    <label class="text-sm font-medium text-gray-600">Proficiency Level:</label>
                    <div class="flex items-center space-x-2">
                        <div class="flex-1 bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ ($skill->proficiency_level / 10) * 100 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-800">{{ $skill->proficiency_level }}/10</span>
                    </div>
                </div>
                
                <div>
                    <label class="text-sm font-medium text-gray-600">Years of Experience:</label>
                    <p class="text-gray-800">{{ $skill->years_of_experience }} years</p>
                </div>
            </div>
        </div>
    </div>
    
    @if($skill->description)
    <div class="mt-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-2">Description</h3>
        <p class="text-gray-700">{{ $skill->description }}</p>
    </div>
    @endif
    
    <div class="mt-6 text-sm text-gray-500">
        <p>Created: {{ $skill->created_at->format('F j, Y \a\t g:i A') }}</p>
        @if($skill->updated_at->ne($skill->created_at))
            <p>Last Updated: {{ $skill->updated_at->format('F j, Y \a\t g:i A') }}</p>
        @endif
    </div>
</div>
@endsection
