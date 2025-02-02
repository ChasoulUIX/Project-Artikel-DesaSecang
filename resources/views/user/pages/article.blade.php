@extends('user.layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-8 py-12">
    <article class="max-w-4xl mx-auto">
        <!-- Judul Besar -->
        <h1 class="text-4xl font-bold text-primary mb-6">
            Etnis Tionghoa dan Politik Bangsa: Integrasi atau Asimilasi yang Gagal?
        </h1>

        <!-- Informasi Penulis, Tanggal, dan Kategori -->
        <div class="flex items-center gap-4 mb-8">
            <div class="flex items-center gap-2">
                <img src="/images/author.jpg" alt="Penulis" class="w-10 h-10 rounded-full">
                <div>
                    <div class="font-medium text-primary">Ahmad Fuadi</div>
                    <div class="text-sm text-gray-500">Kontributor</div>
                </div>
            </div>
            <span class="text-gray-300">•</span>
            <span class="text-gray-600">1 Februari 2024</span>
            <span class="text-gray-300">•</span>
            <a href="/kategori/politik" class="text-primary-light hover:underline">Politik</a>
        </div>

        <!-- Konten Artikel -->
        <div class="prose prose-lg max-w-none mb-8">
            <img src="/images/article-featured.jpg" alt="Featured Image" class="w-full rounded-xl mb-8">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
            <!-- Tambahkan konten artikel lainnya -->
        </div>

        <!-- Tombol Share Media Sosial -->
        <div class="flex items-center gap-4 border-t border-b py-6 mb-8">
            <span class="font-medium text-gray-600">Bagikan artikel ini:</span>
            <a href="#" class="flex items-center gap-2 text-blue-600 hover:text-blue-700">
                <i class="fab fa-facebook"></i>
                <span>Facebook</span>
            </a>
            <a href="#" class="flex items-center gap-2 text-blue-400 hover:text-blue-500">
                <i class="fab fa-twitter"></i>
                <span>Twitter</span>
            </a>
            <a href="#" class="flex items-center gap-2 text-green-600 hover:text-green-700">
                <i class="fab fa-whatsapp"></i>
                <span>WhatsApp</span>
            </a>
        </div>

        <!-- Komentar Disqus/Facebook -->
        <div class="mb-12">
            <h3 class="text-2xl font-bold text-primary mb-6">Komentar</h3>
            <div id="disqus_thread"></div>
        </div>

        <!-- Artikel Terkait -->
        <div class="mb-12">
            <h3 class="text-2xl font-bold text-primary mb-6">Artikel Terkait</h3>
            <div class="grid grid-cols-2 gap-8">
                @for ($i = 1; $i <= 2; $i++)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <img src="/images/related-{{$i}}.jpg" alt="Related Article" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-sm text-primary-light">Politik</span>
                            <span class="text-gray-500 text-sm">1 Februari 2024</span>
                        </div>
                        <h4 class="font-bold text-lg text-primary hover:text-primary-light transition duration-300">
                            <a href="#">Judul Artikel Terkait {{$i}}</a>
                        </h4>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </article>
</div>
@endsection

@push('scripts')
<!-- Disqus -->
<script>
    var disqus_config = function () {
        this.page.url = '{{ url()->current() }}';
        this.page.identifier = 'article-1'; // Ganti dengan ID artikel yang sebenarnya
    };
    
    (function() {
        var d = document, s = d.createElement('script');
        s.src = 'https://YOUR-DISQUS-SHORTNAME.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>

<!-- Share Buttons -->
<script>
    function shareOnFacebook() {
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(window.location.href));
    }
    
    function shareOnTwitter() {
        window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(window.location.href));
    }
    
    function shareOnWhatsApp() {
        window.open('https://api.whatsapp.com/send?text=' + encodeURIComponent(window.location.href));
    }
</script>
@endpush
