@extends('user.layouts.app')

@section('content')
<div class="container mt-4">
    <!-- Berita Terbaru Section -->
    <h2 class="mb-4">Berita Terbaru</h2>

    <!-- Main News Section -->
    <div class="grid grid-cols-12 gap-6 mb-6">
        <!-- Featured News -->
        <div class="col-span-8">
            <div class="relative h-[28rem] rounded-xl overflow-hidden">
                <img src="{{ asset('images/prabowo.jpg') }}" class="w-full h-full object-cover" alt="Main News">
                <div class="absolute bottom-0 left-0 right-0 p-6 bg-gradient-to-t from-black/80 to-transparent">
                    <span class="inline-block bg-blue-900 text-white text-xs px-2 py-0.5 rounded mb-2">Berita</span>
                    <h2 class="text-white text-2xl font-bold">Dunia Berubah, NU Berubah, Kita pun Perlu Menyesuaikan Perubahan</h2>
                </div>
            </div>
        </div>

        <!-- Popular News -->
        <div class="col-span-4">
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="bg-blue-900 text-white px-4 py-3">
                    <h3 class="font-bold">TERPOPULER</h3>
                </div>
                <div class="divide-y">
                    @for ($i = 1; $i <= 5; $i++)
                        <a href="#" class="flex items-center gap-4 p-4 hover:bg-gray-50 transition-colors">
                            <span class="text-2xl font-bold text-blue-900">{{ $i }}</span>
                            <p class="font-medium text-gray-800">Di Era Kultura Konsumerisme Harus Pandai Mengambil Manfaat dari Perubahan</p>
                        </a>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <!-- News Content with Sidebar Layout -->
    <div class="grid grid-cols-12 gap-6">
        <!-- Main News List -->
        <div class="col-span-8">
            <div class="grid grid-cols-1 gap-6">
                @for ($i = 1; $i <= 9; $i++)
                <div class="flex gap-4 items-start">
                    <div class="w-48 h-32 flex-shrink-0">
                        <img src="/images/prabowo.jpg" alt="Article {{$i}}" class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="text-sm font-medium text-emerald-600 uppercase">EDUKASI</span>
                            <span class="text-gray-500 text-sm">3 Februari 2025 | 06:15 WIB</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-blue-600">
                            <a href="#">Siap-Siap, Beasiswa Indonesia Bangkit Dibuka 2 Bulan Lagi</a>
                        </h3>
                        <p class="text-gray-600 line-clamp-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-span-4">
            <div class="bg-white rounded-xl shadow-sm p-4">
                <h3 class="font-bold text-lg mb-4">PILIHAN EDITOR</h3>
                <div class="space-y-4">
                    <!-- Editor's Pick Items -->
                    <div class="group">
                        <div class="flex items-start gap-3">
                            <img src="images/prabowo.jpg" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                            <div>
                                <span class="text-xs font-medium text-emerald-600 uppercase">KOLOM</span>
                                <h4 class="font-bold text-gray-900 group-hover:text-blue-600">
                                    <a href="#">Antara Mahbub Djunaidi dan Prabowo: Kuasa Pajak</a>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="flex items-start gap-3">
                            <img src="images/prabowo.jpg" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                            <div>
                                <span class="text-xs font-medium text-emerald-600 uppercase">SYARIAH</span>
                                <h4 class="font-bold text-gray-900 group-hover:text-blue-600">
                                    <a href="#">2 Penyakit Hati Perusak Ibadah dan Cara Mengobatinya</a>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="flex items-start gap-3">
                            <img src="images/prabowo.jpg" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                            <div>
                                <span class="text-xs font-medium text-emerald-600 uppercase">SYARIAH</span>
                                <h4 class="font-bold text-gray-900 group-hover:text-blue-600">
                                    <a href="#">Keutamaan Istri Berinisiatif Ajak Suami Berhubungan Intim</a>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="flex items-start gap-3">
                            <img src="images/prabowo.jpg" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                            <div>
                                <span class="text-xs font-medium text-emerald-600 uppercase">TREN</span>
                                <h4 class="font-bold text-gray-900 group-hover:text-blue-600">
                                    <a href="#">Mengenal Gamofobia, Ketakutan Seseorang untuk Menikah</a>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="group">
                        <div class="flex items-start gap-3">
                            <img src="images/prabowo.jpg" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                            <div>
                                <span class="text-xs font-medium text-emerald-600 uppercase">MOZAIK</span>
                                <h4 class="font-bold text-gray-900 group-hover:text-blue-600">
                                    <a href="#">Gus Dur dan iGoon Band</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

