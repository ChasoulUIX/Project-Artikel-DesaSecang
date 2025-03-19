@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="flex justify-between items-center p-6 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-800">Detail Artikel</h1>
        <div class="flex space-x-2">
            <a href="{{ route('articles.edit', $article->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition-colors duration-150 flex items-center gap-2">
                <i class="fas fa-edit"></i>
                <span>Edit</span>
            </a>
            <a href="{{ route('articles.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-150 flex items-center gap-2">
                <i class="fas fa-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 space-y-4">
                <div class="border-b border-gray-200 pb-4">
                    <h2 class="text-xl font-bold text-gray-800">{{ $article->title }}</h2>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center text-gray-500 text-sm mb-1">
                            <i class="fas fa-user mr-2"></i>
                            <span class="font-medium">Penulis</span>
                        </div>
                        <div class="text-gray-900">{{ $article->user->name }}</div>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center text-gray-500 text-sm mb-1">
                            <i class="fas fa-folder mr-2"></i>
                            <span class="font-medium">Kategori</span>
                        </div>
                        <div class="text-gray-900">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ ucfirst($article->category) }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center text-gray-500 text-sm mb-1">
                            <i class="fas fa-calendar mr-2"></i>
                            <span class="font-medium">Tanggal Publikasi</span>
                        </div>
                        <div class="text-gray-900">{{ $article->created_at->format('d-m-Y H:i') }}</div>
                    </div>
                    
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <div class="flex items-center text-gray-500 text-sm mb-1">
                            <i class="fas fa-eye mr-2"></i>
                            <span class="font-medium">Jumlah Dibaca</span>
                        </div>
                        <div class="text-gray-900">{{ $article->view_count }} kali</div>
                    </div>
                </div>
                
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Deskripsi:</h3>
                    <div class="prose max-w-none bg-gray-50 p-6 rounded-lg border border-gray-200">
                        {!! $article->description !!}
                    </div>
                </div>
            </div>
            
            <div class="md:col-span-1">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Gambar Artikel</h3>
                    @if ($article->image)
                        <div class="relative rounded-lg overflow-hidden shadow-md">
                            <img src="{{ url('images/' . $article->image) }}" class="w-full h-auto" alt="Gambar Artikel">
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-3">
                                <div class="text-white text-xs font-medium">{{ $article->title }}</div>
                            </div>
                        </div>
                    @else
                        <div class="flex items-center justify-center h-48 bg-gray-200 rounded-lg border border-gray-300">
                            <div class="text-gray-500 text-center p-4">
                                <i class="fas fa-image text-3xl mb-2"></i>
                                <p>Tidak ada gambar untuk artikel ini</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 