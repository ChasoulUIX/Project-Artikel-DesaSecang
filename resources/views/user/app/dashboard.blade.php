@extends('user.layouts.app')

@section('content')

<div class="container mx-auto px-[0px]">
    {{-- Header Banner Slider --}}
    <div class="w-full bg-white rounded-lg shadow-sm mb-8 relative">
        <div class="slider overflow-hidden">
            <div class="slides flex transition-transform duration-500">
                <div class="relative w-full flex-shrink-0">
                    <img src="{{ asset('images/background_sawah.jpg') }}" alt="Banner 1" class="w-full h-[400px] rounded-lg object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-8">
                        <span class="text-white bg-[#00923F] px-3 py-1 rounded-full text-sm mb-3 inline-block">Berita Terkini</span>
                        <h2 class="text-white text-3xl font-bold mb-2">Perkembangan Pertanian Modern di Indonesia</h2>
                        <p class="text-gray-200 mb-4">Inovasi teknologi pertanian membawa perubahan signifikan bagi petani Indonesia</p>
                        <a href="#" class="inline-block bg-white text-[#00923F] px-6 py-2 rounded-full hover:bg-[#00923F] hover:text-white transition-colors">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="relative w-full flex-shrink-0">
                    <img src="{{ asset('images/background_sawah.jpg') }}" alt="Banner 2" class="w-full h-[400px] rounded-lg object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-8">
                        <span class="text-white bg-[#00923F] px-3 py-1 rounded-full text-sm mb-3 inline-block">Artikel Khusus</span>
                        <h2 class="text-white text-3xl font-bold mb-2">Tradisi Pesantren di Era Digital</h2>
                        <p class="text-gray-200 mb-4">Bagaimana pesantren beradaptasi dengan perkembangan teknologi modern</p>
                        <a href="#" class="inline-block bg-white text-[#00923F] px-6 py-2 rounded-full hover:bg-[#00923F] hover:text-white transition-colors">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="relative w-full flex-shrink-0">
                    <img src="{{ asset('images/background_sawah.jpg') }}" alt="Banner 3" class="w-full h-[400px] rounded-lg object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-8">
                        <span class="text-white bg-[#00923F] px-3 py-1 rounded-full text-sm mb-3 inline-block">Feature</span>
                        <h2 class="text-white text-3xl font-bold mb-2">Kebangkitan Ekonomi Syariah</h2>
                        <p class="text-gray-200 mb-4">Perkembangan dan potensi ekonomi syariah di Indonesia</p>
                        <a href="#" class="inline-block bg-white text-[#00923F] px-6 py-2 rounded-full hover:bg-[#00923F] hover:text-white transition-colors">Baca Selengkapnya</a>
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
    <div class="grid grid-cols-12 gap-6">
        {{-- Left Column --}}
        <div class="col-span-3 space-y-6">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="{{ asset('images/prabowo.jpg') }}" alt="Article" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 text-white text-sm px-3 py-1 rounded-full mb-2">Nasional</span>
                    <h3 class="font-bold text-lg mb-2">Seleksi MAN Unggulan Kemenag Dibuka Hingga 15 Februari, Santri Lulusan PDF Bisa Daftar</h3>
                    <p class="text-gray-400 text-sm">Senin, 3 Februari 2025 | 06:00 WIB</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 text-white text-sm px-3 py-1 rounded-full mb-2">Laporan Khusus</span>
                    <h3 class="font-bold text-lg mb-2">3 Segitiga Cinta untuk Membangun Hubungan Bersama Pasangan dalam Perkawinan</h3>
                    <p class="text-gray-400 text-sm">Ahad, 2 Februari 2025 | 19:00 WIB</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 text-white text-sm px-3 py-1 rounded-full mb-2">Nasional</span>
                    <h3 class="font-bold text-lg mb-2">Pentingnya Pendidikan Karakter dalam Membentuk Generasi Muda</h3>
                    <p class="text-gray-400 text-sm">Sabtu, 1 Februari 2025 | 14:00 WIB</p>
                </div>
            </div>
        </div>

        {{-- Center Column (Featured Articles) --}}
        <div class="col-span-6 space-y-6">
            {{-- Main Featured Article --}}
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="{{ asset('images/madu.jpg') }}" alt="Main Article" class="w-full h-[400px] object-cover">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 text-white text-sm px-3 py-1 rounded-full mb-2">Laporan Khusus</span>
                    <h2 class="text-xl font-bold mb-2">Artikel KH Sahal Mahfudh: Keluarga Maslahah Modern</h2>
                    <p class="text-gray-400 text-sm">Senin, 3 Februari 2025 | 12:30 WIB</p>
                </div>
            </div>

            {{-- Second Article --}}
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="flex">
                    <img src="{{ asset('images/ronald.jpg') }}" alt="Article" class="w-32 h-32 object-cover">
                    <div class="p-2 flex-1">
                        <span class="inline-block bg-blue-800 text-white text-xs px-2 py-0.5 rounded-full mb-1">Nasional</span>
                        <h3 class="font-bold text-sm mb-1">Inovasi Pembelajaran: Metode Baru Pesantren</h3>
                        <p class="text-gray-400 text-xs">3 Feb 2025</p>
                    </div>
                </div>
            </div>
            {{-- Third Article --}}
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="flex">
                    <img src="{{ asset('images/ronald.jpg') }}" alt="Article" class="w-32 h-32 object-cover">
                    <div class="p-2 flex-1">
                        <span class="inline-block bg-blue-800 text-white text-xs px-2 py-0.5 rounded-full mb-1">Laporan Khusus</span>
                        <h3 class="font-bold text-sm mb-1">Transformasi Digital dalam Pendidikan Islam Modern</h3>
                        <p class="text-gray-400 text-xs">3 Feb 2025</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Column --}}
        <div class="col-span-3 space-y-6">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <img src="{{ asset('images/ronald.jpg') }}" alt="Article" class="w-full h-48 object-cover">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 text-white text-sm px-3 py-1 rounded-full mb-2">Nasional</span>
                    <h3 class="font-bold text-lg mb-2">Gus Ulil Tekankan Pentingnya Dakwah kepada Anak Muda Melalui Handphone</h3>
                    <p class="text-gray-400 text-sm">Ahad, 2 Februari 2025 | 16:00 WIB</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 text-white text-sm px-3 py-1 rounded-full mb-2">Laporan Khusus</span>
                    <h3 class="font-bold text-lg mb-2">Keluarga Maslahat ala KH Bisri Syansuri (2): Merintis Pesantren Putri Pertama di Indonesia Bersama Istri</h3>
                    <p class="text-gray-400 text-sm">Sabtu, 1 Februari 2025 | 17:00 WIB</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 text-white text-sm px-3 py-1 rounded-full mb-2">Laporan Khusus</span>
                    <h3 class="font-bold text-lg mb-2">Peran Teknologi dalam Pengembangan Pendidikan Pesantren</h3>
                    <p class="text-gray-400 text-sm">Sabtu, 1 Februari 2025 | 15:00 WIB</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Artikel Terpopuler</h2>
            <a href="#" class="text-gray-400 hover:text-gray-600">Lihat Semua</a>
        </div>
        
        <div class="grid grid-cols-2 gap-6">
            {{-- Left Column --}}
            <div class="space-y-4">
                <!-- News Item 1 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="flex gap-4 p-4">
                        <div class="flex-1">
                            <span class="inline-block bg-blue-900 text-white text-xs px-2 py-0.5 rounded mb-2">Laporan Khusus</span>
                            <h3 class="font-bold text-base mb-1">Redam Konflik Orang Tua dan Anak dengan Cara Meninggalkan Ego Antargenerasi</h3>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-400 text-sm">Senin, 3 Februari 2025 | 11:30 WIB</p>
                                <span class="text-gray-500 text-sm">2.5k pembaca</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/prabowo.jpg') }}" alt="News Thumbnail" class="w-32 h-20 object-cover rounded">
                        </div>
                    </div>
                </div>

                <!-- News Item 2 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="flex gap-4 p-4">
                        <div class="flex-1">
                            <span class="inline-block bg-blue-900 text-white text-xs px-2 py-0.5 rounded mb-2">Nasional</span>
                            <h3 class="font-bold text-base mb-1">4 Jalur Penerimaan Murid Baru 2025: Domisili, Prestasi, Afirmasi, dan Mutasi</h3>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-400 text-sm">Senin, 3 Februari 2025 | 10:00 WIB</p>
                                <span class="text-gray-500 text-sm">1.8k pembaca</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/prabowo.jpg') }}" alt="News Thumbnail" class="w-32 h-20 object-cover rounded">
                        </div>
                    </div>
                </div>

                <!-- News Item 3 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="flex gap-4 p-4">
                        <div class="flex-1">
                            <span class="inline-block bg-blue-900 text-white text-xs px-2 py-0.5 rounded mb-2">Opini</span>
                            <h3 class="font-bold text-base mb-1">100 Tahun NU, Ekor Khittah 1926</h3>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-400 text-sm">Senin, 3 Februari 2025 | 09:00 WIB</p>
                                <span class="text-gray-500 text-sm">3.2k pembaca</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/prabowo.jpg') }}" alt="News Thumbnail" class="w-32 h-20 object-cover rounded">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column --}}
            <div class="space-y-4">
                <!-- News Item 4 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="flex gap-4 p-4">
                        <div class="flex-1">
                            <span class="inline-block bg-blue-900 text-white text-xs px-2 py-0.5 rounded mb-2">Tafsir</span>
                            <h3 class="font-bold text-base mb-1">Tafsir Surat Al-Anbiya Ayat 30: Air Sebagai Sumber Kehidupan Manusia</h3>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-400 text-sm">Senin, 3 Februari 2025 | 08:00 WIB</p>
                                <span class="text-gray-500 text-sm">1.5k pembaca</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/prabowo.jpg') }}" alt="News Thumbnail" class="w-32 h-20 object-cover rounded">
                        </div>
                    </div>
                </div>

                <!-- News Item 5 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="flex gap-4 p-4">
                        <div class="flex-1">
                            <span class="inline-block bg-blue-900 text-white text-xs px-2 py-0.5 rounded mb-2">Nasional</span>
                            <h3 class="font-bold text-base mb-1">LP Ma'arif PBNU Dorong Transformasi Digital dalam Pembelajaran</h3>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-400 text-sm">Ahad, 2 Februari 2025 | 14:45 WIB</p>
                                <span class="text-gray-500 text-sm">2.1k pembaca</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/prabowo.jpg') }}" alt="News Thumbnail" class="w-32 h-20 object-cover rounded">
                        </div>
                    </div>
                </div>

                <!-- News Item 6 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="flex gap-4 p-4">
                        <div class="flex-1">
                            <span class="inline-block bg-blue-900 text-white text-xs px-2 py-0.5 rounded mb-2">Nasional</span>
                            <h3 class="font-bold text-base mb-1">Indonesia Juara Umum MTQ Internasional 2025, Ini Harapan Wamenag</h3>
                            <div class="flex justify-between items-center">
                                <p class="text-gray-400 text-sm">Ahad, 2 Februari 2025 | 13:30 WIB</p>
                                <span class="text-gray-500 text-sm">1.9k pembaca</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/prabowo.jpg') }}" alt="News Thumbnail" class="w-32 h-20 object-cover rounded">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lihat Semua Button -->
        <div class="text-center mt-6">
            <a href="#" class="inline-block px-6 py-2 border border-gray-300 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors">
                Lihat Semua
            </a>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-bold mb-4">Kategori</h2>
        <div class="grid grid-cols-6 gap-4">
            <a href="#" class="bg-white rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                </svg>
                <h3 class="font-semibold text-gray-800">Pendidikan</h3>
                <p class="text-sm text-gray-500 mt-1">Artikel pendidikan</p>
            </a>
            <a href="#" class="bg-white rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                </svg>
                <h3 class="font-semibold text-gray-800">Kerukunan</h3>
                <p class="text-sm text-gray-500 mt-1">Berita kerukunan</p>
            </a>
            <a href="#" class="bg-white rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h3 class="font-semibold text-gray-800">Politik</h3>
                <p class="text-sm text-gray-500 mt-1">Berita politik</p>
            </a>
            <a href="#" class="bg-white rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
                <h3 class="font-semibold text-gray-800">Budaya</h3>
                <p class="text-sm text-gray-500 mt-1">Artikel budaya</p>
            </a>
            <a href="#" class="bg-white rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21v-2a4 4 0 00-4-4H9a4 4 0 00-4 4v2m4-10a4 4 0 100-8 4 4 0 000 8zm0 0h4" />
                </svg>
                <h3 class="font-semibold text-gray-800">Khutbah</h3>
                <p class="text-sm text-gray-500 mt-1">Kumpulan khutbah</p>
            </a>
            <a href="#" class="bg-white rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <h3 class="font-semibold text-gray-800">Doa</h3>
                <p class="text-sm text-gray-500 mt-1">Kumpulan doa</p>
            </a>
        </div>
    </div>
</div>
@endsection
