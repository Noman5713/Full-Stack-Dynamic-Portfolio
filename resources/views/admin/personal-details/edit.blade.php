@extends('admin.layout')

@section('title', 'Edit Personal Details')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Edit Personal Details</h2>
    <a href="{{ route('admin.personal-details.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-arrow-left mr-2"></i>Back to Personal Details
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <form action="{{ route('admin.personal-details.update', $personalDetail) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror" placeholder="Write a brief description about yourself...">{{ old('description', $personalDetail->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="department" class="block text-sm font-medium text-gray-700 mb-2">Department</label>
                <input type="text" name="department" id="department" value="{{ old('department', $personalDetail->department) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('department') border-red-500 @enderror" placeholder="e.g., Computer Science">
                @error('department')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="age" class="block text-sm font-medium text-gray-700 mb-2">Age</label>
                <input type="number" name="age" id="age" value="{{ old('age', $personalDetail->age) }}" min="1" max="120" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('age') border-red-500 @enderror" placeholder="25">
                @error('age')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="dob" class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                <input type="date" name="dob" id="dob" value="{{ old('dob', $personalDetail->dob->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('dob') border-red-500 @enderror">
                @error('dob')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                <select name="gender" id="gender" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('gender') border-red-500 @enderror">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender', $personalDetail->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $personalDetail->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $personalDetail->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label for="blood_group" class="block text-sm font-medium text-gray-700 mb-2">Blood Group</label>
                <select name="blood_group" id="blood_group" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('blood_group') border-red-500 @enderror">
                    <option value="">Select Blood Group</option>
                    <option value="A+" {{ old('blood_group', $personalDetail->blood_group) == 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ old('blood_group', $personalDetail->blood_group) == 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ old('blood_group', $personalDetail->blood_group) == 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ old('blood_group', $personalDetail->blood_group) == 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{ old('blood_group', $personalDetail->blood_group) == 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ old('blood_group', $personalDetail->blood_group) == 'AB-' ? 'selected' : '' }}>AB-</option>
                    <option value="O+" {{ old('blood_group', $personalDetail->blood_group) == 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ old('blood_group', $personalDetail->blood_group) == 'O-' ? 'selected' : '' }}>O-</option>
                </select>
                @error('blood_group')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="mt-6">
            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
            <textarea name="address" id="address" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('address') border-red-500 @enderror" placeholder="Enter your full address...">{{ old('address', $personalDetail->address) }}</textarea>
            @error('address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mt-6 flex space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-save mr-2"></i>Update Personal Details
            </button>
            <a href="{{ route('admin.personal-details.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-times mr-2"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
