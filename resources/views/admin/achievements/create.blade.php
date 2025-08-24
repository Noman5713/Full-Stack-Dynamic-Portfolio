@extends('admin.layout')

@section('title', 'Add Achievement')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Add New Achievement</h2>
    <a href="{{ route('admin.achievements.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-arrow-left mr-2"></i>Back to Achievements
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.achievements.store') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Achievement Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" placeholder="e.g., Best Developer Award">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                <select name="type" id="type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('type') border-red-500 @enderror">
                    <option value="">Select Type</option>
                    <option value="award" {{ old('type') == 'award' ? 'selected' : '' }}>Award</option>
                    <option value="certification" {{ old('type') == 'certification' ? 'selected' : '' }}>Certification</option>
                    <option value="recognition" {{ old('type') == 'recognition' ? 'selected' : '' }}>Recognition</option>
                </select>
                @error('type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="organization" class="block text-sm font-medium text-gray-700 mb-2">Organization</label>
                <input type="text" name="organization" id="organization" value="{{ old('organization') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('organization') border-red-500 @enderror" placeholder="e.g., Google, AWS, University">
                @error('organization')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="date_achieved" class="block text-sm font-medium text-gray-700 mb-2">Date Achieved</label>
                <input type="date" name="date_achieved" id="date_achieved" value="{{ old('date_achieved') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('date_achieved') border-red-500 @enderror">
                @error('date_achieved')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description (Optional)</label>
            <textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" placeholder="Describe the achievement...">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6">
            <label for="certificate_url" class="block text-sm font-medium text-gray-700 mb-2">Certificate URL (Optional)</label>
            <input type="url" name="certificate_url" id="certificate_url" value="{{ old('certificate_url') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('certificate_url') border-red-500 @enderror" placeholder="https://certificates.example.com/verify">
            @error('certificate_url')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6 flex space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save mr-2"></i>Add Achievement
            </button>
            <a href="{{ route('admin.achievements.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-times mr-2"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
