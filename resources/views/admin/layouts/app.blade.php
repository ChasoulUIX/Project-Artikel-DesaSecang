<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Add Inter font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <!-- Summernote for WYSIWYG Editor -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
    @yield('styles')
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-100 fixed w-full z-50">
        <div class="max-w-full mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center gap-4">
                    <button id="mobile-menu-button" class="lg:hidden hover:bg-gray-100 p-2 rounded-lg transition-colors">
                        <i class="fas fa-bars text-gray-600 text-xl"></i>
                    </button>
                    <img src="{{ asset('images/logoreligi.png') }}" alt="Logo" class="h-8">
                </div>
                
                <div class="flex items-center">
                    <div class="relative group">
                        <button class="flex items-center gap-3 text-gray-700 hover:bg-gray-100 px-4 py-2 rounded-lg transition-all duration-150">
                            <img class="h-9 w-9 rounded-full object-cover ring-2 ring-blue-100" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=3b82f6&color=fff" alt="Profile">
                            <span class="hidden md:block font-medium">{{ Auth::user()->name }}</span>
                            <i class="fas fa-chevron-down text-sm opacity-70"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden group-hover:block border border-gray-100">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                            <hr class="my-2 border-gray-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-50">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="fixed left-0 top-16 w-64 h-full bg-blue-800 border-r border-blue-700 shadow-sm transform -translate-x-full lg:translate-x-0 transition-transform duration-150 ease-in z-40" id="sidebar">
        <div class="overflow-y-auto h-full py-2">
            <nav class="mt-3 px-3 space-y-1">
                <a href="/admin/dashboard" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->is('admin/dashboard') ? 'text-white bg-blue-700' : 'text-blue-100 hover:text-white hover:bg-blue-700' }} transition-all duration-150">
                    <i class="fas fa-home {{ request()->is('admin/dashboard') ? 'text-white' : 'text-blue-200 group-hover:text-white' }} mr-3 transition-colors"></i>
                    Dashboard
                </a>
                
                <a href="{{ route('articles.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('articles.*') ? 'text-white bg-blue-700' : 'text-blue-100 hover:text-white hover:bg-blue-700' }} transition-all duration-150">
                    <i class="fas fa-newspaper {{ request()->routeIs('articles.*') ? 'text-white' : 'text-blue-200 group-hover:text-white' }} mr-3 transition-colors"></i>
                    Artikel
                </a>

                <a href="{{ route('categories.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('categories.*') ? 'text-white bg-blue-700' : 'text-blue-100 hover:text-white hover:bg-blue-700' }} transition-all duration-150">
                    <i class="fas fa-list {{ request()->routeIs('categories.*') ? 'text-white' : 'text-blue-200 group-hover:text-white' }} mr-3 transition-colors"></i>
                    Kategori
                </a>

                <a href="{{ route('user.traffic') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg {{ request()->routeIs('user.traffic') ? 'text-white bg-blue-700' : 'text-blue-100 hover:text-white hover:bg-blue-700' }} transition-all duration-150">
                    <i class="fas fa-chart-line {{ request()->routeIs('user.traffic') ? 'text-white' : 'text-blue-200 group-hover:text-white' }} mr-3 transition-colors"></i>
                    Traffic User
                </a>

                <div class="pt-4 mt-4 border-t border-blue-700">
                    <h6 class="px-4 py-2 text-xs font-semibold text-blue-300 uppercase tracking-wider">Administrasi</h6>
                </div>

                <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg text-blue-100 hover:text-white hover:bg-blue-700 transition-all duration-150">
                    <i class="fas fa-users text-blue-200 group-hover:text-white mr-3 transition-colors"></i>
                    Manajemen User
                </a>

                <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg text-blue-100 hover:text-white hover:bg-blue-700 transition-all duration-150">
                    <i class="fas fa-cog text-blue-200 group-hover:text-white mr-3 transition-colors"></i>
                    Pengaturan
                </a>

                <div class="pt-4 mt-4 border-t border-blue-700">
                    <div class="px-4 py-2">
                        <div class="text-xs font-semibold text-blue-300 uppercase tracking-wider mb-2">Info Server</div>
                        <div class="flex flex-col space-y-1">
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-blue-300">PHP Version:</span>
                                <span class="text-blue-100">{{ phpversion() }}</span>
                            </div>
                            <div class="flex justify-between items-center text-xs">
                                <span class="text-blue-300">Laravel:</span>
                                <span class="text-blue-100">{{ app()->version() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="lg:ml-64 pt-16">
        <div class="p-6 max-w-7xl mx-auto">
            @if(isset($error))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 mx-4 md:mx-6 mt-6 rounded-md">
                    <h3 class="font-bold">Error:</h3>
                    <p>{{ $error }}</p>
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });

        // Global error handling
        window.addEventListener('error', function(e) {
            console.error('Global error caught:', e.error);
            if (document.getElementById('js-error-container')) {
                document.getElementById('js-error-container').innerHTML = 
                    '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md">' +
                    '<h3 class="font-bold">JavaScript Error:</h3>' +
                    '<p>' + e.error.message + '</p>' +
                    '</div>';
                document.getElementById('js-error-container').style.display = 'block';
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>
