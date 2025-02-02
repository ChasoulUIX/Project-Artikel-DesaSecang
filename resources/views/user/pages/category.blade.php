@extends('user.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-12">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-primary mb-4">Kategori: Politik</h1>
        
        <!-- Filter dan Sorting -->
        <div class="flex justify-between items-center mb-8">
            <div class="flex gap-4">
                <select class="bg-white rounded-lg px-4 py-2 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-light">
                    <option>Terbaru</option>
                    <option>Terpopuler</option>
                    <option>A-Z</option>
                </select>
            </div>
        </div>

        <!-- Daftar Artikel -->
        <div class="grid grid-cols-3 gap-8">
            @for ($i = 1; $i <= 9; $i++)
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                <img src="/images/article-{{$i}}.jpg" alt="Article {{$i}}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="text-sm text-primary-light">Politik</span>
                        <span class="text-gray-500 text-sm">1 Februari 2024</span>
                    </div>
                    <h3 class="font-bold text-lg text-primary hover:text-primary-light transition duration-300">
                        <a href="#">Judul Artikel {{$i}} dalam Kategori Politik</a>
                    </h3>
                    <p class="text-gray-600 mt-2 line-clamp-2">
                        Ringkasan artikel akan ditampilkan di sini...
                    </p>
                </div>
            </div>
            @endfor
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center gap-2">
                <a href="#" class="px-4 py-2 bg-white border border-gray-200 rounded-lg hover:bg-gray-50">Previous</a>
                <a href="#" class="px-4 py-2 bg-primary-light text-white rounded-lg">1</a>
                <a href="#" class="px-4 py-2 bg-white border border-gray-200 rounded-lg hover:bg-gray-50">2</a>
                <a href="#" class="px-4 py-2 bg-white border border-gray-200 rounded-lg hover:bg-gray-50">3</a>
                <a href="#" class="px-4 py-2 bg-white border border-gray-200 rounded-lg hover:bg-gray-50">Next</a>
            </nav>
        </div>
    </div>
</div>
@endsection
