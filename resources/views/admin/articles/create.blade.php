@extends('admin.layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="flex justify-between items-center p-6 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-800">Tambah Artikel Baru</h1>
        <a href="{{ route('articles.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition-colors duration-150 flex items-center gap-2">
            <i class="fas fa-arrow-left"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="p-6">
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                <div class="font-medium">Terdapat kesalahan pada input:</div>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select id="category" name="category" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ ucfirst($category) }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar (Opsional)</label>
                <div class="flex items-center">
                    <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-blue-500 rounded-lg border-2 border-dashed border-blue-200 hover:bg-gray-50 cursor-pointer">
                        <i class="fas fa-cloud-upload-alt text-3xl mb-2"></i>
                        <span class="text-sm font-medium">Pilih file gambar</span>
                        <span class="text-xs text-gray-500 mt-1">Format: jpeg, png, jpg, gif (maks. 2MB)</span>
                        <input type="file" id="image" name="image" class="hidden">
                    </label>
                </div>
                <div id="image-preview" class="mt-2 hidden">
                    <div class="flex items-center">
                        <img id="preview-img" class="h-24 w-32 object-cover rounded border" alt="Preview">
                        <button type="button" id="remove-image" class="ml-2 text-red-500 hover:text-red-700">
                            <i class="fas fa-times-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea id="description" name="description" class="summernote">{{ old('description') }}</textarea>
            </div>
            
            <div class="mt-6">
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-150">
                    <i class="fas fa-save mr-2"></i>Simpan Artikel
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        
        // Image preview functionality
        $('#image').change(function() {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    $('#preview-img').attr('src', event.target.result);
                    $('#image-preview').removeClass('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
        
        $('#remove-image').click(function() {
            $('#image').val('');
            $('#image-preview').addClass('hidden');
        });
    });
</script>
@endsection 