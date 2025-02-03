@extends('user.layouts.app')

@section('content')
<div class="container mx-auto">
    <!-- Hero Section -->
    <section class="relative h-[400px] mb-16 rounded-2xl overflow-hidden">
        <img src="{{ asset('images/background_sawah.jpg') }}" alt="NU Desa Secang" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-transparent flex items-center">
            <div class="px-12">
                <h1 class="text-4xl font-bold text-white mb-4">Berita Desa Secang</h1>
                <p class="text-xl text-white/90 max-w-2xl">
                    Portal Berita dan Informasi Terkini Seputar Desa Secang dan Sekitarnya
                </p>
            </div>
        </div>
    </section>

    <!-- Tentang Portal Section -->
    <section class="mb-16">
        <div class="flex items-center gap-2 mb-8">
            <div class="w-10 h-1 bg-blue-900 dark:bg-blue-500 rounded-full"></div>
            <h2 class="text-3xl font-bold text-blue-900 dark:text-blue-500">Tentang Portal</h2>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 hover:shadow-xl transition-shadow">
            <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed mb-6">
                Portal Berita Desa Secang merupakan media informasi digital yang menyajikan berita dan informasi terkini seputar Desa Secang dan wilayah sekitarnya. Kami berkomitmen untuk memberikan liputan berita yang aktual, faktual dan terpercaya mengenai berbagai aspek kehidupan masyarakat desa.
            </p>
            <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                Sebagai portal berita lokal, kami fokus pada pemberitaan yang menyangkut pembangunan desa, kegiatan masyarakat, budaya, pendidikan, ekonomi, dan berbagai informasi penting lainnya yang relevan dengan warga Desa Secang.
            </p>
        </div>
    </section>

    <!-- Kategori Berita Section -->
    <section class="mb-16">
        <div class="flex items-center gap-2 mb-8">
            <div class="w-10 h-1 bg-blue-900 dark:bg-blue-500 rounded-full"></div>
            <h2 class="text-3xl font-bold text-blue-900 dark:text-blue-500">Kategori Berita</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 dark:from-emerald-600 dark:to-emerald-700 rounded-2xl shadow-lg p-8 text-white">
                <h3 class="text-2xl font-bold mb-6">Berita Utama</h3>
                <ul class="space-y-3 text-lg">
                    <li>Pembangunan Desa</li>
                    <li>Kegiatan Pemerintah Desa</li>
                    <li>Program Masyarakat</li>
                    <li>Ekonomi & UMKM</li>
                    <li>Pendidikan & Kesehatan</li>
                </ul>
            </div>
            <div class="bg-gradient-to-br from-blue-800 to-blue-900 dark:from-blue-700 dark:to-blue-800 rounded-2xl shadow-lg p-8 text-white">
                <h3 class="text-2xl font-bold mb-6">Informasi Khusus</h3>
                <ul class="space-y-3 text-lg">
                    <li>Budaya & Tradisi</li>
                    <li>Agenda Desa</li>
                    <li>Profil UMKM</li>
                    <li>Wisata Desa</li>
                    <li>Info Layanan Publik</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Tim Redaksi Section -->
    <section class="mb-16">
        <div class="flex items-center gap-2 mb-8">
            <div class="w-10 h-1 bg-blue-900 dark:bg-blue-500 rounded-full"></div>
            <h2 class="text-3xl font-bold text-blue-900 dark:text-blue-500">Tim Redaksi</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Pemimpin Redaksi -->
            <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="relative inline-block mb-6">
                    <div class="w-40 h-40 rounded-full overflow-hidden">
                        <img src="{{ asset('images/prabowo.jpg') }}" alt="Pemimpin Redaksi" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute -bottom-2 -right-2 bg-emerald-500 text-white p-2 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Bapak Suryanto</h3>
                <p class="text-emerald-600 dark:text-emerald-400 font-medium">Pemimpin Redaksi</p>
            </div>

            <!-- Editor -->
            <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="relative inline-block mb-6">
                    <div class="w-40 h-40 rounded-full overflow-hidden">
                        <img src="{{ asset('images/ronald.jpg') }}" alt="Editor" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute -bottom-2 -right-2 bg-emerald-500 text-white p-2 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Ibu Rahayu</h3>
                <p class="text-emerald-600 dark:text-emerald-400 font-medium">Editor</p>
            </div>

            <!-- Kontributor -->
            <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="relative inline-block mb-6">
                    <div class="w-40 h-40 rounded-full overflow-hidden">
                        <img src="{{ asset('images/obama.jpg') }}" alt="Kontributor" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute -bottom-2 -right-2 bg-emerald-500 text-white p-2 rounded-full">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Mas Andi</h3>
                <p class="text-emerald-600 dark:text-emerald-400 font-medium">Kontributor</p>
            </div>
        </div>
    </section>
</div>
@endsection
