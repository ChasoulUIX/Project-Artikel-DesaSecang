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
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
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
                            <img class="h-9 w-9 rounded-full object-cover ring-2 ring-blue-100" src="https://ui-avatars.com/api/?name=Admin&background=3b82f6&color=fff" alt="Profile">
                            <span class="hidden md:block font-medium">Admin</span>
                            <i class="fas fa-chevron-down text-sm opacity-70"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 hidden group-hover:block border border-gray-100">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">Settings</a>
                            <hr class="my-2 border-gray-100">
                            <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-50">Logout</a>
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
                <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg text-white bg-blue-700">
                    <i class="fas fa-home text-white mr-3"></i>
                    Dashboard
                </a>
                
                <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg text-blue-100 hover:text-white hover:bg-blue-700 transition-all duration-150">
                    <i class="fas fa-newspaper text-blue-200 group-hover:text-white mr-3 transition-colors"></i>
                    Artikel
                </a>

                <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg text-blue-100 hover:text-white hover:bg-blue-700 transition-all duration-150">
                    <i class="fas fa-list text-blue-200 group-hover:text-white mr-3 transition-colors"></i>
                    Kategori
                </a>

                <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg text-blue-100 hover:text-white hover:bg-blue-700 transition-all duration-150">
                    <i class="fas fa-users text-blue-200 group-hover:text-white mr-3 transition-colors"></i>
                    Users
                </a>

                <a href="#" class="group flex items-center px-4 py-3 text-sm font-medium rounded-lg text-blue-100 hover:text-white hover:bg-blue-700 transition-all duration-150">
                    <i class="fas fa-cog text-blue-200 group-hover:text-white mr-3 transition-colors"></i>
                    Settings
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="lg:ml-64 pt-16">
        <div class="p-6 max-w-7xl mx-auto">
            @yield('content')
        </div>
    </main>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>
</body>
</html>
