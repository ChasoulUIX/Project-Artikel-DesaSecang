<!-- Sidebar Menu -->
<ul class="space-y-2">
    <li>
        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('dashboard') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <i class="fas fa-tachometer-alt mr-3"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="{{ route('articles.index') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('articles.*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <i class="fas fa-newspaper mr-3"></i>
            <span>Artikel</span>
        </a>
    </li>
    <li>
        <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-2 {{ request()->routeIs('categories.*') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
            <i class="fas fa-tags mr-3"></i>
            <span>Kategori</span>
        </a>
    </li>
</ul> 