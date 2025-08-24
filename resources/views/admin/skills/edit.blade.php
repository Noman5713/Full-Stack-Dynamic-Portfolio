@extends('admin.layout')

@section('title', 'Edit Skill')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Edit Skill</h2>
    <a href="{{ route('admin.skills.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-arrow-left mr-2"></i>Back to Skills
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Skill Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $skill->name) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" placeholder="e.g., Laravel, JavaScript">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <select name="category" id="category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('category') border-red-500 @enderror">
                    <option value="">Select Category</option>
                    <option value="programming" {{ old('category', $skill->category) == 'programming' ? 'selected' : '' }}>Programming Languages</option>
                    <option value="framework" {{ old('category', $skill->category) == 'framework' ? 'selected' : '' }}>Frameworks</option>
                    <option value="database" {{ old('category', $skill->category) == 'database' ? 'selected' : '' }}>Databases</option>
                    <option value="frontend" {{ old('category', $skill->category) == 'frontend' ? 'selected' : '' }}>Frontend</option>
                    <option value="backend" {{ old('category', $skill->category) == 'backend' ? 'selected' : '' }}>Backend</option>
                    <option value="devops" {{ old('category', $skill->category) == 'devops' ? 'selected' : '' }}>DevOps</option>
                    <option value="mobile" {{ old('category', $skill->category) == 'mobile' ? 'selected' : '' }}>Mobile Development</option>
                    <option value="design" {{ old('category', $skill->category) == 'design' ? 'selected' : '' }}>Design</option>
                    <option value="other" {{ old('category', $skill->category) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="proficiency_level" class="block text-sm font-medium text-gray-700 mb-2">Proficiency Level (1-10)</label>
                <input type="number" name="proficiency_level" id="proficiency_level" min="1" max="10" value="{{ old('proficiency_level', $skill->proficiency_level) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('proficiency_level') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">1 = Beginner, 5 = Intermediate, 10 = Expert</p>
                @error('proficiency_level')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="years_of_experience" class="block text-sm font-medium text-gray-700 mb-2">Years of Experience</label>
                <input type="number" name="years_of_experience" id="years_of_experience" min="0" step="0.5" value="{{ old('years_of_experience', $skill->years_of_experience) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('years_of_experience') border-red-500 @enderror">
                @error('years_of_experience')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description (Optional)</label>
            <textarea name="description" id="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" placeholder="Describe your experience with this skill...">{{ old('description', $skill->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6 flex space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save mr-2"></i>Update Skill
            </button>
            <a href="{{ route('admin.skills.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-times mr-2"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
