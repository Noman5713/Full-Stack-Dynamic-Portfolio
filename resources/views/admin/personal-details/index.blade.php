@extends('admin.layout')

@section('title', 'Personal Details')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Personal Details</h2>
    @if(!$personalDetail)
        <a href="{{ route('admin.personal-details.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus mr-2"></i>Add Personal Details
        </a>
    @endif
</div>

@if($personalDetail)
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Basic Information</h3>
                <div class="space-y-3">
                    <div>
                        <span class="font-medium text-gray-600">Name:</span>
                        <span class="ml-2">{{ auth()->user()->name }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Email:</span>
                        <span class="ml-2">{{ auth()->user()->email }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Age:</span>
                        <span class="ml-2">{{ $personalDetail->age }} years</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Gender:</span>
                        <span class="ml-2">{{ ucfirst($personalDetail->gender) }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Date of Birth:</span>
                        <span class="ml-2">{{ $personalDetail->dob->format('M d, Y') }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Blood Group:</span>
                        <span class="ml-2">{{ $personalDetail->blood_group }}</span>
                    </div>
                </div>
            </div>
            
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Professional Information</h3>
                <div class="space-y-3">
                    <div>
                        <span class="font-medium text-gray-600">Department:</span>
                        <span class="ml-2">{{ $personalDetail->department }}</span>
                    </div>
                    <div>
                        <span class="font-medium text-gray-600">Address:</span>
                        <span class="ml-2">{{ $personalDetail->address }}</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Description</h3>
            <p class="text-gray-700 leading-relaxed">{{ $personalDetail->description }}</p>
        </div>
        
        <div class="mt-6 flex space-x-4">
            <a href="{{ route('admin.personal-details.edit', $personalDetail) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-edit mr-2"></i>Edit Details
            </a>
            <form action="{{ route('admin.personal-details.destroy', $personalDetail) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to delete your personal details?')">
                    <i class="fas fa-trash mr-2"></i>Delete Details
                </button>
            </form>
        </div>
    </div>
@else
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-center">
            <i class="fas fa-user text-gray-400 text-6xl mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No personal details yet</h3>
            <p class="text-gray-500 mb-4">Add your personal information to complete your portfolio profile.</p>
            <a href="{{ route('admin.personal-details.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-plus mr-2"></i>Add Personal Details
            </a>
        </div>
    </div>
@endif
@endsection
