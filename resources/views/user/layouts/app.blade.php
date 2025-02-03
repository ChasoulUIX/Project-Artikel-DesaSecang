<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- CSS and other head elements -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Top Navigation Bar -->
    <nav class="bg-white border-b">
        <div class="container mx-auto px-[150px]">
            <div class="flex justify-between items-center h-20">
                <!-- Logo Section (Centered) -->
                <div class="flex-1 flex justify-start">
                    <a href="{{ url('/') }}" class="flex items-center">
                        <img src="{{ asset('images/probolinggo.png') }}" alt="NU Online" class="h-10">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Twitter_Verified_Badge.svg/2048px-Twitter_Verified_Badge.svg.png" alt="Terverifikasi" class="h-6 ml-2">
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" placeholder="Cari Berita" 
                            class="w-64 px-4 py-2 rounded-full bg-gray-100 focus:outline-none focus:ring-1 focus:ring-gray-200">
                        <button class="absolute right-3 top-2">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Theme Toggle -->
                    <div class="flex items-center space-x-3">
                        <button class="w-12 h-6 rounded-full bg-gray-200 flex items-center transition duration-300 focus:outline-none shadow">
                            <div class="w-6 h-6 relative rounded-full transition duration-500 transform bg-white shadow-sm">
                                <svg class="w-4 h-4 text-gray-400 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                </svg>
                            </div>
                        </button>

                        <!-- Language Selector -->
                        <div class="relative">
                            <button class="flex items-center" id="languageButton">
                                <img src="https://flagcdn.com/w40/id.png" alt="Indonesia" class="w-6 h-4">
                                <span class="ml-2 text-sm">ID</span>
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden" id="languageMenu">
                                <div class="py-1">
                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <img src="{{ asset('images/id-flag.png') }}" alt="Indonesia" class="w-6 h-4 mr-2">
                                        Indonesia
                                    </a>
                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <img src="{{ asset('images/gb-flag.png') }}" alt="English" class="w-6 h-4 mr-2">
                                        English
                                    </a>
                                    <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        <img src="{{ asset('images/sa-flag.png') }}" alt="Arabic" class="w-6 h-4 mr-2">
                                        العربية
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Navigation Menu -->
    <div class="bg-blue-900 text-white mx-[280px]">
            <div class="flex justify-center text-sm">
                <a href="#" class="px-4 py-3 hover:bg-blue-800 transition-colors">Home</a>
                <a href="#" class="px-4 py-3 hover:bg-blue-800 transition-colors">Berita</a>
                <div class="group relative">
                    <a href="#" class="px-4 py-3 hover:bg-blue-800 transition-colors flex items-center">
                        Artikel
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </a>
                    <div class="hidden group-hover:block absolute left-0 bg-blue-900 w-48 z-50">
                        <a href="#" class="block px-4 py-2 hover:bg-blue-800 transition-colors">Pendidikan</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-800 transition-colors">Kerukunan</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-800 transition-colors">Politik</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-800 transition-colors">Budaya</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-800 transition-colors">Khutbah</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-800 transition-colors">Doa</a>
                    </div>
                </div>
                <a href="#" class="px-4 py-3 hover:bg-blue-800 transition-colors">Populer</a>
                <a href="#" class="px-4 py-3 hover:bg-blue-800 transition-colors">Tentang Kami</a>
                <a href="#" class="px-4 py-3 hover:bg-blue-800 transition-colors">Hubungi Kami</a>
            </div>
    </div>

    <!-- Secondary Navigation (Regions) -->
    <div class="border-b">
        <div class="container mx-auto px-[150px]">
            <div class="flex items-center justify-between px-4">
                <div class="flex space-x-6 text-sm text-gray-600 py-2">
                    <a href="#" class="hover:text-blue-900">Jawa Timur, Desa Secang</a>
                </div>
                <div class="text-sm text-gray-500">
                    {{ \Carbon\Carbon::now()->format('l, d F Y') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-[150px] py-6">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 py-8">
        <div class="container mx-auto px-[150px]">
            <div class="grid grid-cols-4 gap-8 mb-8">
                <!-- Tentang NU -->
                <div>
                    <h3 class="text-emerald-500 font-medium mb-4">Tentang NU</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li><a href="#" class="hover:text-gray-900">Sejarah</a></li>
                        <li><a href="#" class="hover:text-gray-900">Syuriyah</a></li>
                        <li><a href="#" class="hover:text-gray-900">Tanfidziyah</a></li>
                    </ul>
                </div>

                <!-- Informasi -->
                <div>
                    <h3 class="text-emerald-500 font-medium mb-4">Informasi</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li><a href="#" class="hover:text-gray-900">Redaksi</a></li>
                        <li><a href="#" class="hover:text-gray-900">Kontak Kami</a></li>
                        <li><a href="#" class="hover:text-gray-900">Visi Misi</a></li>
                        <li><a href="#" class="hover:text-gray-900">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-gray-900">Disclaimer</a></li>
                        <li><a href="#" class="hover:text-gray-900">Pedoman Media Siber</a></li>
                    </ul>
                </div>

                <!-- Jaringan Media -->
                <div class="col-span-2">
                    <h3 class="text-emerald-500 font-medium mb-4">Jaringan Media</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <ul class="space-y-2 text-gray-600">
                            <li><a href="#" class="hover:text-gray-900">Jawa Timur</a></li>
                            <li><a href="#" class="hover:text-gray-900">Jawa Barat</a></li>
                            <li><a href="#" class="hover:text-gray-900">Jawa Tengah</a></li>
                            <li><a href="#" class="hover:text-gray-900">Banten</a></li>
                        </ul>
                        <ul class="space-y-2 text-gray-600">
                            <li><a href="#" class="hover:text-gray-900">Lampung</a></li>
                            <li><a href="#" class="hover:text-gray-900">Jakarta</a></li>
                            <li><a href="#" class="hover:text-gray-900">Kepri</a></li>
                            <li><a href="#" class="hover:text-gray-900">Jombang</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Logo and App Store Links -->
            <div class="flex justify-center mb-8">
                <div class="text-center">
                    <img src="{{ asset('images/probolinggo.png') }}" alt="NU Online" class="h-12 mx-auto mb-4">
                    
                </div>
            </div>

            <!-- Copyright and Social Media -->
            <div class="flex justify-between items-center border-t border-gray-200 pt-4">
                <p class="text-gray-600">© 2025 NU Online | Nahdlatul Ulama</p>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fab fa-tiktok"></i></a>
                    <a href="#" class="text-gray-600 hover:text-gray-900"><i class="fas fa-rss"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
