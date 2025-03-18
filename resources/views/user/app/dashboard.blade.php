@extends('user.layouts.app')

@section('content')

<div class="container mx-auto px-[10px] md:px-[0px]">
    {{-- Header Banner Slider --}}
    <div class="w-full bg-white dark:bg-gray-800 rounded-lg shadow-sm mb-8 relative">
        <div class="slider overflow-hidden">
            <div class="slides flex transition-transform duration-500">
                @if(isset($sliderArticles) && $sliderArticles->count() > 0)
                    @foreach($sliderArticles as $slide)
                    <div class="relative w-full flex-shrink-0">
                        <img src="{{ $slide->image ? url('images/' . $slide->image) : asset('images/default-banner.jpg') }}" 
                             alt="{{ $slide->title }}" 
                             class="w-full h-[250px] md:h-[400px] rounded-lg object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4 md:p-8">
                            <span class="text-white bg-blue-900 dark:bg-blue-700 px-3 py-1 rounded-full text-xs md:text-sm mb-2 md:mb-3 inline-block">
                                {{ ucfirst($slide->category) }}
                            </span>
                            <h2 class="text-white text-xl md:text-3xl font-bold mb-2">{{ $slide->title }}</h2>
                            <p class="text-gray-200 text-sm md:text-base mb-4">
                                {!! Str::limit(strip_tags($slide->description), 100) !!}
                            </p>
                            <a href="{{ route('artikel.view', $slide->id) }}" class="inline-block bg-white text-blue-900 dark:bg-gray-800 dark:text-white px-4 md:px-6 py-2 rounded-full text-sm hover:bg-blue-900 hover:text-white dark:hover:bg-blue-700 transition-colors">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="relative w-full flex-shrink-0">
                        <img src="{{ asset('images/beritabaru6.png') }}" alt="Banner Default" class="w-full h-[250px] md:h-[400px] rounded-lg object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4 md:p-8">
                            <span class="text-white bg-blue-900 dark:bg-blue-700 px-3 py-1 rounded-full text-xs md:text-sm mb-2 md:mb-3 inline-block">Berita Terkini</span>
                            <h2 class="text-white text-xl md:text-3xl font-bold mb-2">PKUB Cetak Prestasi Gemilang di Bawah Muhammad Adib Abdushomad</h2>
                            <p class="text-gray-200 text-sm md:text-base mb-4">Dalam waktu hanya lima bulan sejak menjabat, Muhammad Adib Abdushomad, M.Ag, M.Ed, Ph.D</p>
                            <a href="#" class="inline-block bg-white text-blue-900 dark:bg-gray-800 dark:text-white px-4 md:px-6 py-2 rounded-full text-sm hover:bg-blue-900 hover:text-white dark:hover:bg-blue-700 transition-colors">Baca Selengkapnya</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        {{-- Navigation Dots --}}
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
            @if(isset($sliderArticles))
                @for ($i = 0; $i < count($sliderArticles); $i++)
                    <button class="w-2 h-2 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity duration-300" 
                           data-slide="{{ $i }}"></button>
                @endfor
            @else
                <button class="w-2 h-2 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity duration-300"></button>
                <button class="w-2 h-2 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity duration-300"></button>
                <button class="w-2 h-2 rounded-full bg-white opacity-50 hover:opacity-100 transition-opacity duration-300"></button>
            @endif
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
            @if(isset($leftColumnArticles) && $leftColumnArticles->count() > 0)
                @foreach($leftColumnArticles as $article)
                <a href="{{ route('artikel.view', $article->id) }}" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    @if($article->image)
                    <img src="{{ url('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                    </div>
                    @endif
                    <div class="p-4">
                        <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">{{ ucfirst($article->category) }}</span>
                        <h3 class="font-bold text-lg mb-2 dark:text-white">{{ $article->title }}</h3>
                        <p class="text-gray-400 dark:text-gray-300 text-sm">{{ $article->created_at->format('D, d M Y | H:i') }} WIB</p>
                    </div>
                </a>
                @endforeach
            @else
                @php
                    // Gunakan beritaArticles sebagai fallback jika leftColumnArticles tidak tersedia
                    $articlesToShow = isset($beritaArticles) && $beritaArticles->count() > 0 ? $beritaArticles : collect();
                @endphp
                
                @forelse($articlesToShow as $article)
                <a href="{{ route('artikel.view', $article->id) }}" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                    @if($article->image)
                    <img src="{{ url('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                    </div>
                    @endif
                    <div class="p-4">
                        <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">{{ ucfirst($article->category) }}</span>
                        <h3 class="font-bold text-lg mb-2 dark:text-white">{{ $article->title }}</h3>
                        <p class="text-gray-400 dark:text-gray-300 text-sm">{{ $article->created_at->format('D, d M Y | H:i') }} WIB</p>
                    </div>
                </a>
                @empty
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                    <p class="text-gray-500 dark:text-gray-400">Belum ada artikel berita.</p>
                </div>
                @endforelse
            @endif
        </div>

        {{-- Center Column (Featured Article) --}}
        <div class="md:col-span-6 space-y-6">
            @if($featuredArticle)
            <a href="{{ route('artikel.view', $featuredArticle->id) }}" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <img src="{{ $featuredArticle->image ? url('images/' . $featuredArticle->image) : asset('images/GusAdib.jpg') }}" 
                     alt="{{ $featuredArticle->title }}" 
                     class="w-full h-[300px] md:h-[400px] object-cover">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">
                        {{ ucfirst($featuredArticle->category) }}
                    </span>
                    <h2 class="text-xl font-bold mb-2 dark:text-white">{{ $featuredArticle->title }}</h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-3 line-clamp-2">
                        {!! Str::limit(strip_tags($featuredArticle->description), 150) !!}
                    </p>
                    <div class="flex justify-between items-center">
                        <p class="text-gray-400 dark:text-gray-300 text-sm">
                            {{ $featuredArticle->created_at->format('D, d M Y | H:i') }} WIB
                        </p>
                        <span class="text-gray-500 dark:text-gray-400 text-sm">
                            <i class="fas fa-eye mr-1"></i> {{ $featuredArticle->view_count }} kali
                        </span>
                    </div>
                </div>
            </a>
            @else
            <a href="#" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <img src="{{ asset('images/GusAdib.jpg') }}" alt="Default Article" class="w-full h-[300px] md:h-[400px] object-cover">
                <div class="p-4">
                    <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">Default</span>
                    <h2 class="text-xl font-bold mb-2 dark:text-white">Pojok Gus Adib</h2>
                    <p class="text-gray-400 dark:text-gray-300 text-sm">Default Date</p>
                </div>
            </a>
            @endif

            {{-- Side Articles below featured --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @forelse($sideArticles as $article)
                <a href="{{ route('artikel.view', $article->id) }}" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden h-full">
                    <div class="flex flex-col h-full">
                        @if($article->image)
                        <img src="{{ url('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-40 object-cover">
                        @else
                        <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                            <i class="fas fa-image text-gray-400 text-4xl"></i>
                        </div>
                        @endif
                        <div class="p-4 flex-grow">
                            <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded-full mb-1">
                                {{ ucfirst($article->category) }}
                            </span>
                            <h3 class="font-bold text-sm mb-2 dark:text-white line-clamp-2">{{ $article->title }}</h3>
                            <div class="flex justify-between items-center mt-auto">
                                <p class="text-gray-400 dark:text-gray-300 text-xs">
                                    {{ $article->created_at->format('d M Y') }}
                                </p>
                                <span class="text-gray-500 dark:text-gray-400 text-xs">
                                    <i class="fas fa-eye mr-1"></i> {{ $article->view_count }}
                                </span>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                @for ($i = 0; $i < 2; $i++)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                    <p class="text-gray-500 dark:text-gray-400">Artikel pendamping belum tersedia.</p>
                </div>
                @endfor
                @endforelse
            </div>
        </div>

        {{-- Right Column --}}
        <div class="md:col-span-3 space-y-6">
            @if(isset($rightColumnArticles) && $rightColumnArticles->count() > 0)
                @foreach($rightColumnArticles as $article)
                    <a href="{{ route('artikel.view', $article->id) }}" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                        @if($article->image)
                            <img src="{{ url('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-4xl"></i>
                            </div>
                        @endif
                        <div class="p-4">
                            <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">{{ ucfirst($article->category) }}</span>
                            <h3 class="font-bold text-lg mb-2 dark:text-white">{{ $article->title }}</h3>
                            <p class="text-gray-400 dark:text-gray-300 text-sm">
                                {{ $article->created_at->format('D, d M Y | H:i') }} WIB
                            </p>
                        </div>
                    </a>
                @endforeach
            @else
                @php
                    // Gunakan khutbahArticles sebagai fallback jika rightColumnArticles tidak tersedia
                    $articlesToShow = isset($khutbahArticles) && $khutbahArticles->count() > 0 ? $khutbahArticles : collect();
                @endphp
                
                @forelse($articlesToShow as $article)
                    <a href="{{ route('artikel.view', $article->id) }}" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                        @if($article->image)
                            <img src="{{ url('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-4xl"></i>
                            </div>
                        @endif
                        <div class="p-4">
                            <span class="inline-block bg-blue-800 dark:bg-blue-700 text-white text-sm px-3 py-1 rounded-full mb-2">{{ ucfirst($article->category) }}</span>
                            <h3 class="font-bold text-lg mb-2 dark:text-white">{{ $article->title }}</h3>
                            <p class="text-gray-400 dark:text-gray-300 text-sm">
                                {{ $article->created_at->format('D, d M Y | H:i') }} WIB
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                        <p class="text-gray-500 dark:text-gray-400 text-center">Belum ada artikel khutbah.</p>
                    </div>
                @endforelse
            @endif
        </div>
    </div>

    <div class="mt-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold dark:text-white">Artikel Terpopuler</h2>
            <a href="{{ url('/populer') }}" class="text-gray-400 dark:text-gray-300 dark:hover:text-gray-100">Lihat Semua</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Left Column --}}
            <div class="space-y-4">
                @forelse($popularArticles->take(3) as $article)
                <a href="{{ route('artikel.view', $article->id) }}" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden h-[140px]">
                    <div class="flex h-full">
                        <div class="flex-1 p-4 min-w-0">
                            <div class="h-full flex flex-col">
                                <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2 w-fit">
                                    {{ ucfirst($article->category) }}
                                </span>
                                <h3 class="font-bold text-base mb-1 dark:text-white line-clamp-2">{{ $article->title }}</h3>
                                <div class="flex justify-between items-center mt-auto">
                                    <p class="text-gray-400 dark:text-gray-300 text-sm truncate">
                                        {{ $article->created_at->format('d M Y') }}
                                    </p>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm whitespace-nowrap ml-2">
                                        {{ $article->view_count }}x dibaca
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-32">
                            <img src="{{ $article->image ? url('images/' . $article->image) : asset('images/default.jpg') }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-full h-[140px] object-cover">
                        </div>
                    </div>
                </a>
                @empty
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                    <p class="text-gray-500 dark:text-gray-400">Belum ada artikel populer.</p>
                </div>
                @endforelse
            </div>

            {{-- Right Column --}}
            <div class="space-y-4">
                @forelse($popularArticles->skip(3)->take(3) as $article)
                <a href="{{ route('artikel.view', $article->id) }}" class="block bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden h-[140px]">
                    <div class="flex h-full">
                        <div class="flex-1 p-4 min-w-0">
                            <div class="h-full flex flex-col">
                                <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2 w-fit">
                                    {{ ucfirst($article->category) }}
                                </span>
                                <h3 class="font-bold text-base mb-1 dark:text-white line-clamp-2">{{ $article->title }}</h3>
                                <div class="flex justify-between items-center mt-auto">
                                    <p class="text-gray-400 dark:text-gray-300 text-sm truncate">
                                        {{ $article->created_at->format('d M Y') }}
                                    </p>
                                    <span class="text-gray-500 dark:text-gray-400 text-sm whitespace-nowrap ml-2">
                                        {{ $article->view_count }}x dibaca
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0 w-32">
                            <img src="{{ $article->image ? url('images/' . $article->image) : asset('images/default.jpg') }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-full h-[140px] object-cover">
                        </div>
                    </div>
                </a>
                @empty
                <!-- Skip if empty since we already have a message in the left column -->
                @endforelse
            </div>
        </div>

        <!-- Lihat Semua Button -->
        <div class="text-center mt-6">
            <a href="{{ url('/populer') }}" class="inline-block px-6 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                Lihat Semua
            </a>
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-bold mb-4 dark:text-white">Kategori</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
            @foreach($categories as $category)
            @if($category != 'populer') {{-- Skip populer category as it's not a real category --}}
            <a href="{{ route('kategori.'.$category) }}" class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 text-center hover:shadow-md transition-shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-3 text-blue-900 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    @if($category == 'pendidikan')
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    @elseif($category == 'kerukunan')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    @elseif($category == 'politik')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    @elseif($category == 'budaya')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    @elseif($category == 'berita')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    @elseif($category == 'khutbah')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    @elseif($category == 'doa')
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    @else
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    @endif
                </svg>
                <h3 class="font-semibold text-gray-800 dark:text-white">{{ ucfirst($category) }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Artikel {{ $category }}</p>
            </a>
            @endif
            @endforeach
        </div>
    </div>
</div>

<style>
    .article-card {
        transition: all 0.3s ease;
    }
    .article-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    /* Fix untuk mobile view */
    @media (max-width: 768px) {
        .article-grid {
            display: flex;
            flex-direction: column;
        }
        .article-grid > div {
            margin-bottom: 1.5rem;
        }
    }
</style>

<!-- Untuk artikel yang baru dibuat (kurang dari 3 hari) -->
@if($article->created_at->diffInDays(now()) < 3)
    <span class="absolute top-2 right-2 bg-red-500 text-white text-xs px-2 py-1 rounded-full">Baru</span>
@endif

<!-- Tombol share di artikel -->
<div class="flex space-x-2 mt-2">
    <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . route('artikel.view', $article->id)) }}" target="_blank" class="text-green-500 hover:text-green-700">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('artikel.view', $article->id)) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
        <i class="fab fa-facebook"></i>
    </a>
    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('artikel.view', $article->id)) }}&text={{ urlencode($article->title) }}" target="_blank" class="text-blue-400 hover:text-blue-600">
        <i class="fab fa-twitter"></i>
    </a>
</div>
@endsection
