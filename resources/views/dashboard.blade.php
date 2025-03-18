@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <!-- Error Alert -->
    @if(isset($error))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md">
        <p>{{ $error }}</p>
    </div>
    @endif

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-600 mt-2">Selamat datang, {{ Auth::user()->name }}</p>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Artikel Card -->
        <div class="bg-white rounded-lg shadow p-6 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fas fa-newspaper text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Total Artikel</p>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $totalArticles ?? 0 }}</h2>
                </div>
            </div>
        </div>
        
        <!-- User Card -->
        <div class="bg-white rounded-lg shadow p-6 border border-gray-100">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fas fa-users text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-600">Total Pengguna</p>
                    <h2 class="text-2xl font-bold text-gray-800">{{ $totalUsers ?? 0 }}</h2>
                </div>
            </div>
        </div>
        
        <!-- Rest of the dashboard content -->
    </div>
    
    <!-- Recent Articles Table -->
    @if(isset($recentArticles) && $recentArticles->count() > 0)
    <div class="bg-white rounded-lg shadow mb-8 border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h3 class="text-lg font-bold text-gray-800">Artikel Terbaru</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Views</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($recentArticles as $article)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ Str::limit($article->title, 40) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($article->category) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $article->view_count }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $article->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('articles.edit', $article->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection 