@extends('user.layouts.app')

@section('content')
<div class="container px-2.5 sm:px-4 mt-4 dark:bg-gray-900">
    <!-- Berita Terbaru Section -->
    <h2 class="mb-4 dark:text-white">{{ $categoryName ?? 'Berita Terbaru' }}</h2>

    <!-- Main News Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">
        <!-- Featured News -->
        <div class="col-span-1 lg:col-span-8">
            @if(isset($articles) && $articles->isNotEmpty())
            <a href="{{ route('artikel.view', $articles->first()->id) }}">
                <div class="relative h-[20rem] lg:h-[28rem] rounded-xl overflow-hidden">
                    <img src="{{ $articles->first()->image ? url('images/' . $articles->first()->image) : asset('images/header1.jpeg') }}" class="w-full h-full object-cover" alt="{{ $articles->first()->title }}">
                    <div class="absolute bottom-0 left-0 right-0 p-4 lg:p-6 bg-gradient-to-t from-black/80 to-transparent">
                        <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2">{{ ucfirst($articles->first()->category) }}</span>
                        <h2 class="text-white text-xl lg:text-2xl font-bold">{{ $articles->first()->title }}</h2>
                    </div>
                </div>
            </a>
            @else
            <a href="#">
                <div class="relative h-[20rem] lg:h-[28rem] rounded-xl overflow-hidden">
                    <img src="{{ asset('images/header1.jpeg') }}" class="w-full h-full object-cover" alt="Main News">
                    <div class="absolute bottom-0 left-0 right-0 p-4 lg:p-6 bg-gradient-to-t from-black/80 to-transparent">
                        <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2">Berita</span>
                        <h2 class="text-white text-xl lg:text-2xl font-bold">Dunia Berubah, NU Berubah, Kita pun Perlu Menyesuaikan Perubahan</h2>
                    </div>
                </div>
            </a>
            @endif
        </div>

        <!-- Popular News -->
        <div class="col-span-1 lg:col-span-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-blue-900 dark:bg-blue-700 text-white px-4 py-3">
                    <h3 class="font-bold">TERPOPULER</h3>
                </div>
                <div class="divide-y dark:divide-gray-700">
                    @if(isset($articles) && $articles->isNotEmpty())
                        @php
                            $popularArticles = $articles->sortByDesc('view_count')->take(5);
                        @endphp
                        @foreach($popularArticles as $index => $article)
                            <a href="{{ route('artikel.view', $article->id) }}" class="flex items-center gap-4 p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <span class="text-xl lg:text-2xl font-bold text-blue-900 dark:text-blue-400">{{ $index + 1 }}</span>
                                <p class="font-medium text-sm lg:text-base text-gray-800 dark:text-gray-200">{{ $article->title }}</p>
                            </a>
                        @endforeach
                    @else
                        @for ($i = 1; $i <= 5; $i++)
                            <a href="/artikel" class="flex items-center gap-4 p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <span class="text-xl lg:text-2xl font-bold text-blue-900 dark:text-blue-400">{{ $i }}</span>
                                <p class="font-medium text-sm lg:text-base text-gray-800 dark:text-gray-200">Di Era Kultura Konsumerisme Harus Pandai Mengambil Manfaat dari Perubahan</p>
                            </a>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- News Content with Sidebar Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Main News List -->
        <div class="col-span-1 lg:col-span-8">
            <div class="grid grid-cols-1 gap-6">
                @if(isset($articles) && $articles->isNotEmpty())
                    @foreach($articles->skip(1) as $article)
                    <a href="{{ route('artikel.view', $article->id) }}" class="flex flex-col sm:flex-row gap-4 items-start">
                        <div class="w-full sm:w-48 h-48 sm:h-32 flex-shrink-0">
                            <img src="{{ $article->image ? url('images/' . $article->image) : asset('images/berita1.jpg') }}" alt="{{ $article->title }}" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="text-sm font-medium text-emerald-600 dark:text-emerald-400 uppercase">{{ strtoupper($article->category) }}</span>
                                <span class="text-gray-500 dark:text-gray-400 text-sm">{{ $article->created_at->format('d F Y | H:i') }} WIB</span>
                            </div>
                            <h3 class="text-lg lg:text-xl font-bold text-gray-900 dark:text-white mb-2 hover:text-blue-600 dark:hover:text-blue-400">
                                {{ $article->title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 line-clamp-2">
                                {!! Str::limit(strip_tags($article->description), 150) !!}
                            </p>
                        </div>
                    </a>
                    @endforeach
                @else
                    @for ($i = 1; $i <= 9; $i++)
                    <a href="/artikel" class="flex flex-col sm:flex-row gap-4 items-start">
                        <div class="w-full sm:w-48 h-48 sm:h-32 flex-shrink-0">
                            @php
                                $extension = match($i) {
                                    1, 2 => 'jpg',
                                    3 => 'jpeg',
                                    5 => 'jpeg',
                                    6 => 'jpeg',
                                    7, 8, 9 => 'webp',
                                    4 => 'jpg',
                                    default => 'jpg'
                                };
                                
                                $imageNumber = $i == 4 ? 5 : $i;
                            @endphp
                            <img src="{{ asset('images/berita' . $imageNumber . '.' . $extension) }}" alt="Article {{$i}}" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="text-sm font-medium text-emerald-600 dark:text-emerald-400 uppercase">EDUKASI</span>
                                <span class="text-gray-500 dark:text-gray-400 text-sm">3 Februari 2025 | 06:15 WIB</span>
                            </div>
                            <h3 class="text-lg lg:text-xl font-bold text-gray-900 dark:text-white mb-2 hover:text-blue-600 dark:hover:text-blue-400">
                                Siap-Siap, Beasiswa Indonesia Bangkit Dibuka 2 Bulan Lagi
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </a>
                    @endfor
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-1 lg:col-span-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4">
                <h3 class="font-bold text-lg mb-4 dark:text-white">PILIHAN EDITOR</h3>
                <div class="space-y-4">
                    <!-- Editor's Pick Items -->
                    @if(isset($articles) && $articles->isNotEmpty())
                        @php
                            // Mengambil artikel dengan view_count tertinggi untuk pilihan editor
                            $editorPicks = $articles->sortByDesc('created_at')->take(5);
                        @endphp
                        @foreach($editorPicks as $article)
                        <div class="group">
                            <a href="{{ route('artikel.view', $article->id) }}" class="flex items-start gap-3">
                                <img src="{{ $article->image ? url('images/' . $article->image) : asset('images/berita6.jpg') }}" alt="{{ $article->title }}" class="w-16 sm:w-20 h-16 sm:h-20 object-cover rounded-lg">
                                <div>
                                    <span class="text-xs font-medium text-emerald-600 dark:text-emerald-400 uppercase">{{ strtoupper($article->category) }}</span>
                                    <h4 class="font-bold text-sm lg:text-base text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400">
                                        {{ $article->title }}
                                    </h4>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    @else
                        @for ($i = 1; $i <= 5; $i++)
                        <div class="group">
                            <a href="/artikel" class="flex items-start gap-3">
                                @php
                                    $imageIndex = $i + 5;
                                    $extension = match($imageIndex) {
                                        6 => 'jpeg',
                                        7, 8, 9, 10 => 'webp',
                                        default => 'jpg'
                                    };
                                @endphp
                                <img src="{{ asset('images/berita' . $imageIndex . '.' . $extension) }}" alt="Artikel" class="w-16 sm:w-20 h-16 sm:h-20 object-cover rounded-lg">
                                <div>
                                    <span class="text-xs font-medium text-emerald-600 dark:text-emerald-400 uppercase">KOLOM</span>
                                    <h4 class="font-bold text-sm lg:text-base text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400">
                                        Antara Mahbub Djunaidi dan Prabowo: Kuasa Pajak
                                    </h4>
                                </div>
                            </a>
                        </div>
                        @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
