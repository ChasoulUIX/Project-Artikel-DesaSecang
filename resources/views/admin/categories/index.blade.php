@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="flex justify-between items-center p-6 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-800">Kategori Artikel</h1>
    </div>

    <div class="p-6">
        <div class="mb-6">
            <h2 class="text-lg font-medium text-gray-700 mb-4">Filter Artikel berdasarkan Kategori</h2>
            
            <div class="flex flex-wrap gap-2 mb-4">
                <a href="{{ route('categories.index') }}" class="px-4 py-2 rounded-lg transition-colors {{ !$selectedCategory ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-blue-700 hover:text-white' }}">
                    Semua
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('categories.index', ['category' => $category]) }}" 
                       class="px-4 py-2 rounded-lg transition-colors {{ $selectedCategory == $category ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-blue-700 hover:text-white' }}">
                        {{ ucfirst($category) }}
                    </a>
                @endforeach
            </div>

            @if($selectedCategory)
                <div class="mb-4">
                    <div class="inline-block px-3 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded-lg">
                        Filter aktif: {{ ucfirst($selectedCategory) }}
                        <a href="{{ route('categories.index') }}" class="ml-2 text-blue-600 hover:text-blue-800">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" id="dataTable">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Dibaca</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Dibuat</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($articles as $key => $article)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $article->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex items-center">
                                <img class="h-6 w-6 rounded-full mr-2" src="https://ui-avatars.com/api/?name={{ urlencode($article->user->name) }}&background=3b82f6&color=fff" alt="">
                                {{ $article->user->name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            @if ($article->image)
                                <img src="{{ url('images/' . $article->image) }}" class="h-16 w-24 object-cover rounded" alt="Gambar Artikel">
                            @else
                                <span class="text-gray-400 italic">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="fas fa-eye text-gray-400 mr-2"></i>
                                {{ $article->view_count }} kali
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="fas fa-calendar-alt text-gray-400 mr-2"></i>
                                {{ $article->created_at->format('d-m-Y') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('articles.show', $article->id) }}" class="text-blue-600 hover:text-blue-900 bg-blue-100 hover:bg-blue-200 px-3 py-1 rounded transition-colors">
                                    <i class="fas fa-eye mr-1"></i> Lihat
                                </a>
                                <a href="{{ route('articles.edit', $article->id) }}" class="text-yellow-600 hover:text-yellow-900 bg-yellow-100 hover:bg-yellow-200 px-3 py-1 rounded transition-colors">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 px-3 py-1 rounded transition-colors" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            <div class="flex flex-col items-center py-6">
                                <i class="fas fa-folder-open text-4xl text-gray-300 mb-4"></i>
                                <p>Tidak ada artikel yang ditemukan</p>
                                <a href="{{ route('articles.create') }}" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                    Tambah Artikel Baru
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize DataTable with Tailwind CSS styling
        if (typeof $.fn.DataTable !== 'undefined') {
            $('#dataTable').DataTable({
                "dom": '<"flex flex-col md:flex-row justify-between items-start md:items-center mb-4"<"flex items-center"l><"mt-2 md:mt-0"f>>t<"flex flex-col md:flex-row justify-between items-center"<"mb-2 md:mb-0"i><""p>>',
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ per halaman",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data yang tersedia",
                    "infoFiltered": "(difilter dari _MAX_ total data)",
                    "search": "Cari:",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                },
                "drawCallback": function() {
                    // Apply Tailwind classes to DataTable elements after drawing
                    $('.dataTables_length select').addClass('border border-gray-300 rounded px-2 py-1 mr-2 focus:outline-none focus:ring-2 focus:ring-blue-500');
                    $('.dataTables_filter input').addClass('border border-gray-300 rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-blue-500');
                    $('.paginate_button').addClass('px-3 py-1 mx-1 bg-gray-100 text-gray-700 rounded hover:bg-blue-600 hover:text-white');
                    $('.paginate_button.current').addClass('bg-blue-600 text-white').removeClass('bg-gray-100 text-gray-700');
                    $('.dataTables_info').addClass('text-gray-600 text-sm');
                    $('.dataTables_paginate').addClass('space-x-1');
                }
            });
        }
    });
</script>
@endsection 