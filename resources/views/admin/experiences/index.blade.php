@extends('admin.layout')

@section('title', 'Experience')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Experience</h2>
    <a href="{{ route('admin.experiences.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-plus mr-2"></i>Add Experience
    </a>
</div>

@if($experiences->count() > 0)
    <div class="space-y-6">
        @foreach($experiences as $experience)
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <div class="flex items-center mb-2">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $experience->position }}</h3>
                            @if($experience->is_current)
                                <span class="ml-3 inline-block px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Current</span>
                            @endif
                        </div>
                        <p class="text-gray-700 font-medium">{{ $experience->company }}</p>
                        @if($experience->location)
                            <p class="text-gray-600">{{ $experience->location }}</p>
                        @endif
                        <div class="flex items-center text-sm text-gray-500 mt-2">
                            <span>{{ $experience->start_date->format('M Y') }} - {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}</span>
                        </div>
                        @if($experience->description)
                            <p class="text-gray-700 mt-3">{{ $experience->description }}</p>
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.experiences.edit', $experience) }}" class="text-yellow-600 hover:text-yellow-800">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-center">
            <i class="fas fa-briefcase text-gray-400 text-6xl mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No work experience yet</h3>
            <p class="text-gray-500 mb-4">Add your professional work history and accomplishments.</p>
            <a href="{{ route('admin.experiences.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-plus mr-2"></i>Add Your First Experience
            </a>
        </div>
    </div>
@endif
@endsection
