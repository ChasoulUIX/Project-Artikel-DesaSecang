@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori Artikel</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Artikel berdasarkan Kategori</h6>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <form action="{{ route('categories.index') }}" method="GET" class="mb-6">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <a href="{{ route('categories.index') }}" class="px-4 py-2 {{ !$selectedCategory ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }} rounded-lg hover:bg-blue-700 hover:text-white transition-colors">
                            Semua
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('categories.index', ['category' => $category]) }}" 
                               class="px-4 py-2 {{ $selectedCategory == $category ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }} rounded-lg hover:bg-blue-700 hover:text-white transition-colors">
                                {{ ucfirst($category) }}
                            </a>
                        @endforeach
                    </div>
                </form>

                @if($selectedCategory)
                    <div class="mb-4">
                        <div class="inline-block px-3 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded-lg">
                            Filter aktif: {{ $selectedCategory ? ucfirst($selectedCategory) : 'Semua Kategori' }}
                            <a href="{{ route('categories.index') }}" class="ml-2 text-blue-600 hover:text-blue-800">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Jumlah Dibaca</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $key => $article)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->user->name }}</td>
                            <td>
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    @if($article->category == 'berita') bg-blue-100 text-blue-800
                                    @elseif($article->category == 'budaya') bg-green-100 text-green-800
                                    @elseif($article->category == 'khutbah') bg-purple-100 text-purple-800
                                    @elseif($article->category == 'doa') bg-yellow-100 text-yellow-800
                                    @elseif($article->category == 'kerukunan') bg-pink-100 text-pink-800
                                    @elseif($article->category == 'pendidikan') bg-indigo-100 text-indigo-800
                                    @elseif($article->category == 'politik') bg-red-100 text-red-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($article->category) }}
                                </span>
                            </td>
                            <td>
                                @if ($article->image)
                                    <img src="{{ url('images/' . $article->image) }}" width="100" alt="Gambar Artikel">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td>{{ $article->view_count }} kali</td>
                            <td>{{ $article->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada artikel yang ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('#dataTable').DataTable();
    });
</script>
@endsection 