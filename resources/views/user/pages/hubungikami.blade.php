@extends('user.layouts.app')

@section('content')
<div class="container mx-auto px-2.5 md:px-4">
    <!-- Hero Section -->
    <section class="relative h-[300px] md:h-[400px] mb-8 md:mb-16 rounded-2xl overflow-hidden">
        <img src="{{ asset('images/background_sawah.jpg') }}" alt="NU Desa Secang" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 to-transparent flex items-center">
            <div class="px-4 md:px-12">
                <h1 class="text-2xl md:text-4xl font-bold text-white mb-2 md:mb-4">Hubungi Kami</h1>
                <p class="text-base md:text-xl text-white/90 max-w-2xl">
                    Silakan hubungi kami untuk informasi lebih lanjut atau kirimkan pesan Anda
                </p>
            </div>
        </div>
    </section>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-12 mb-8 md:mb-16">
        <!-- Form Kontak -->
        <section>
            <div class="flex items-center gap-2 mb-4 md:mb-8">
                <div class="w-8 md:w-10 h-1 bg-blue-900 dark:bg-blue-500 rounded-full"></div>
                <h2 class="text-2xl md:text-3xl font-bold text-blue-900 dark:text-blue-500">Form Kontak</h2>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-xl md:rounded-2xl shadow-lg p-4 md:p-8">
                <form action="#" method="POST" class="space-y-4 md:space-y-6">
                    @csrf
                    <div>
                        <label for="nama" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="w-full px-3 md:px-4 py-2 md:py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Email</label>
                        <input type="email" name="email" id="email" class="w-full px-3 md:px-4 py-2 md:py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="pesan" class="block text-gray-700 dark:text-gray-200 font-medium mb-2">Pesan</label>
                        <textarea name="pesan" id="pesan" rows="5" class="w-full px-3 md:px-4 py-2 md:py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-900 dark:bg-blue-600 text-white font-medium py-2 md:py-3 rounded-lg hover:bg-blue-800 dark:hover:bg-blue-500 transition-colors">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </section>

        <!-- Informasi Kontak -->
        <section>
            <div class="flex items-center gap-2 mb-4 md:mb-8">
                <div class="w-8 md:w-10 h-1 bg-blue-900 dark:bg-blue-500 rounded-full"></div>
                <h2 class="text-2xl md:text-3xl font-bold text-blue-900 dark:text-blue-500">Informasi Kontak</h2>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-xl md:rounded-2xl shadow-lg p-4 md:p-8 space-y-4 md:space-y-6">
                <div class="flex items-start gap-3 md:gap-4">
                    <div class="bg-emerald-100 dark:bg-emerald-900/30 p-2 md:p-3 rounded-full">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-1">Email</h3>
                        <p class="text-sm md:text-base text-gray-600 dark:text-gray-300">info@desasecang.com</p>
                    </div>
                </div>
                
                <div class="flex items-start gap-3 md:gap-4">
                    <div class="bg-emerald-100 dark:bg-emerald-900/30 p-2 md:p-3 rounded-full">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-1">Telepon</h3>
                        <p class="text-sm md:text-base text-gray-600 dark:text-gray-300">(0321) 123456</p>
                    </div>
                </div>

                <div class="flex items-start gap-3 md:gap-4">
                    <div class="bg-emerald-100 dark:bg-emerald-900/30 p-2 md:p-3 rounded-full">
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 dark:text-white mb-1">Alamat</h3>
                        <p class="text-sm md:text-base text-gray-600 dark:text-gray-300">Jl. Raya Secang No. 123<br>Desa Secang, Kec. Secang<br>Magelang, Jawa Tengah</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Google Maps -->
    <section class="mb-8 md:mb-16">
        <div class="flex items-center gap-2 mb-4 md:mb-8">
            <div class="w-8 md:w-10 h-1 bg-blue-900 dark:bg-blue-500 rounded-full"></div>
            <h2 class="text-2xl md:text-3xl font-bold text-blue-900 dark:text-blue-500">Lokasi Kami</h2>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl md:rounded-2xl shadow-lg p-4 md:p-8">
            <div class="w-full h-[300px] md:h-[400px] rounded-xl overflow-hidden">
            <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15810.927876840095!2d113.37544673476563!3d-7.837782099999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6ff7e322d8fe3%3A0x761642564682d2ab!2sSumbersecang%2C%20Kec.%20Gading%2C%20Kabupaten%20Probolinggo%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1709799051099!5m2!1sid!2sid"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        class="w-full">
                    </iframe>
            </div>
        </div>
    </section>
</div>
@endsection
