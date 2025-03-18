<div class="container px-2.5 sm:px-4 mt-4 dark:bg-gray-900">
    <!-- Berita Terbaru Section -->
    <h2 class="mb-4 dark:text-white">{{ $categoryName }}</h2>

    @if(isset($articles) && $articles->isNotEmpty())
    <!-- Main News Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mb-6">
        <!-- Featured News -->
        <div class="col-span-1 lg:col-span-8">
            <a href="{{ route('artikel.view', $articles->first()->id) }}">
                <div class="relative h-[20rem] lg:h-[28rem] rounded-xl overflow-hidden">
                    <img src="{{ $articles->first()->image ? url('images/' . $articles->first()->image) : asset('images/berita1.jpg') }}" class="w-full h-full object-cover" alt="{{ $articles->first()->title }}">
                    <div class="absolute bottom-0 left-0 right-0 p-4 lg:p-6 bg-gradient-to-t from-black/80 to-transparent">
                        <span class="inline-block bg-blue-900 dark:bg-blue-700 text-white text-xs px-2 py-0.5 rounded mb-2">{{ ucfirst($articles->first()->category) }}</span>
                        <h2 class="text-white text-xl lg:text-2xl font-bold">{{ $articles->first()->title }}</h2>
                    </div>
                </div>
            </a>
        </div>

        <!-- Popular News -->
        @include('user.partials.popular-news')
    </div>

    <!-- News Content with Sidebar Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Main News List -->
        @include('user.partials.article-list')

        <!-- Sidebar -->
        @include('user.partials.editor-picks')
    </div>
    @else
    <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-sm text-center">
        <h3 class="text-xl font-bold mb-4 dark:text-white">Belum Ada Artikel</h3>
        <p class="text-gray-600 dark:text-gray-300">Saat ini belum ada artikel tersedia dalam kategori {{ $categoryName }}.</p>
    </div>
    @endif
</div> 