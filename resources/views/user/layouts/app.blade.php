<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#00264D',    // Biru Tua
                        secondary: '#003366',
                        'primary-light': '#0066CC',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="font-sans m-0 p-0">
    <nav class="bg-primary text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <a href="/" class="flex items-center">
                    <img src="/images/logo.png" alt="Religi.co" class="h-8 sm:h-10">
                </a>
                
                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="lg:hidden text-gray-100 hover:text-primary-light">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center gap-6">
                    <a href="/" class="text-gray-100 hover:text-primary-light transition duration-300">Home</a>
                    <a href="/berita" class="text-gray-100 hover:text-primary-light transition duration-300">Berita</a>
                    <div class="relative group">
                        <button class="text-gray-100 hover:text-primary-light transition duration-300 flex items-center gap-1">
                            Kategori Artikel
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white hidden group-hover:block z-50">
                            <div class="py-1">
                                <a href="/kategori/pendidikan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pendidikan</a>
                                <a href="/kategori/kerukunan" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kerukunan</a>
                                <a href="/kategori/politik" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Politik</a>
                                <a href="/kategori/budaya" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Budaya</a>
                                <a href="/kategori/khutbah" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Khutbah</a>
                                <a href="/kategori/doa" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">DOA</a>
                            </div>
                        </div>
                    </div>
                    <a href="/popular" class="text-gray-100 hover:text-primary-light transition duration-300">Popular</a>
                    <a href="/tentang-kami" class="text-gray-100 hover:text-primary-light transition duration-300">Tentang Kami</a>
                    <a href="/hubungi-kami" class="text-gray-100 hover:text-primary-light transition duration-300">Hubungi Kami</a>
                    <div class="relative">
                        <input type="search" class="px-4 py-2 bg-secondary/30 border border-gray-100/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-light" placeholder="Search...">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-300"></i>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden lg:hidden mt-4">
                <div class="flex flex-col space-y-4">
                    <a href="/" class="text-gray-100 hover:text-primary-light transition duration-300">Home</a>
                    <a href="/berita" class="text-gray-100 hover:text-primary-light transition duration-300">Berita</a>
                    <div class="relative">
                        <button id="mobile-dropdown-button" class="text-gray-100 hover:text-primary-light transition duration-300 flex items-center gap-1">
                            Kategori Artikel
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div id="mobile-dropdown" class="hidden mt-2 space-y-2 pl-4">
                            <a href="/kategori/pendidikan" class="block text-gray-100 hover:text-primary-light">Pendidikan</a>
                            <a href="/kategori/kerukunan" class="block text-gray-100 hover:text-primary-light">Kerukunan</a>
                            <a href="/kategori/politik" class="block text-gray-100 hover:text-primary-light">Politik</a>
                            <a href="/kategori/budaya" class="block text-gray-100 hover:text-primary-light">Budaya</a>
                            <a href="/kategori/khutbah" class="block text-gray-100 hover:text-primary-light">Khutbah</a>
                            <a href="/kategori/doa" class="block text-gray-100 hover:text-primary-light">DOA</a>
                        </div>
                    </div>
                    <a href="/popular" class="text-gray-100 hover:text-primary-light transition duration-300">Popular</a>
                    <a href="/tentang-kami" class="text-gray-100 hover:text-primary-light transition duration-300">Tentang Kami</a>
                    <a href="/hubungi-kami" class="text-gray-100 hover:text-primary-light transition duration-300">Hubungi Kami</a>
                    <div class="relative">
                        <input type="search" class="w-full px-4 py-2 bg-secondary/30 border border-gray-100/20 rounded-lg text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-light" placeholder="Search...">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-primary text-white py-16 px-8">
        <div class="max-w-7xl mx-auto">
            <div class="mb-12">
                <img src="/images/probolinggo.png" alt="Arina.id Logo" class="h-12 mx-auto mb-4">
                <p class="text-gray-300 text-sm">PT ARINA JEJARING MEDIA</p>
            </div>
            
            <div class="mb-12 space-x-6">
                <a href="#" aria-label="Twitter" class="text-gray-300 hover:text-primary-light transition duration-300 text-2xl"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Facebook" class="text-gray-300 hover:text-primary-light transition duration-300 text-2xl"><i class="fab fa-facebook"></i></a>
                <a href="#" aria-label="Instagram" class="text-gray-300 hover:text-primary-light transition duration-300 text-2xl"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="YouTube" class="text-gray-300 hover:text-primary-light transition duration-300 text-2xl"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="TikTok" class="text-gray-300 hover:text-primary-light transition duration-300 text-2xl"><i class="fab fa-tiktok"></i></a>
                <a href="#" aria-label="RSS" class="text-gray-300 hover:text-primary-light transition duration-300 text-2xl"><i class="fas fa-rss"></i></a>
            </div>

            <div class="font-bold text-lg mb-6 text-primary-light">JARINGAN MEDIA</div>
            
            <div class="flex flex-wrap justify-center gap-6 mb-12 px-4">
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Arrahim</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Badamai</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Bilah</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">El-Karim</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Halo Ustama</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Hijau Popular</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Hipotenusa</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Islam Santun</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Kaafah</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Madina</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Sahabat Religi</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Semangat Islam</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Syahada</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Tahiro</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Tasamuh</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Tawassuth</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Togak</a>
            </div>

            <div class="flex flex-wrap justify-center gap-8 mb-8 border-t border-b border-gray-100/20 py-8">
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Tentang Kami</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Redaksi</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Pedoman Media Siber</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Kontak</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Kontributor</a>
                <a href="#" class="text-gray-300 hover:text-primary-light transition duration-300 text-sm">Indeks Berita</a>
            </div>

            <div class="text-gray-400 text-sm">
                © 2025 arina.id
            </div>
        </div>
    </footer>

    <script>
        function initTranslate() {
            const googleTranslateElement = document.getElementById('google_translate_element');
            new google.translate.TranslateElement({
                pageLanguage: 'id',
                includedLanguages: 'en,id',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }

        function initDarkMode() {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }

            // Toggle dark mode
            document.getElementById('darkModeToggle').addEventListener('click', () => {
                document.documentElement.classList.toggle('dark')
                localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light'
            })
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            // Mobile dropdown toggle
            const mobileDropdownButton = document.getElementById('mobile-dropdown-button');
            const mobileDropdown = document.getElementById('mobile-dropdown');
            
            mobileDropdownButton.addEventListener('click', () => {
                mobileDropdown.classList.toggle('hidden');
            });
        });
    </script>
</body>
</html>
