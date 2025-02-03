@extends('user.layouts.app')

@section('content')
<div class="container max-w-6xl mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <div class="flex items-center text-gray-600 mb-8">
        <a href="" class="hover:text-gray-800">Home</a>
        <span class="mx-2">></span>
        <span>Syariah</span>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Left Column -->
        <div class="lg:col-span-6">
            <h1 class="text-4xl font-bold mb-6">Sahkah Salat Berjamaah Terhalang Jeruji Besi di Penjara?</h1>
            
            <!-- Author Info -->
            <div class="flex items-center mb-4">
                <img src="{{ asset('images/prabowo.jpg') }}" alt="Author" class="w-10 h-10 rounded-full">
                <div class="ml-3">
                    <p class="text-green-600">A. Zaeini Misbahuddin Asyuari | ARINA.ID</p>
                    <p class="text-gray-500 text-sm">Senin, 3 Februari 2023 | 18:00 WIB · 25 menit</p>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="lg:col-span-6">
            <!-- Featured Image -->
            <div class="mb-6">
                <img src="{{ asset('images/background_sawah.jpg') }}" alt="Penjara" class="w-full rounded-lg">
               
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <div class="max-w-7xl mx-auto mt-8 grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Main Content Column -->
        <div class="lg:col-span-8">
            <div class="prose max-w-none">
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Arina.id - Belakangan ini, ramai video berdurasi singkat yang merekam momen para narapidana di lembaga pemasyarakatan sedang melaksanakan <span class="text-green-600">sholat</span> berjamaah dengan seorang sipir <span class="text-green-600">penjara</span> sebagai imam. Menariknya, posisi imam berada di bagian depan ruangan sementara para makmum berada di belakangnya dalam sel penjara, sehingga terdapat tembok <span class="text-green-600">jeruji</span> besi yang memisahkan antara imam dan makmum.
                </p>
                
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed mt-4">
                    Tentu saja, momen ini memicu perdebatan di media sosial. Banyak yang menilai kegiatan sholat berjamaah itu sebagai simbol harapan bahwa hidayah dapat datang di mana saja, meskipun dalam keadaan terbatas seperti di penjara. Namun di sisi lain, ada juga yang meragukan keabsahan sholat berjamaah tersebut.
                </p>

                <!-- Add "Baca Juga" section -->
                <div class="my-6 border-l-4 border-green-500 pl-4">
                    <p class="font-semibold text-gray-600 dark:text-gray-400">Baca Juga:</p>
                    <a href="#" class="text-green-600 hover:text-green-700">
                        Wajibkah Bagian Tubuh Korban Mutilasi Dimandikan dan Disholati?
                    </a>
                </div>

                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Arina.id - Belakangan ini, ramai video berdurasi singkat yang merekam momen para narapidana di lembaga pemasyarakatan sedang melaksanakan <span class="text-green-600">sholat</span> berjamaah dengan seorang sipir <span class="text-green-600">penjara</span> sebagai imam. Menariknya, posisi imam berada di bagian depan ruangan sementara para makmum berada di belakangnya dalam sel penjara, sehingga terdapat tembok <span class="text-green-600">jeruji</span> besi yang memisahkan antara imam dan makmum.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Arina.id - Belakangan ini, ramai video berdurasi singkat yang merekam momen para narapidana di lembaga pemasyarakatan sedang melaksanakan <span class="text-green-600">sholat</span> berjamaah dengan seorang sipir <span class="text-green-600">penjara</span> sebagai imam. Menariknya, posisi imam berada di bagian depan ruangan sementara para makmum berada di belakangnya dalam sel penjara, sehingga terdapat tembok <span class="text-green-600">jeruji</span> besi yang memisahkan antara imam dan makmum.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Arina.id - Belakangan ini, ramai video berdurasi singkat yang merekam momen para narapidana di lembaga pemasyarakatan sedang melaksanakan <span class="text-green-600">sholat</span> berjamaah dengan seorang sipir <span class="text-green-600">penjara</span> sebagai imam. Menariknya, posisi imam berada di bagian depan ruangan sementara para makmum berada di belakangnya dalam sel penjara, sehingga terdapat tembok <span class="text-green-600">jeruji</span> besi yang memisahkan antara imam dan makmum.
                </p>
                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                    Arina.id - Belakangan ini, ramai video berdurasi singkat yang merekam momen para narapidana di lembaga pemasyarakatan sedang melaksanakan <span class="text-green-600">sholat</span> berjamaah dengan seorang sipir <span class="text-green-600">penjara</span> sebagai imam. Menariknya, posisi imam berada di bagian depan ruangan sementara para makmum berada di belakangnya dalam sel penjara, sehingga terdapat tembok <span class="text-green-600">jeruji</span> besi yang memisahkan antara imam dan makmum.
                </p>
            </div>
        </div>

        <!-- Sidebar Column -->
        <div class="lg:col-span-4">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-4">
                <h3 class="font-bold text-lg mb-4 dark:text-white">TERPOPULER</h3>
                <div class="space-y-4">
                    <!-- Editor Pick Items -->
                    <div class="flex items-center gap-4">
                        <span class="text-4xl font-bold text-green-600">1</span>
                        <a href="#" class="hover:text-green-600">
                            <h4 class="font-semibold dark:text-white">16 Pos Belanja Kementerian Harus 'Ngirit', Dipangkas 10 sampai 90 Persen</h4>
                        </a>
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-4xl font-bold text-green-600">2</span>
                        <a href="#" class="hover:text-green-600">
                            <h4 class="font-semibold dark:text-white">Buku 'Makanya, Mikir!': Antara Idealis dan Realistis dalam Hidup</h4>
                        </a>
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-4xl font-bold text-green-600">3</span>
                        <a href="#" class="hover:text-green-600">
                            <h4 class="font-semibold dark:text-white">Setuju dan Tidak Setuju 'Sogokan Hasanah', Sanggahan untuk Muhammad Ibnu Sahroji</h4>
                        </a>
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-4xl font-bold text-green-600">4</span>
                        <a href="#" class="hover:text-green-600">
                            <h4 class="font-semibold dark:text-white">100 Tahun Pramoedya Ananta Toer (1925-2025): Sejarah dan 'Darah' Tionghoa</h4>
                        </a>
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-4xl font-bold text-green-600">5</span>
                        <a href="#" class="hover:text-green-600">
                            <h4 class="font-semibold dark:text-white">DeepSeek, Kuasa Digital China yang Menggeser Geopolitik Teknologi</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
