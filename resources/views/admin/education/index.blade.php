@extends('admin.layout')

@section('title', 'Education')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Education</h2>
    <a href="{{ route('admin.education.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-plus mr-2"></i>Add Education
    </a>
</div>

@if($education->count() > 0)
    <div class="space-y-6">
        @foreach($education as $edu)
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $edu->degree }}</h3>
                        @if($edu->field_of_study)
                            <p class="text-gray-600">{{ $edu->field_of_study }}</p>
                        @endif
                        <p class="text-gray-700 font-medium">{{ $edu->institution }}</p>
                        <div class="flex items-center text-sm text-gray-500 mt-2">
                            <span>{{ $edu->start_date->format('Y') }} - {{ $edu->end_date ? $edu->end_date->format('Y') : 'Present' }}</span>
                            @if($edu->grade)
                                <span class="ml-4">Grade: {{ $edu->grade }}</span>
                            @endif
                        </div>
                        @if($edu->description)
                            <p class="text-gray-700 mt-2">{{ $edu->description }}</p>
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.education.edit', $edu) }}" class="text-yellow-600 hover:text-yellow-800">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.education.destroy', $edu) }}" method="POST" class="inline">
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
            <i class="fas fa-graduation-cap text-gray-400 text-6xl mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No education records yet</h3>
            <p class="text-gray-500 mb-4">Add your academic background and qualifications.</p>
            <a href="{{ route('admin.education.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-plus mr-2"></i>Add Your First Education
            </a>
        </div>
    </div>
@endif
@endsection
