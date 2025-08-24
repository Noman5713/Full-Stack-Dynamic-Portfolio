@extends('admin.layout')

@section('title', 'Edit Education')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Edit Education Record</h2>
    <a href="{{ route('admin.education.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-arrow-left mr-2"></i>Back to Education
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.education.update', $education) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="institution" class="block text-sm font-medium text-gray-700 mb-2">Institution</label>
                <input type="text" name="institution" id="institution" value="{{ old('institution', $education->institution) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('institution') border-red-500 @enderror" placeholder="e.g., University of Dhaka">
                @error('institution')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="degree" class="block text-sm font-medium text-gray-700 mb-2">Degree</label>
                <input type="text" name="degree" id="degree" value="{{ old('degree', $education->degree) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('degree') border-red-500 @enderror" placeholder="e.g., Bachelor of Science">
                @error('degree')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="field_of_study" class="block text-sm font-medium text-gray-700 mb-2">Field of Study (Optional)</label>
                <input type="text" name="field_of_study" id="field_of_study" value="{{ old('field_of_study', $education->field_of_study) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('field_of_study') border-red-500 @enderror" placeholder="e.g., Computer Science">
                @error('field_of_study')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="grade" class="block text-sm font-medium text-gray-700 mb-2">Grade/GPA (Optional)</label>
                <input type="text" name="grade" id="grade" value="{{ old('grade', $education->grade) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('grade') border-red-500 @enderror" placeholder="e.g., 3.75/4.00, First Class">
                @error('grade')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $education->start_date?->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('start_date') border-red-500 @enderror">
                @error('start_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">End Date (Optional)</label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $education->end_date?->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('end_date') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Leave blank if currently studying</p>
                @error('end_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description (Optional)</label>
            <textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" placeholder="Describe your studies, achievements, activities...">{{ old('description', $education->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6 flex space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save mr-2"></i>Update Education
            </button>
            <a href="{{ route('admin.education.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-times mr-2"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
