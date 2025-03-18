@extends('admin.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.css">
@endsection

@section('content')
    <div class="container mx-auto px-4">
        <!-- Error Alert -->
        @if(isset($error))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md">
            <p>{{ $error }}</p>
        </div>
        @endif
    
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
            <p class="text-gray-600 mt-2">Selamat datang, {{ Auth::user()->name }}</p>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Artikel Card -->
            <div class="bg-white rounded-lg shadow p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-newspaper text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total Artikel</p>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $totalArticles ?? 0 }}</h2>
                    </div>
                </div>
            </div>
            
            <!-- User Card -->
            <div class="bg-white rounded-lg shadow p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total Pengguna</p>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $totalUsers ?? 0 }}</h2>
                    </div>
                </div>
            </div>
            
            <!-- Views Card -->
            <div class="bg-white rounded-lg shadow p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <i class="fas fa-eye text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total Views</p>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $totalViews ?? 0 }}</h2>
                    </div>
                </div>
            </div>
            
            <!-- Visitor Card -->
            <div class="bg-white rounded-lg shadow p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-chart-line text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Pengunjung Hari Ini</p>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $todayVisitors ?? 0 }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Traffic</h3>
                <div id="trafficChart" class="h-80"></div>
            </div>
            
            <div class="bg-white rounded-lg shadow p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Kategori</h3>
                <div id="categoryChart" class="h-80"></div>
            </div>
        </div>
        
        <!-- Recent Articles -->
        <div class="bg-white rounded-lg shadow mb-8 border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">Artikel Terbaru</h3>
                    <div class="relative">
                        <input type="text" id="articleSearch" placeholder="Cari artikel..." 
                               class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Penulis</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="articlesTableBody">
                        @forelse($recentArticles ?? [] as $article)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="text-blue-600 hover:text-blue-800">
                                    {{ Str::limit($article->title, 40) }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($article->category) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $article->user->name ?? 'Unknown' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $article->status == 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                    {{ ucfirst($article->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $article->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada artikel</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Traffic Chart
        var trafficOptions = {
            series: [{
                name: 'Pengunjung',
                data: {{ json_encode($weeklyVisitorsData ?? [0, 0, 0, 0, 0, 0, 0]) }}
            }],
            chart: {
                type: 'area',
                height: 320,
                toolbar: {
                    show: false
                }
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: {{ json_encode($weekDays ?? ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']) }}
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.2
                }
            }
        };

        var trafficChart = new ApexCharts(document.querySelector("#trafficChart"), trafficOptions);
        trafficChart.render();

        // Category Chart
        var categoryOptions = {
            series: {{ json_encode($categoryCounts ?? [1]) }},
            chart: {
                type: 'donut',
                height: 320
            },
            labels: {{ json_encode($categoryNames ?? ['Tidak Ada Kategori']) }},
            colors: ['#4F46E5', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#EC4899', '#0EA5E9', '#14B8A6'],
            legend: {
                position: 'bottom'
            }
        };

        var categoryChart = new ApexCharts(document.querySelector("#categoryChart"), categoryOptions);
        categoryChart.render();
        
        // Fungsi pencarian artikel
        document.getElementById('articleSearch').addEventListener('keyup', function() {
            var input = this.value.toLowerCase();
            var tbody = document.getElementById('articlesTableBody');
            var rows = tbody.getElementsByTagName('tr');
            
            for (var i = 0; i < rows.length; i++) {
                var showRow = false;
                var cells = rows[i].getElementsByTagName('td');
                
                if (cells.length > 0) {
                    if (cells[0].textContent.toLowerCase().indexOf(input) > -1 || 
                        cells[1].textContent.toLowerCase().indexOf(input) > -1 || 
                        cells[2].textContent.toLowerCase().indexOf(input) > -1) {
                        showRow = true;
                    }
                }
                
                rows[i].style.display = showRow ? '' : 'none';
            }
        });
    </script>
@endsection
