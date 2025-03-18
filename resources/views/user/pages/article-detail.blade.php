@extends('user.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $article->title }}</h1>
            <div class="flex flex-wrap items-center text-gray-600 dark:text-gray-300 text-sm mb-4">
                <span class="mr-4 mb-2">
                    <i class="fas fa-user mr-2"></i>{{ $article->user->name }}
                </span>
                <span class="mr-4 mb-2">
                    <i class="fas fa-folder mr-2"></i>{{ ucfirst($article->category) }}
                </span>
                <span class="mr-4 mb-2">
                    <i class="fas fa-calendar mr-2"></i>{{ $article->created_at->format('d M Y') }}
                </span>
                <span class="mb-2">
                    <i class="fas fa-eye mr-2"></i>{{ $article->view_count }} kali dibaca
                </span>
            </div>
        </div>

        @if ($article->image)
        <div class="mb-8">
            <!-- Container dengan maksimal lebar dan tinggi yang dibatasi -->
            <div class="max-w-3xl mx-auto">
                <img src="{{ url('images/' . $article->image) }}" 
                     alt="{{ $article->title }}" 
                     class="w-full h-auto max-h-[500px] object-contain rounded-lg shadow-md">
            </div>
            <!-- Caption untuk gambar (opsional) -->
            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-2 italic">{{ $article->title }}</p>
        </div>
        @endif

        <div class="prose max-w-none dark:prose-invert">
            {!! $article->description !!}
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between flex-wrap">
                <a href="javascript:history.back()" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white text-sm font-medium rounded-md mb-2">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <div class="flex space-x-4 mb-2">
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($article->title) }}" target="_blank" class="text-blue-400 hover:text-blue-600">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . url()->current()) }}" target="_blank" class="text-green-500 hover:text-green-700">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 