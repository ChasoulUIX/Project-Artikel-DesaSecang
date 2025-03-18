@extends('user.layouts.app')

@section('content')
<div class="container px-2.5 sm:px-4 mt-4 dark:bg-gray-900">
    <!-- Berita Terbaru Section -->
    <h2 class="mb-4 dark:text-white">{{ $pageTitle ?? 'Artikel Terpopuler' }}</h2>

    @if(isset($articles) && $articles->isNotEmpty())
    <!-- Main News Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">
        <!-- Featured News -->
        <div class="col-span-1 lg:col-span-8">
            <a href="{{ route('artikel.view', $articles->first()->id) }}">
                <div class="relative h-[20rem] lg:h-[28rem] rounded-xl overflow-hidden">
                    <img src="{{ $articles->first()->image ? url('images/' . $articles->first()->image) : asset('images/header1.jpeg') }}" class="w-full h-full object-cover" alt="{{ $articles->first()->title }}">
                    <div class="absolute bottom-0 left-0 right-0 p-4 lg:p-6 bg-gradient-to-t from-black/80 to-transparent">
                        <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2">{{ ucfirst($articles->first()->category) }}</span>
                        <h2 class="text-white text-xl lg:text-2xl font-bold">{{ $articles->first()->title }}</h2>
                    </div>
                </div>
            </a>
        </div>

        <!-- Popular News -->
        <div class="col-span-1 lg:col-span-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-blue-900 dark:bg-blue-700 text-white px-4 py-3">
                    <h3 class="font-bold">TERPOPULER</h3>
                </div>
                <div class="divide-y dark:divide-gray-700">
                    @foreach($articles->take(5) as $index => $article)
                        <a href="{{ route('artikel.view', $article->id) }}" class="flex items-center gap-4 p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="text-xl lg:text-2xl font-bold text-blue-900 dark:text-blue-400">{{ $index + 1 }}</span>
                            <p class="font-medium text-sm lg:text-base text-gray-800 dark:text-gray-200">{{ $article->title }}</p>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- News Content with Sidebar Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Main News List -->
        <div class="col-span-1 lg:col-span-8">
            <div class="grid grid-cols-1 gap-6">
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
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-1 lg:col-span-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4">
                <h3 class="font-bold text-lg mb-4 dark:text-white">PILIHAN EDITOR</h3>
                <div class="space-y-4">
                    <!-- Editor's Pick Items -->
                    @if(isset($editorPicks) && $editorPicks->isNotEmpty())
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
                        @php
                            // Mengambil artikel dengan created_at terbaru untuk pilihan editor
                            $editorPicks = Article::latest()->take(5)->get();
                        @endphp
                        @if($editorPicks->isNotEmpty())
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
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-sm text-center">
        <h3 class="text-xl font-bold mb-4 dark:text-white">Belum Ada Artikel</h3>
        <p class="text-gray-600 dark:text-gray-300">Saat ini belum ada artikel populer tersedia.</p>
    </div>
    @endif
</div>
@endsection

