<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Portfolio Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/2f43c56358.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white">
            <div class="p-4">
                <h2 class="text-xl font-bold">Portfolio Admin</h2>
            </div>
            
            <nav class="mt-8">
                <div class="px-4 py-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-2 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                </div>
                
                <div class="px-4 py-2">
                    <a href="{{ route('admin.personal-details.index') }}" class="flex items-center px-2 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md {{ request()->routeIs('admin.personal-details.*') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-user mr-3"></i>
                        Personal Details
                    </a>
                </div>
                
                <div class="px-4 py-2">
                    <a href="{{ route('admin.projects.index') }}" class="flex items-center px-2 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md {{ request()->routeIs('admin.projects.*') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-project-diagram mr-3"></i>
                        Projects
                    </a>
                </div>
                
                <div class="px-4 py-2">
                    <a href="{{ route('admin.skills.index') }}" class="flex items-center px-2 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md {{ request()->routeIs('admin.skills.*') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-cogs mr-3"></i>
                        Skills
                    </a>
                </div>
                
                <div class="px-4 py-2">
                    <a href="{{ route('admin.achievements.index') }}" class="flex items-center px-2 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md {{ request()->routeIs('admin.achievements.*') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-trophy mr-3"></i>
                        Achievements
                    </a>
                </div>
                
                <div class="px-4 py-2">
                    <a href="{{ route('admin.education.index') }}" class="flex items-center px-2 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md {{ request()->routeIs('admin.education.*') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-graduation-cap mr-3"></i>
                        Education
                    </a>
                </div>
                
                <div class="px-4 py-2">
                    <a href="{{ route('admin.experiences.index') }}" class="flex items-center px-2 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md {{ request()->routeIs('admin.experiences.*') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="fas fa-briefcase mr-3"></i>
                        Experience
                    </a>
                </div>
                
                <div class="px-4 py-2 mt-8">
                    <a href="{{ url('/') }}" class="flex items-center px-2 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md" target="_blank">
                        <i class="fas fa-external-link-alt mr-3"></i>
                        View Portfolio
                    </a>
                </div>
                
                <div class="px-4 py-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center px-2 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-md w-full text-left">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b">
                <div class="px-6 py-4">
                    <div class="flex justify-between items-center">
                        <h1 class="text-2xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-600">Welcome, {{ auth()->user()->name }}</span>
                            <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-gray-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
