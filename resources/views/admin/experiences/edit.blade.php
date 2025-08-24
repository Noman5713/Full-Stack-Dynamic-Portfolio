@extends('admin.layout')

@section('title', 'Edit Experience')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Edit Experience</h2>
    <a href="{{ route('admin.experiences.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-arrow-left mr-2"></i>Back to Experiences
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.experiences.update', $experience) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Job Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $experience->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('title') border-red-500 @enderror" placeholder="e.g., Software Developer">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="company" class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                <input type="text" name="company" id="company" value="{{ old('company', $experience->company) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('company') border-red-500 @enderror" placeholder="e.g., Tech Solutions Ltd.">
                @error('company')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Location (Optional)</label>
                <input type="text" name="location" id="location" value="{{ old('location', $experience->location) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('location') border-red-500 @enderror" placeholder="e.g., Dhaka, Bangladesh">
                @error('location')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="employment_type" class="block text-sm font-medium text-gray-700 mb-2">Employment Type</label>
                <select name="employment_type" id="employment_type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('employment_type') border-red-500 @enderror">
                    <option value="">Select Type</option>
                    <option value="full-time" {{ old('employment_type', $experience->employment_type) == 'full-time' ? 'selected' : '' }}>Full-time</option>
                    <option value="part-time" {{ old('employment_type', $experience->employment_type) == 'part-time' ? 'selected' : '' }}>Part-time</option>
                    <option value="contract" {{ old('employment_type', $experience->employment_type) == 'contract' ? 'selected' : '' }}>Contract</option>
                    <option value="freelance" {{ old('employment_type', $experience->employment_type) == 'freelance' ? 'selected' : '' }}>Freelance</option>
                    <option value="internship" {{ old('employment_type', $experience->employment_type) == 'internship' ? 'selected' : '' }}>Internship</option>
                    <option value="volunteer" {{ old('employment_type', $experience->employment_type) == 'volunteer' ? 'selected' : '' }}>Volunteer</option>
                </select>
                @error('employment_type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $experience->start_date?->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('start_date') border-red-500 @enderror">
                @error('start_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">End Date (Optional)</label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $experience->end_date?->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('end_date') border-red-500 @enderror">
                <p class="mt-1 text-sm text-gray-500">Leave blank if currently working here</p>
                @error('end_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Job Description (Optional)</label>
            <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" placeholder="Describe your role, responsibilities, achievements...">{{ old('description', $experience->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Key Responsibilities -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Key Responsibilities</label>
            <div id="responsibilities-container">
                @if($experience->responsibilities && count($experience->responsibilities) > 0)
                    @foreach($experience->responsibilities as $responsibility)
                        <div class="responsibility-item flex items-center space-x-2 mb-2">
                            <input type="text" name="responsibilities[]" value="{{ $responsibility }}" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., Developed web applications using Laravel">
                            <button type="button" class="remove-responsibility bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endforeach
                @else
                    <div class="responsibility-item flex items-center space-x-2 mb-2">
                        <input type="text" name="responsibilities[]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., Developed web applications using Laravel">
                        <button type="button" class="remove-responsibility bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif
            </div>
            <button type="button" id="add-responsibility" class="mt-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                <i class="fas fa-plus mr-1"></i>Add Responsibility
            </button>
        </div>
        
        <!-- Technologies Used -->
        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Technologies Used</label>
            <div id="technologies-container">
                @if($experience->technologies && count($experience->technologies) > 0)
                    @foreach($experience->technologies as $technology)
                        <div class="technology-item flex items-center space-x-2 mb-2">
                            <input type="text" name="technologies[]" value="{{ $technology }}" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., PHP, Laravel, MySQL">
                            <button type="button" class="remove-technology bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endforeach
                @else
                    <div class="technology-item flex items-center space-x-2 mb-2">
                        <input type="text" name="technologies[]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., PHP, Laravel, MySQL">
                        <button type="button" class="remove-technology bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif
            </div>
            <button type="button" id="add-technology" class="mt-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded text-sm">
                <i class="fas fa-plus mr-1"></i>Add Technology
            </button>
        </div>
        
        <div class="mt-6 flex space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save mr-2"></i>Update Experience
            </button>
            <a href="{{ route('admin.experiences.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-times mr-2"></i>Cancel
            </a>
        </div>
    </form>
</div>

<script>
// Add/Remove Responsibilities
document.getElementById('add-responsibility').addEventListener('click', function() {
    const container = document.getElementById('responsibilities-container');
    const newItem = document.createElement('div');
    newItem.className = 'responsibility-item flex items-center space-x-2 mb-2';
    newItem.innerHTML = `
        <input type="text" name="responsibilities[]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., Developed web applications using Laravel">
        <button type="button" class="remove-responsibility bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(newItem);
});

document.getElementById('responsibilities-container').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-responsibility') || e.target.parentElement.classList.contains('remove-responsibility')) {
        const item = e.target.closest('.responsibility-item');
        if (document.querySelectorAll('.responsibility-item').length > 1) {
            item.remove();
        }
    }
});

// Add/Remove Technologies
document.getElementById('add-technology').addEventListener('click', function() {
    const container = document.getElementById('technologies-container');
    const newItem = document.createElement('div');
    newItem.className = 'technology-item flex items-center space-x-2 mb-2';
    newItem.innerHTML = `
        <input type="text" name="technologies[]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., PHP, Laravel, MySQL">
        <button type="button" class="remove-technology bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
            <i class="fas fa-times"></i>
        </button>
    `;
    container.appendChild(newItem);
});

document.getElementById('technologies-container').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-technology') || e.target.parentElement.classList.contains('remove-technology')) {
        const item = e.target.closest('.technology-item');
        if (document.querySelectorAll('.technology-item').length > 1) {
            item.remove();
        }
    }
});
</script>
@endsection
