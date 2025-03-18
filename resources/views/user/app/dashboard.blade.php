@extends('user.layouts.app')

@section('content')

<div class="container mx-auto px-[10px] md:px-[0px]">
    {{-- Header Banner Slider --}}
    <div class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-sm mb-8 relative">
        <div class="slider overflow-hidden">
            <div class="slides flex transition-transform duration-500">
                <div class="relative w-full flex-shrink-0">
                    <img src="{{ asset('images/beritabaru6.png') }}" alt="Banner 1" class="w-full h-[250px] md:h-[400px] rounded-lg object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4 md:p-8">
                        <span class="text-white bg-blue-900 dark:bg-blue-700 px-3 py-1 rounded-full text-xs md:text-sm mb-2 md:mb-3 inline-block">Berita Terkini</span>
                        <h2 class="text-white text-xl md:text-3xl font-bold mb-2">PKUB Cetak Prestasi Gemilang di Bawah Muhammad Adib Abdushomad</h2>
                        <p class="text-gray-200 text-sm md:text-base mb-4">Dalam waktu hanya lima bulan sejak menjabat, Muhammad Adib Abdushomad, M.Ag, M.Ed, Ph.D</p>
                        <a href="#" class="inline-block bg-white text-blue-900 dark:bg-gray-800 dark:text-white px-4 md:px-6 py-2 rounded-full text-sm hover:bg-blue-900 hover:text-white dark:hover:bg-blue-700 transition-colors">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="relative w-full flex-shrink-0">
                    <img src="{{ asset('images/beritabaru7.png') }}" alt="Banner 2" class="w-full h-[250px] md:h-[400px] rounded-lg object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4 md:p-8">
                        <span class="text-white bg-blue-900 px-3 py-1 rounded-full text-xs md:text-sm mb-2 md:mb-3 inline-block">Artikel Khusus</span>
                        <h2 class="text-white text-xl md:text-3xl font-bold mb-2">Dalam upaya menyambut pesanMenteri Agama tentang internasionalisasi</h2>
                        <a href="#" class="inline-block bg-white text-blue-900 px-4 md:px-6 py-2 rounded-full text-sm hover:bg-blue-900 hover:text-white transition-colors">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="relative w-full flex-shrink-0">
                    <img src="{{ asset('images/header3.webp') }}" alt="Banner 3" class="w-full h-[250px] md:h-[400px] rounded-lg object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4 md:p-8">
                        <span class="text-white bg-blue-900 px-3 py-1 rounded-full text-xs md:text-sm mb-2 md:mb-3 inline-block">Feature</span>
                        <h2 class="text-white text-xl md:text-3xl font-bold mb-2">Kebangkitan Ekonomi Syariah</h2>
                        <p class="text-gray-200 text-sm md:text-base mb-4">Perkembangan dan potensi ekonomi syariah di Indonesia</p>
                        <a href="#" class="inline-block bg-white text-blue-900 px-4 md:px-6 py-2 rounded-full text-sm hover:bg-blue-900 hover:text-white transition-colors">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Navigation Dots --}}
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <button class="w-2 h-2 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity duration-300"></button>
            <button class="w-2 h-2 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity duration-300"></button>
            <button class="w-2 h-2 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity duration-300"></button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('.slides');
            const slides = document.querySelectorAll('.slides img');
            const dots = document.querySelectorAll('.bottom-4 button');
            let currentSlide = 0;
            
            function updateSlider() {
                slider.style.transform = `translateX(-${currentSlide * 100}%)`;
                dots.forEach((dot, index) => {
                    dot.style.opacity = index === currentSlide ? '1' : '0.5';
                });
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                updateSlider();
            }

            // Auto advance slides every 5 seconds
            setInterval(nextSlide, 5000);

            // Add click handlers for dots
            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentSlide = index;
                    updateSlider();
                });
            });
        });
    </script>

    {{-- Main Content Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        {{-- Left Column --}}
        <div class="md:col-span-3 space-y-6">
            <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <img src="{{ asset('images/beritabaru1.jpg') }}" alt="Article" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">Nasional</span>
                    <h3 class="font-bold text-lg mb-2 dark:text-white">Pusat Kerukunan Umat Beragama Bangun Kerja Sama Lintas Negara
                    <p class="text-gray-400 dark:text-gray-300 text-sm">Senin, 3 Februari 2025 | 06:00 WIB</p>
                </div>
            </a>

            <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 text-white text-sm px-3 py-1 rounded-full mb-2">Laporan Khusus</span>
                    <h3 class="font-bold text-lg mb-2">3 Segitiga Cinta untuk Membangun Hubungan Bersama Pasangan dalam Perkawinan</h3>
                    <p class="text-gray-400 text-sm">Ahad, 2 Februari 2025 | 19:00 WIB</p>
                </div>
            </a>

            <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 text-white text-sm px-3 py-1 rounded-full mb-2">Nasional</span>
                    <h3 class="font-bold text-lg mb-2">Pentingnya Pendidikan Karakter dalam Membentuk Generasi Muda</h3>
                    <p class="text-gray-400 text-sm">Sabtu, 1 Februari 2025 | 14:00 WIB</p>
                </div>
            </a>
        </div>

        {{-- Center Column (Featured Articles) --}}
        <div class="md:col-span-6 space-y-6">
            <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <img src="{{ asset('images/GusAdib.jpg') }}" alt="Main Article" class="w-full h-[300px] md:h-[400px] object-cover">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">Karya Gus Adib</span>
                    <h2 class="text-xl font-bold mb-2 dark:text-white">Pojok Gus Adib</h2>
                    <p class="text-gray-400 dark:text-gray-300 text-sm">Senin, 3 Februari 2025 | 12:30 WIB</p>
                </div>
            </a>

            <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="flex">
                    <img src="{{ asset('images/beritabaru3.png') }}" alt="Article" class="w-32 h-32 object-cover">
                    <div class="p-2 flex-1">
                        <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded-full mb-1">Nasional</span>
                        <h3 class="font-bold text-sm mb-1 dark:text-white">Tokoh Agama Diminta Jadi Penjaga Harmoni di Tengah Pilkada Serentak 2024</h3>
                        <p class="text-gray-400 dark:text-gray-300 text-xs">3 Feb 2025</p>
                    </div>
                </div>
            </a>

            <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="flex">
                    <img src="{{ asset('images/beritabaru5.jpeg') }}" alt="Article" class="w-32 h-32 object-cover">
                    <div class="p-2 flex-1">
                        <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded-full mb-1">Laporan Khusus</span>
                        <h3 class="font-bold text-sm mb-1 dark:text-white">Kemenag RI Imbau Seluruh Elemen Masyarakat Dukung Pilkada 2024 Aman dan Bermartabat</h3>
                        <p class="text-gray-400 dark:text-gray-300 text-xs">3 Feb 2025</p>
                    </div>
                </div>
            </a>
        </div>

        {{-- Right Column --}}
        <div class="md:col-span-3 space-y-6">
            <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <img src="{{ asset('images/beritabaru2.png') }}" alt="Article" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">Nasional</span>
                    <h3 class="font-bold text-lg mb-2 dark:text-white">Kepala PKUB Buka Gebyar Toleransi di Kota Singkawang</h3>
                    <p class="text-gray-400 dark:text-gray-300 text-sm">Ahad, 2 Februari 2025 | 16:00 WIB</p>
                </div>
            </a>

            <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">Laporan Khusus</span>
                    <h3 class="font-bold text-lg mb-2 dark:text-white">Keluarga Maslahat ala KH Bisri Syansuri (2): Merintis Pesantren Putri Pertama di Indonesia Bersama Istri</h3>
                    <p class="text-gray-400 dark:text-gray-300 text-sm">Sabtu, 1 Februari 2025 | 17:00 WIB</p>
                </div>
            </a>

            <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">Laporan Khusus</span>
                    <h3 class="font-bold text-lg mb-2 dark:text-white">Peran Teknologi dalam Pengembangan Pendidikan Pesantren</h3>
                    <p class="text-gray-400 dark:text-gray-300 text-sm">Sabtu, 1 Februari 2025 | 15:00 WIB</p>
                </div>
            </a>
        </div>
    </div>

    <div class="mt-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold dark:text-white">Artikel Terpopuler</h2>
            <a href="#" class="text-gray-400 dark:text-gray-300 dark:hover:text-gray-100">Lihat Semua</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Left Column --}}
            <div class="space-y-4">
                <!-- News Item Template (repeated for each item) -->
                <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden h-[140px]">
                    <div class="flex h-full">
                        <div class="flex-1 p-4 min-w-0">
                            <div class="h-full flex flex-col">
                                <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2 w-fit">Laporan Khusus</span>
                                <h3 class="font-bold text-base mb-1 dark:text-white line-clamp-2">Umat Hindu Apresiasi Aksi Nyata Ekoteologi yang Digagas PKUB</h3>
                                <div class="flex justify-between items-center mt-auto">
                                    <p class="text-gray-400 dark:text-gray-300 text-sm truncate">Senin, 3 Februari 2025 | 11:30 WIB</p>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm whitespace-nowrap ml-2">2.5k pembaca</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-32">
                            <img src="{{ asset('images/hindu.png') }}" alt="News Thumbnail" class="w-full h-[140px] object-cover">
                        </div>
                    </div>
                </a>

                <!-- News Item 2 -->
                <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden h-[140px]">
                    <div class="flex h-full">
                        <div class="flex-1 p-4 min-w-0">
                            <div class="h-full flex flex-col">
                                <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2 w-fit">Nasional</span>
                                <h3 class="font-bold text-base mb-1 dark:text-white line-clamp-2">PKUB Laksanakan Aksi Nyata Ekoteologi</h3>
                                <div class="flex justify-between items-center mt-auto">
                                    <p class="text-gray-400 dark:text-gray-300 text-sm truncate">Senin, 3 Februari 2025 | 10:00 WIB</p>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm whitespace-nowrap ml-2">1.8k pembaca</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-32">
                            <img src="{{ asset('images/pkub.png') }}" alt="News Thumbnail" class="w-full h-[140px] object-cover">
                        </div>
                    </div>
                </a>

                <!-- News Item 3 -->
                <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden h-[140px]">
                    <div class="flex h-full">
                        <div class="flex-1 p-4 min-w-0">
                            <div class="h-full flex flex-col">
                                <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2 w-fit">Opini</span>
                                <h3 class="font-bold text-base mb-1 dark:text-white line-clamp-2">PKUB Dorong Ekoteologi Melalui Aksi Nyata di Pura PrajaPati</h3>
                                <div class="flex justify-between items-center mt-auto">
                                    <p class="text-gray-400 dark:text-gray-300 text-sm truncate">Senin, 3 Februari 2025 | 09:00 WIB</p>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm whitespace-nowrap ml-2">3.2k pembaca</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-32">
                            <img src="{{ asset('images/ekoteologi.jpg') }}" alt="News Thumbnail" class="w-full h-[140px] object-cover">
                        </div>
                    </div>
                </a>
            </div>

            {{-- Right Column --}}
            <div class="space-y-4">
                <!-- News Item 4 -->
                <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden h-[140px]">
                    <div class="flex h-full">
                        <div class="flex-1 p-4 min-w-0">
                            <div class="h-full flex flex-col">
                                <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2 w-fit">Tafsir</span>
                                <h3 class="font-bold text-base mb-1 dark:text-white line-clamp-2">Kemenag RI Imbau Seluruh Elemen Masyarakat Dukung Pilkada 2024 Aman dan Bermartabat</h3>
                                <div class="flex justify-between items-center mt-auto">
                                    <p class="text-gray-400 dark:text-gray-300 text-sm truncate">Senin, 3 Februari 2025 | 08:00 WIB</p>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm whitespace-nowrap ml-2">1.5k pembaca</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-32">
                            <img src="{{ asset('images/beritabaru5.jpeg') }}" alt="News Thumbnail" class="w-full h-[140px] object-cover">
                        </div>
                    </div>
                </a>

                <!-- News Item 5 -->
                <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden h-[140px]">
                    <div class="flex h-full">
                        <div class="flex-1 p-4 min-w-0">
                            <div class="h-full flex flex-col">
                                <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2 w-fit">Nasional</span>
                                <h3 class="font-bold text-base mb-1 dark:text-white line-clamp-2">Tokoh Agama Diminta Jadi Penjaga Harmoni di Tengah Pilkada Serentak 2024 </h3>
                                <div class="flex justify-between items-center mt-auto">
                                    <p class="text-gray-400 dark:text-gray-300 text-sm truncate">Ahad, 2 Februari 2025 | 14:45 WIB</p>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm whitespace-nowrap ml-2">2.1k pembaca</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-32">
                            <img src="{{ asset('images/beritabaru3.png') }}" alt="News Thumbnail" class="w-full h-[140px] object-cover">
                        </div>
                    </div>
                </a>

                <!-- News Item 6 -->
                <a href="/artikel" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden h-[140px]">
                    <div class="flex h-full">
                        <div class="flex-1 p-4 min-w-0">
                            <div class="h-full flex flex-col">
                                <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2 w-fit">Nasional</span>
                                <h3 class="font-bold text-base mb-1 dark:text-white line-clamp-2">IPKUB lakukan Harmonisasi Program Kerja 2025 Berama Staf Khusus Menteri Agama</h3>
                                <div class="flex justify-between items-center mt-auto">
                                    <p class="text-gray-400 dark:text-gray-300 text-sm truncate">Ahad, 2 Februari 2025 | 13:30 WIB</p>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm whitespace-nowrap ml-2">1.9k pembaca</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-32">
                            <img src="{{ asset('images/beritabaru7.png') }}" alt="News Thumbnail" class="w-full h-[140px] object-cover">
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Lihat Semua Button -->
        <div class="text-center mt-6">
            <a href="#" class="inline-block px-6 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                Lihat Semua
            </a>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-bold mb-4 dark:text-white">Kategori</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            <a href="#" class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                </svg>
                <h3 class="font-semibold text-gray-800 dark:text-white">Pendidikan</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Artikel pendidikan</p>
            </a>
            <a href="#" class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                </svg>
                <h3 class="font-semibold text-gray-800 dark:text-white">Kerukunan</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Berita kerukunan</p>
            </a>
            <a href="#" class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h3 class="font-semibold text-gray-800 dark:text-white">Politik</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Berita politik</p>
            </a>
            <a href="#" class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
                <h3 class="font-semibold text-gray-800 dark:text-white">Budaya</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Artikel budaya</p>
            </a>
           
        </div>
    </div>
</div>
@endsection
