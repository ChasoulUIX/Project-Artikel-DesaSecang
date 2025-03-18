@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Artikel</h1>
        <div>
            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <a href="{{ route('articles.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $article->title }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p><strong>Penulis:</strong> {{ $article->user->name }}</p>
                    <p><strong>Kategori:</strong> {{ ucfirst($article->category) }}</p>
                    <p><strong>Tanggal Publikasi:</strong> {{ $article->created_at->format('d-m-Y H:i') }}</p>
                    <p><strong>Jumlah Dibaca:</strong> {{ $article->view_count }} kali</p>
                    
                    <div class="mt-4">
                        <h5>Deskripsi:</h5>
                        <div class="border p-3 rounded">
                            {!! $article->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    @if ($article->image)
                        <div class="text-center">
                            <h5>Gambar:</h5>
                            <img src="{{ url('images/' . $article->image) }}" class="img-fluid rounded" alt="Gambar Artikel">
                        </div>
                    @else
                        <div class="alert alert-info">
                            Tidak ada gambar untuk artikel ini.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 