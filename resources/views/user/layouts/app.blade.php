        <!DOCTYPE html>
        <html lang="en" class="light">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>RELIGI.ID</title>
            <!-- Add favicon -->
            <link rel="icon" type="image/png" href="{{ asset('images/logoreligi.png') }}">
            <!-- CSS and other head elements -->
            <script src="https://cdn.tailwindcss.com"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
            <style>
                /* Webkit browsers (Chrome, Safari, newer versions of Opera) */
                ::-webkit-scrollbar {
                    width: 8px;
                    background-color: transparent;
                }

                ::-webkit-scrollbar-thumb {
                    background-color: rgba(156, 163, 175, 0.5);
                    border-radius: 4px;
                }

                ::-webkit-scrollbar-thumb:hover {
                    background-color: rgba(156, 163, 175, 0.8);
                }

                /* Firefox */
                * {
                    scrollbar-width: thin;
                    scrollbar-color: rgba(156, 163, 175, 0.5) transparent;
                }
            </style>
            <script>
                // Add dark mode configuration
                tailwind.config = {
                    darkMode: 'class'
                }

                // Add theme toggle functionality
                function toggleTheme() {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark')
                        localStorage.theme = 'light'
                    } else {
                        document.documentElement.classList.add('dark')
                        localStorage.theme = 'dark'
                    }
                }

                // Check initial theme
                if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    document.documentElement.classList.add('dark')
                } else {
                    document.documentElement.classList.remove('dark')
                }
            </script>
        </head>
        <body class="dark:bg-gray-900 dark:text-white">
            <!-- Top Navigation Bar -->
            <nav class="bg-white dark:bg-gray-800 border-b dark:border-gray-700">
                <div class="container mx-auto px-2.5 md:px-[150px]">
                    <div class="flex justify-between items-center h-16">
                        <!-- Theme Toggle -->
                        <div class="hidden md:block">
                            <button onclick="toggleTheme()" class="w-10 h-5 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center transition duration-300 focus:outline-none shadow">
                                <div class="w-5 h-5 relative rounded-full transition duration-500 transform bg-white dark:bg-gray-800 shadow-sm" :class="darkMode ? 'translate-x-5' : 'translate-x-0'">
                                    <svg class="w-3 h-3 text-gray-400 dark:text-yellow-500 absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                    </svg>
                                </div>
                            </button>
                        </div>

                        <!-- Logo Section with Hamburger Menu -->
                        <div class="flex-1 flex items-center justify-center">
                            <!-- Mobile Menu Button -->
                            <button onclick="toggleMobileMenu()" class="md:hidden absolute left-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                            
                            <a href="" class="flex items-center justify-center flex-1 md:justify-center pl-8 md:pl-0">
                                <img src="{{ asset('images/logo.png') }}" alt="NU Online" class="h-40 md:h-52 mx-auto mt-8">
                            </a>
                        </div>

                        <!-- Language Controls -->
                        <div class="flex items-center">
                            <div class="relative">
                                <button class="flex items-center" id="languageButton" onclick="toggleLanguageMenu()">
                                    <img src="https://flagcdn.com/w40/id.png" alt="Indonesia" class="w-5 h-3" id="selectedFlag">
                                    <span class="ml-1 text-xs" id="selectedLang">ID</span>
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden" id="languageMenu">
                                    <div class="py-1">
                                        <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="changeLanguage('id')">
                                            <img src="https://flagcdn.com/w40/id.png" alt="Indonesia" class="w-6 h-4 mr-2">
                                            Indonesia
                                        </a>
                                        <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="changeLanguage('en')">
                                            <img src="https://flagcdn.com/w40/gb.png" alt="English" class="w-6 h-4 mr-2">
                                            English
                                        </a>
                                        <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" onclick="changeLanguage('ar')">
                                            <img src="https://flagcdn.com/w40/sa.png" alt="Arabic" class="w-6 h-4 mr-2">
                                            العربية
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Navigation Menu -->
            <div class="bg-blue-900 dark:bg-gray-800 text-white mx-2.5 md:mx-[280px]">
                <!-- Desktop Menu -->
                <div class="hidden md:flex flex-wrap justify-center text-sm">
                    <a href="/" class="px-4 py-3 hover:bg-blue-800 transition-colors">Home</a>
                    <a href="/berita" class="px-4 py-3 hover:bg-blue-800 transition-colors">Berita</a>
                    <div class="group relative">
                        <a href="#" class="px-4 py-3 hover:bg-blue-800 transition-colors flex items-center">
                            Artikel
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="hidden group-hover:block absolute left-0 bg-blue-900 w-48 z-50">
                            <a href="/pendidikan" class="block px-4 py-2 hover:bg-blue-800 transition-colors">Pendidikan</a>
                            <a href="/kerukunan" class="block px-4 py-2 hover:bg-blue-800 transition-colors">Kerukunan</a>
                            <a href="/politik" class="block px-4 py-2 hover:bg-blue-800 transition-colors">Politik</a>
                            <a href="/budaya" class="block px-4 py-2 hover:bg-blue-800 transition-colors">Budaya</a>
                        </div>
                    </div>

                    <a href="/khutbah" class="px-4 py-3 hover:bg-blue-800 transition-colors">Pojok Gus Adib</a>
                    <a href="/khutbah" class="px-4 py-3 hover:bg-blue-800 transition-colors">Khutbah</a>
                    <a href="/doa" class="px-4 py-3 hover:bg-blue-800 transition-colors">Doa</a>
                    <a href="/populer" class="px-4 py-3 hover:bg-blue-800 transition-colors">Populer</a>
                    <a href="/tentangkami" class="px-4 py-3 hover:bg-blue-800 transition-colors">Tentang Kami</a>
                    <a href="/hubungikami" class="px-4 py-3 hover:bg-blue-800 transition-colors">Hubungi Kami</a>
                </div>

                <!-- Mobile Menu -->
                <div id="mobileMenu" class="hidden md:hidden w-full">
                    <a href="/" class="block px-4 py-3 hover:bg-blue-800 transition-colors">Home</a>
                    <a href="/berita" class="block px-4 py-3 hover:bg-blue-800 transition-colors">Berita</a>
                    <div class="relative">
                        <button onclick="toggleMobileSubmenu()" class="w-full px-4 py-3 hover:bg-blue-800 transition-colors flex items-center justify-between">
                            Artikel
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div id="mobileSubmenu" class="hidden bg-blue-800">
                            <a href="/pendidikan" class="block px-8 py-2 hover:bg-blue-700 transition-colors">Pendidikan</a>
                            <a href="/kerukunan" class="block px-8 py-2 hover:bg-blue-700 transition-colors">Kerukunan</a>
                            <a href="/politik" class="block px-8 py-2 hover:bg-blue-700 transition-colors">Politik</a>
                            <a href="/budaya" class="block px-8 py-2 hover:bg-blue-700 transition-colors">Budaya</a>
                        </div>
                    </div>

                    <a href="/khutbah" class="block px-4 py-3 hover:bg-blue-800 transition-colors">Pojok Gus Adib</a>
                    <a href="/khutbah" class="block px-4 py-3 hover:bg-blue-800 transition-colors">Khutbah</a>
                    <a href="/doa" class="block px-4 py-3 hover:bg-blue-800 transition-colors">Doa</a>
                    <a href="/populer" class="block px-4 py-3 hover:bg-blue-800 transition-colors">Populer</a>
                    <a href="/tentangkami" class="block px-4 py-3 hover:bg-blue-800 transition-colors">Tentang Kami</a>
                    <a href="/hubungikami" class="block px-4 py-3 hover:bg-blue-800 transition-colors">Hubungi Kami</a>
                </div>
            </div>

            <!-- Secondary Navigation (Regions) -->
            <div class="border-b dark:border-gray-700">
                <div class="container mx-auto px-2.5 md:px-[150px]">
                    <div class="flex items-center justify-between px-4">
                        <div class="flex space-x-6 text-sm text-gray-600 dark:text-gray-400 py-2">
                            <a href="#" class="hover:text-blue-900">Jakarta,</a>
                            <a href="#" class="hover:text-blue-900">Tangerang</a>
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ \Carbon\Carbon::now()->format('l, d F Y') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Floating Theme Toggle for Mobile -->
            <div class="md:hidden fixed bottom-6 right-6 z-50">
                <button onclick="toggleTheme()" class="w-12 h-12 rounded-full bg-white dark:bg-gray-800 flex items-center justify-center shadow-lg border border-gray-200 dark:border-gray-700">
                    <svg class="w-6 h-6 text-gray-600 dark:text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
            </div>

            <!-- Main Content -->
            <main class="container mx-auto px-2.5 md:px-[150px] py-6">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-gray-300 dark:bg-gray-900 py-12">
                <div class="container mx-auto px-2.5 md:px-4">
                    <!-- Logo and Company Name -->
                    <div class="flex flex-col items-center mb-8">
                        <img src="{{ asset('images/logo.png') }}" alt="Arina.id" class="h-52 mb-2">
                        <p class="text-gray-600 dark:text-gray-400 text-center">Jakarta, Tangerang</p>
                    </div>

                    <!-- Social Media Links -->
                    <div class="flex justify-center gap-4 mb-8">
                        <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-red-600 transition-colors">
                            <i class="fab fa-youtube fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-pink-600 transition-colors">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-black transition-colors">
                            <i class="fab fa-tiktok fa-2x"></i>
                        </a>
                    </div>

                    <!-- Network Title -->
                    <div class="text-center mb-8">
                        <h3 class="text-emerald-500 font-medium text-xl mb-4">JARINGAN MEDIA</h3>
                    </div>

                    <!-- Footer Links -->
                    <div class="flex flex-wrap justify-center gap-6 mb-8 text-sm px-2.5">
                        <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-emerald-500">Tentang Kami</a>
                        <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-emerald-500">Redaksi</a>
                        <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-emerald-500">Pedoman Media Siber</a>
                        <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-emerald-500">Kontak</a>
                        <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-emerald-500">Kontributor</a>
                        <a href="#" class="text-gray-600 dark:text-gray-400 hover:text-emerald-500">Indeks Berita</a>
                    </div>

                    <!-- Copyright -->
                    <div class="text-center text-sm text-gray-600 dark:text-gray-400">
                        © 2025 RELIGI.ID
                    </div>
                </div>
            </footer>

            <!-- Before closing body tag, add this script -->
            <script>
                function googleTranslateElementInit() {
                    new google.translate.TranslateElement({
                        pageLanguage: 'id',
                        includedLanguages: 'en,id,ar',
                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                        autoDisplay: false
                    }, 'google_translate_element');
                }

                function toggleLanguageMenu() {
                    const menu = document.getElementById('languageMenu');
                    menu.classList.toggle('hidden');
                }

                function changeLanguage(lang) {
                    // Get the Google Translate select element
                    const googleFrame = document.getElementsByClassName('goog-te-menu-frame')[0];
                    if (googleFrame) {
                        const innerDoc = googleFrame.contentDocument || googleFrame.contentWindow.document;
                        const languageSelect = innerDoc.getElementsByTagName('table')[0];
                        if (languageSelect) {
                            let links = languageSelect.getElementsByTagName('a');
                            for (let i = 0; i < links.length; i++) {
                                if (links[i].innerHTML.includes(getLanguageName(lang))) {
                                    links[i].click();
                                    break;
                                }
                            }
                        }
                    }

                    // Update flag and language text
                    const flagMap = {
                        'id': 'https://flagcdn.com/w40/id.png',
                        'en': 'https://flagcdn.com/w40/gb.png',
                        'ar': 'https://flagcdn.com/w40/sa.png'
                    };
                    const langMap = {
                        'id': 'ID',
                        'en': 'EN',
                        'ar': 'AR'
                    };

                    document.getElementById('selectedFlag').src = flagMap[lang];
                    document.getElementById('selectedLang').textContent = langMap[lang];
                    
                    // Hide the menu after selection
                    document.getElementById('languageMenu').classList.add('hidden');
                }

                // Helper function to get full language name
                function getLanguageName(lang) {
                    const langNames = {
                        'id': 'Indonesia',
                        'en': 'English',
                        'ar': 'Arabic'
                    };
                    return langNames[lang];
                }

                // Close language menu when clicking outside
                document.addEventListener('click', function(event) {
                    const languageButton = document.getElementById('languageButton');
                    const languageMenu = document.getElementById('languageMenu');
                    if (!languageButton.contains(event.target)) {
                        languageMenu.classList.add('hidden');
                    }
                });

                // Initialize translation after a short delay to ensure Google Translate is loaded
                window.addEventListener('load', function() {
                    setTimeout(function() {
                        const googleTranslateScript = document.createElement('script');
                        googleTranslateScript.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
                        document.body.appendChild(googleTranslateScript);
                    }, 1000);
                });

                function toggleMobileMenu() {
                    const mobileMenu = document.getElementById('mobileMenu');
                    mobileMenu.classList.toggle('hidden');
                }

                function toggleMobileSubmenu() {
                    const mobileSubmenu = document.getElementById('mobileSubmenu');
                    mobileSubmenu.classList.toggle('hidden');
                }
            </script>

            <!-- Add hidden Google Translate Element -->
            <div id="google_translate_element" style="display: none;"></div>
        </body>
        </html>
