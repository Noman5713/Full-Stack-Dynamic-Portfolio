@extends('admin.layout')

@section('title', 'View Project')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">{{ $project->name }}</h2>
    <div class="flex space-x-2">
        <a href="{{ route('admin.projects.edit', $project) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-edit mr-2"></i>Edit Project
        </a>
        <a href="{{ route('admin.projects.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-arrow-left mr-2"></i>Back to Projects
        </a>
    </div>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2">
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Description</h3>
                <p class="text-gray-700 leading-relaxed">{{ $project->description }}</p>
            </div>
            
            @if($project->tools && count($project->tools) > 0)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Tools & Technologies</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($project->tools as $tool)
                        <span class="inline-block px-3 py-1 text-sm bg-blue-100 text-blue-800 rounded-full">{{ $tool }}</span>
                    @endforeach
                </div>
            </div>
            @endif
            
            @if($project->keywords && count($project->keywords) > 0)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Keywords</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($project->keywords as $keyword)
                        <span class="inline-block px-3 py-1 text-sm bg-gray-100 text-gray-800 rounded-full">{{ $keyword }}</span>
                    @endforeach
                </div>
            </div>
            @endif
            
            @if($project->images && count($project->images) > 0)
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Project Images</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($project->images as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Project Image" class="w-full h-32 object-cover rounded-lg shadow">
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        
        <div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Project Details</h3>
                
                <div class="space-y-3">
                    <div>
                        <span class="font-medium text-gray-600">Type:</span>
                        <span class="ml-2 inline-block px-2 py-1 text-xs rounded-full {{ $project->type === 'personal' ? 'bg-blue-100 text-blue-800' : ($project->type === 'client' ? 'bg-green-100 text-green-800' : 'bg-purple-100 text-purple-800') }}">
                            {{ ucfirst($project->type) }}
                        </span>
                    </div>
                    
                    <div>
                        <span class="font-medium text-gray-600">Status:</span>
                        <span class="ml-2 inline-block px-2 py-1 text-xs rounded-full {{ $project->status === 'active' ? 'bg-green-100 text-green-800' : ($project->status === 'in-progress' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                            {{ ucfirst($project->status) }}
                        </span>
                    </div>
                    
                    @if($project->reference)
                    <div>
                        <span class="font-medium text-gray-600">Reference:</span>
                        <span class="ml-2">{{ $project->reference }}</span>
                    </div>
                    @endif
                    
                    <div>
                        <span class="font-medium text-gray-600">Created:</span>
                        <span class="ml-2">{{ $project->created_at->format('M d, Y') }}</span>
                    </div>
                    
                    <div>
                        <span class="font-medium text-gray-600">Last Updated:</span>
                        <span class="ml-2">{{ $project->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
                
                @if($project->github_url || $project->demo_url)
                <div class="mt-6 pt-4 border-t">
                    <h4 class="font-medium text-gray-800 mb-3">Links</h4>
                    <div class="space-y-2">
                        @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" class="flex items-center text-blue-600 hover:text-blue-800">
                            <i class="fab fa-github mr-2"></i>View on GitHub
                        </a>
                        @endif
                        
                        @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" class="flex items-center text-green-600 hover:text-green-800">
                            <i class="fas fa-external-link-alt mr-2"></i>Live Demo
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
