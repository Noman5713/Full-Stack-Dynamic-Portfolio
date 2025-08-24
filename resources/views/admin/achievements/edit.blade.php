@extends('admin.layout')

@section('title', 'Edit Achievement')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Edit Achievement</h2>
    <a href="{{ route('admin.achievements.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-arrow-left mr-2"></i>Back to Achievements
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.achievements.update', $achievement) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Achievement Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $achievement->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" placeholder="e.g., Best Student Award">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="organization" class="block text-sm font-medium text-gray-700 mb-2">Organization (Optional)</label>
                <input type="text" name="organization" id="organization" value="{{ old('organization', $achievement->organization) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('organization') border-red-500 @enderror" placeholder="e.g., University of Dhaka">
                @error('organization')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <select name="category" id="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('category') border-red-500 @enderror">
                    <option value="">Select Category</option>
                    <option value="academic" {{ old('category', $achievement->category) == 'academic' ? 'selected' : '' }}>Academic</option>
                    <option value="professional" {{ old('category', $achievement->category) == 'professional' ? 'selected' : '' }}>Professional</option>
                    <option value="competition" {{ old('category', $achievement->category) == 'competition' ? 'selected' : '' }}>Competition</option>
                    <option value="certification" {{ old('category', $achievement->category) == 'certification' ? 'selected' : '' }}>Certification</option>
                    <option value="publication" {{ old('category', $achievement->category) == 'publication' ? 'selected' : '' }}>Publication</option>
                    <option value="volunteer" {{ old('category', $achievement->category) == 'volunteer' ? 'selected' : '' }}>Volunteer</option>
                    <option value="leadership" {{ old('category', $achievement->category) == 'leadership' ? 'selected' : '' }}>Leadership</option>
                    <option value="other" {{ old('category', $achievement->category) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="date_received" class="block text-sm font-medium text-gray-700 mb-2">Date Received</label>
                <input type="date" name="date_received" id="date_received" value="{{ old('date_received', $achievement->date_received?->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('date_received') border-red-500 @enderror">
                @error('date_received')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" placeholder="Describe this achievement...">{{ old('description', $achievement->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6 flex space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save mr-2"></i>Update Achievement
            </button>
            <a href="{{ route('admin.achievements.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-times mr-2"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
