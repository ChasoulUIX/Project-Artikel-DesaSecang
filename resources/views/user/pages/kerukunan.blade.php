@extends('user.layouts.app')

@section('content')
<div class="container px-2.5 md:px-4 mt-4 dark:bg-gray-900">
    <!-- Berita Terbaru Section -->
    <h2 class="mb-4 dark:text-white">Berita Terbaru</h2>

    <!-- Main News Section -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 mb-6">
        <!-- Featured News -->
        <div class="col-span-1 md:col-span-8">
            <a href="/artikel">
                <div class="relative h-[20rem] md:h-[28rem] rounded-xl overflow-hidden">
                    <img src="{{ asset('images/obama.jpg') }}" class="w-full h-full object-cover" alt="Main News">
                    <div class="absolute bottom-0 left-0 right-0 p-4 md:p-6 bg-gradient-to-t from-black/80 to-transparent">
                        <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2">Berita</span>
                        <h2 class="text-white text-xl md:text-2xl font-bold">Dunia Berubah, NU Berubah, Kita pun Perlu Menyesuaikan Perubahan</h2>
                    </div>
                </div>
            </a>
        </div>

        <!-- Popular News -->
        <div class="col-span-1 md:col-span-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
                <div class="bg-blue-900 dark:bg-blue-700 text-white px-4 py-3">
                    <h3 class="font-bold">TERPOPULER</h3>
                </div>
                <div class="divide-y dark:divide-gray-700">
                    @for ($i = 1; $i <= 5; $i++)
                        <a href="/artikel" class="flex items-center gap-4 p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="text-xl md:text-2xl font-bold text-blue-900 dark:text-blue-400">{{ $i }}</span>
                            <p class="font-medium text-sm md:text-base text-gray-800 dark:text-gray-200">Di Era Kultura Konsumerisme Harus Pandai Mengambil Manfaat dari Perubahan</p>
                        </a>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <!-- News Content with Sidebar Layout -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        <!-- Main News List -->
        <div class="col-span-1 md:col-span-8">
            <div class="grid grid-cols-1 gap-6">
                @for ($i = 1; $i <= 9; $i++)
                <a href="/artikel" class="flex flex-col md:flex-row gap-4 items-start">
                    <div class="w-full md:w-48 h-48 md:h-32 flex-shrink-0">
                        <img src="/images/prabowo.jpg" alt="Article {{$i}}" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-sm font-medium text-emerald-600 dark:text-emerald-400 uppercase">EDUKASI</span>
                            <span class="text-gray-500 dark:text-gray-400 text-sm">3 Februari 2025 | 06:15 WIB</span>
                        </div>
                        <h3 class="text-lg md:text-xl font-bold text-gray-900 dark:text-white mb-2 hover:text-blue-600 dark:hover:text-blue-400">
                            Siap-Siap, Beasiswa Indonesia Bangkit Dibuka 2 Bulan Lagi
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </a>
                @endfor
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-1 md:col-span-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4">
                <h3 class="font-bold text-lg mb-4 dark:text-white">PILIHAN EDITOR</h3>
                <div class="space-y-4">
                    <!-- Editor's Pick Items -->
                    @for ($i = 1; $i <= 5; $i++)
                    <div class="group">
                        <a href="/artikel" class="flex items-start gap-3">
                            <img src="images/prabowo.jpg" alt="Artikel" class="w-16 md:w-20 h-16 md:h-20 object-cover rounded-lg">
                            <div>
                                <span class="text-xs font-medium text-emerald-600 dark:text-emerald-400 uppercase">KOLOM</span>
                                <h4 class="font-bold text-sm md:text-base text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400">
                                    Antara Mahbub Djunaidi dan Prabowo: Kuasa Pajak
                                </h4>
                            </div>
                        </a>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
