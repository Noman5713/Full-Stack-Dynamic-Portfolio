@extends('admin.layout')

@section('title', 'Skills')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Skills</h2>
    <a href="{{ route('admin.skills.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <i class="fas fa-plus mr-2"></i>Add Skill
    </a>
</div>

@if($skills->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Technical Skills -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                <i class="fas fa-code mr-2 text-blue-600"></i>Technical Skills
            </h3>
            <div class="space-y-3">
                @forelse($skills->where('category', 'technical') as $skill)
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                        <div>
                            <span class="font-medium text-gray-800">{{ $skill->name }}</span>
                            <span class="ml-2 inline-block px-2 py-1 text-xs rounded-full 
                                {{ $skill->level === 'expert' ? 'bg-green-100 text-green-800' : 
                                   ($skill->level === 'intermediate' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                {{ ucfirst($skill->level) }}
                            </span>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.skills.edit', $skill) }}" class="text-yellow-600 hover:text-yellow-800">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 italic">No technical skills added yet.</p>
                @endforelse
            </div>
        </div>

        <!-- Soft Skills -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">
                <i class="fas fa-users mr-2 text-purple-600"></i>Soft Skills
            </h3>
            <div class="space-y-3">
                @forelse($skills->where('category', 'soft') as $skill)
                    <div class="flex justify-between items-center p-3 bg-gray-50 rounded">
                        <div>
                            <span class="font-medium text-gray-800">{{ $skill->name }}</span>
                            <span class="ml-2 inline-block px-2 py-1 text-xs rounded-full 
                                {{ $skill->level === 'expert' ? 'bg-green-100 text-green-800' : 
                                   ($skill->level === 'intermediate' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                                {{ ucfirst($skill->level) }}
                            </span>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.skills.edit', $skill) }}" class="text-yellow-600 hover:text-yellow-800">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 italic">No soft skills added yet.</p>
                @endforelse
            </div>
        </div>
    </div>
@else
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-center">
            <i class="fas fa-cogs text-gray-400 text-6xl mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No skills yet</h3>
            <p class="text-gray-500 mb-4">Start building your skill portfolio by adding your technical and soft skills.</p>
            <a href="{{ route('admin.skills.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fas fa-plus mr-2"></i>Add Your First Skill
            </a>
        </div>
    </div>
@endif
@endsection
