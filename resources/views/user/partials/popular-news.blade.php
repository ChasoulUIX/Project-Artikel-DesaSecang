<div class="col-span-1 lg:col-span-4">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
        <div class="bg-blue-900 dark:bg-blue-700 text-white px-4 py-3">
            <h3 class="font-bold">TERPOPULER</h3>
        </div>
        <div class="divide-y dark:divide-gray-700">
            @if(isset($popularArticlesAll) && $popularArticlesAll->isNotEmpty())
                @foreach($popularArticlesAll as $index => $article)
                    <a href="{{ route('artikel.view', $article->id) }}" class="flex items-center gap-4 p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span class="text-xl lg:text-2xl font-bold text-blue-900 dark:text-blue-400">{{ $index + 1 }}</span>
                        <p class="font-medium text-sm lg:text-base text-gray-800 dark:text-gray-200">{{ $article->title }}</p>
                    </a>
                @endforeach
            @else
                @php
                    $popularArticles = $articles->sortByDesc('view_count')->take(5);
                @endphp
                @foreach($popularArticles as $index => $article)
                    <a href="{{ route('artikel.view', $article->id) }}" class="flex items-center gap-4 p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span class="text-xl lg:text-2xl font-bold text-blue-900 dark:text-blue-400">{{ $index + 1 }}</span>
                        <p class="font-medium text-sm lg:text-base text-gray-800 dark:text-gray-200">{{ $article->title }}</p>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div> 