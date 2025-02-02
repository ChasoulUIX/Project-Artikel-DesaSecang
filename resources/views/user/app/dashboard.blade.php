@extends('user.layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="relative h-[600px] md:h-[600px] h-[400px] overflow-hidden">
        <img src="/images/hero-bg.jpg" alt="Hero Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-primary/90 to-primary/60">
            <div class="max-w-7xl mx-auto px-4 md:px-8 h-full flex items-center">
                <div class="max-w-2xl">
                    <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 md:mb-6 leading-tight">
                        Portal Informasi dan Berita Desa Secang
                    </h1>
                    <p class="text-lg md:text-xl text-gray-200 mb-6 md:mb-8">
                        Media digital resmi Desa Secang, Probolinggo yang menyajikan berita, artikel, dan informasi terkini seputar desa
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/berita" class="bg-primary-light text-white px-8 py-3 rounded-lg hover:bg-blue-600 transition duration-300 text-center">
                            Baca Berita
                        </a>
                        <a href="/tentang-kami" class="bg-white/10 text-white px-8 py-3 rounded-lg hover:bg-white/20 transition duration-300 text-center">
                            Tentang Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-8 py-8 md:py-12">
        <!-- Prayer Times -->
        <div class="bg-primary text-white rounded-xl p-4 md:p-8 mb-8 md:mb-12 shadow-lg">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <h2 class="text-xl font-bold text-primary-light">JADWAL SHOLAT</h2>
                <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                    <select class="w-full md:w-auto bg-secondary/30 rounded-lg px-4 py-2 border border-gray-100/20 focus:outline-none focus:ring-2 focus:ring-primary-light transition duration-300">
                        <option>Jawa Timur</option>
                    </select>
                    <select class="w-full md:w-auto bg-secondary/30 rounded-lg px-4 py-2 border border-gray-100/20 focus:outline-none focus:ring-2 focus:ring-primary-light transition duration-300">
                        <option>Probolinggo - Desa Secang</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 md:gap-6 text-center">
                @php
                    $prayers = [
                        ['name' => 'Imsak', 'time' => '04:13'],
                        ['name' => 'Subuh', 'time' => '04:23'],
                        ['name' => 'Dzuhur', 'time' => '11:54'],
                        ['name' => 'Ashar', 'time' => '15:14'],
                        ['name' => 'Maghrib', 'time' => '18:06'],
                        ['name' => 'Isya', 'time' => '19:18'],
                    ];
                @endphp

                @foreach ($prayers as $prayer)
                    <div class="bg-secondary/30 rounded-lg p-4">
                        <div class="text-gray-300 mb-2 font-medium">{{ $prayer['name'] }}</div>
                        <div class="text-2xl font-bold">{{ $prayer['time'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Latest Articles -->
        <div class="mb-8 md:mb-12">
            <h2 class="text-xl md:text-2xl font-bold text-primary mb-6">Artikel Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @for ($i = 1; $i <= 3; $i++)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <img src="/images/article-{{$i}}.jpg" alt="Article {{$i}}" class="w-full h-56 object-cover">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-sm text-primary-light font-medium">PERSPEKTIF</span>
                            <span class="text-gray-500 text-sm">1 Februari 2024</span>
                        </div>
                        <h3 class="font-bold text-lg text-primary hover:text-primary-light transition duration-300">
                            <a href="#">Etnis Tionghoa dan Politik Bangsa: Integrasi atau Asimilasi yang Gagal?</a>
                        </h3>
                    </div>
                </div>
                @endfor
            </div>
            <div class="text-center mt-8">
                <a href="/artikel" class="inline-block bg-primary-light text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                    Lihat Semua Artikel
                </a>
            </div>
        </div>

        <!-- Popular Articles -->
        <div class="mb-8 md:mb-12">
            <h2 class="text-xl md:text-2xl font-bold text-primary mb-6">Artikel Populer</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @for ($i = 1; $i <= 4; $i++)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="relative">
                        <img src="/images/popular-{{$i}}.jpg" alt="Popular Article" class="w-full h-48 object-cover">
                        <div class="absolute top-3 right-3 bg-primary-light text-white px-3 py-1 rounded-full text-sm">
                            {{$i}}K Views
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-primary hover:text-primary-light transition duration-300">
                            <a href="#">Judul Artikel Populer {{$i}}</a>
                        </h3>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <!-- Categories -->
        <div class="mb-8 md:mb-12">
            <h2 class="text-xl md:text-2xl font-bold text-primary mb-6">Kategori</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
                @php
                    $categories = [
                        ['name' => 'Berita Desa', 'icon' => 'newspaper'],
                        ['name' => 'Pengumuman', 'icon' => 'bullhorn'],
                        ['name' => 'Program Desa', 'icon' => 'tasks'],
                        ['name' => 'Budaya', 'icon' => 'theater-masks'],
                        ['name' => 'UMKM', 'icon' => 'store'],
                        ['name' => 'Wisata', 'icon' => 'map-marked-alt']
                    ];
                @endphp
                
                @foreach ($categories as $category)
                    <a href="/kategori/{{ strtolower($category['name']) }}" 
                       class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition duration-300 text-center">
                        <i class="fas fa-{{ $category['icon'] }} text-2xl text-primary-light mb-2"></i>
                        <div class="font-medium text-primary">{{ $category['name'] }}</div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Newsletter -->
        <div class="bg-primary text-white rounded-xl p-4 md:p-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-xl md:text-2xl font-bold mb-4">Berlangganan Info Desa</h2>
                <p class="text-gray-300 mb-6">Dapatkan informasi dan pengumuman penting dari Desa Secang langsung di inbox Anda</p>
                <form class="flex flex-col sm:flex-row gap-4">
                    <input type="email" placeholder="Masukkan email Anda" 
                        class="w-full flex-1 px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-primary-light">
                    <button type="submit" 
                        class="w-full sm:w-auto px-6 py-2 bg-primary-light rounded-lg hover:bg-blue-600 transition duration-300">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

