@extends('admin.layout')

@section('title', 'Add Project')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Add New Project</h2>
    <a href="{{ route('admin.projects.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-arrow-left mr-2"></i>Back to Projects
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Project Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" placeholder="Enter project name">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Project Type</label>
                <select name="type" id="type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('type') border-red-500 @enderror">
                    <option value="">Select Type</option>
                    <option value="personal" {{ old('type') == 'personal' ? 'selected' : '' }}>Personal</option>
                    <option value="client" {{ old('type') == 'client' ? 'selected' : '' }}>Client</option>
                    <option value="academic" {{ old('type') == 'academic' ? 'selected' : '' }}>Academic</option>
                </select>
                @error('type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('status') border-red-500 @enderror">
                    <option value="">Select Status</option>
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="in-progress" {{ old('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="reference" class="block text-sm font-medium text-gray-700 mb-2">Reference (Optional)</label>
                <input type="text" name="reference" id="reference" value="{{ old('reference') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('reference') border-red-500 @enderror" placeholder="Reference person or company">
                @error('reference')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" placeholder="Describe your project...">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div>
                <label for="github_url" class="block text-sm font-medium text-gray-700 mb-2">GitHub URL (Optional)</label>
                <input type="url" name="github_url" id="github_url" value="{{ old('github_url') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('github_url') border-red-500 @enderror" placeholder="https://github.com/username/repo">
                @error('github_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="demo_url" class="block text-sm font-medium text-gray-700 mb-2">Demo URL (Optional)</label>
                <input type="url" name="demo_url" id="demo_url" value="{{ old('demo_url') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('demo_url') border-red-500 @enderror" placeholder="https://example.com">
                @error('demo_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="tools" class="block text-sm font-medium text-gray-700 mb-2">Tools/Technologies Used</label>
            <div id="tools-container">
                <div class="flex items-center mb-2">
                    <input type="text" name="tools[]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., Laravel, React, MySQL">
                    <button type="button" onclick="addTool()" class="ml-2 px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            @error('tools')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6">
            <label for="keywords" class="block text-sm font-medium text-gray-700 mb-2">Keywords (Optional)</label>
            <div id="keywords-container">
                <div class="flex items-center mb-2">
                    <input type="text" name="keywords[]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., web development, responsive">
                    <button type="button" onclick="addKeyword()" class="ml-2 px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="mt-6">
            <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Project Images (Optional)</label>
            <input type="file" name="images[]" id="images" multiple accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('images') border-red-500 @enderror">
            <p class="mt-1 text-sm text-gray-500">You can select multiple images. Max size: 2MB per image.</p>
            @error('images')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6 flex space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save mr-2"></i>Create Project
            </button>
            <a href="{{ route('admin.projects.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-times mr-2"></i>Cancel
            </a>
        </div>
    </form>
</div>

<script>
function addTool() {
    const container = document.getElementById('tools-container');
    const div = document.createElement('div');
    div.className = 'flex items-center mb-2';
    div.innerHTML = `
        <input type="text" name="tools[]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., Laravel, React, MySQL">
        <button type="button" onclick="removeTool(this)" class="ml-2 px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">
            <i class="fas fa-minus"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeTool(button) {
    button.parentElement.remove();
}

function addKeyword() {
    const container = document.getElementById('keywords-container');
    const div = document.createElement('div');
    div.className = 'flex items-center mb-2';
    div.innerHTML = `
        <input type="text" name="keywords[]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="e.g., web development, responsive">
        <button type="button" onclick="removeKeyword(this)" class="ml-2 px-3 py-2 bg-red-600 text-white rounded hover:bg-red-700">
            <i class="fas fa-minus"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeKeyword(button) {
    button.parentElement.remove();
}
</script>
@endsection
