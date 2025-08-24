@extends('admin.layout')

@section('title', 'Achievements')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Achievements</h2>
    <a href="{{ route('admin.achievements.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-plus mr-2"></i>Add Achievement
    </a>
</div>

@if($achievements->count() > 0)
    <div class="space-y-6">
        @foreach($achievements as $achievement)
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <div class="flex items-center mb-2">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $achievement->title }}</h3>
                            <span class="ml-3 inline-block px-2 py-1 text-xs rounded-full {{ $achievement->type === 'award' ? 'bg-yellow-100 text-yellow-800' : ($achievement->type === 'certification' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                                {{ ucfirst($achievement->type) }}
                            </span>
                        </div>
                        <p class="text-gray-600 mb-2">{{ $achievement->organization }}</p>
                        @if($achievement->description)
                            <p class="text-gray-700 mb-2">{{ $achievement->description }}</p>
                        @endif
                        <p class="text-sm text-gray-500">{{ $achievement->date_achieved->format('M Y') }}</p>
                        @if($achievement->certificate_url)
                            <a href="{{ $achievement->certificate_url }}" target="_blank" class="inline-block mt-2 text-blue-600 hover:text-blue-800">
                                <i class="fas fa-external-link-alt mr-1"></i>View Certificate
                            </a>
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.achievements.edit', $achievement) }}" class="text-yellow-600 hover:text-yellow-800">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST" class="inline">
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
            <i class="fas fa-trophy text-gray-400 text-6xl mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No achievements yet</h3>
            <p class="text-gray-500 mb-4">Showcase your awards, certifications, and recognitions.</p>
            <a href="{{ route('admin.achievements.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-plus mr-2"></i>Add Your First Achievement
            </a>
        </div>
    </div>
@endif
@endsection
