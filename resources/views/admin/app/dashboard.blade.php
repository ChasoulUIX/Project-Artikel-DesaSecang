@extends('admin.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.css">
@endsection

@section('content')
    <div>
        <!-- Error Alert -->
        @if(isset($error))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md">
            <p class="font-medium">Error:</p>
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
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <i class="fas fa-newspaper text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total Artikel</p>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $totalArticles ?? 0 }}</h2>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('articles.index') }}" class="text-blue-600 hover:text-blue-800 text-sm flex items-center">
                        <span>Kelola Artikel</span>
                        <i class="fas fa-arrow-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>
            
            <!-- User Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100 text-green-600">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total Pengguna</p>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $totalUsers ?? 0 }}</h2>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <a href="#" class="text-green-600 hover:text-green-800 text-sm flex items-center">
                        <span>Kelola Pengguna</span>
                        <i class="fas fa-arrow-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>
            
            <!-- Views Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <i class="fas fa-eye text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Total Views</p>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $totalViews ?? 0 }}</h2>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="text-purple-600 text-sm flex items-center">
                        @if(isset($totalArticles) && $totalArticles > 0 && isset($totalViews))
                            <span>{{ round($totalViews / $totalArticles, 1) }} views per artikel</span>
                        @else
                            <span>0 views per artikel</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Visitor Card -->
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                        <i class="fas fa-chart-line text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600">Pengunjung Hari Ini</p>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $todayVisitors ?? 0 }}</h2>
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('user.traffic') }}" class="text-yellow-600 hover:text-yellow-800 text-sm flex items-center">
                        <span>Lihat Traffic</span>
                        <i class="fas fa-arrow-right ml-1 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Charts -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Traffic Pengunjung Mingguan</h3>
                    <select id="trafficPeriod" class="text-sm border border-gray-300 rounded p-1">
                        <option value="week">Minggu Ini</option>
                        <option value="month">Bulan Ini</option>
                    </select>
                </div>
                <div id="trafficChart" class="h-80"></div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Distribusi Kategori</h3>
                    <div class="text-xs text-gray-500">{{ $totalArticles ?? 0 }} total artikel</div>
                </div>
                <div id="categoryChart" class="h-80"></div>
            </div>
        </div>
        
        <!-- Recent Articles -->
        @if(isset($recentArticles) && count($recentArticles) > 0)
        <div class="bg-white rounded-lg shadow-md mb-8 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                    <h3 class="text-lg font-bold text-gray-800">Artikel Terbaru</h3>
                    <div class="w-full md:w-auto">
                        <div class="relative">
                            <input type="text" id="articleSearch" placeholder="Cari artikel..." 
                                  class="w-full md:w-64 pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Views</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="articlesTableBody">
                        @foreach($recentArticles as $article)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    @if(isset($article->image) && $article->image)
                                        <img class="h-10 w-10 rounded-md object-cover mr-3" src="{{ url('images/' . $article->image) }}" alt="">
                                    @else
                                        <div class="h-10 w-10 rounded-md bg-gray-200 mr-3 flex items-center justify-center">
                                            <i class="fas fa-newspaper text-gray-400"></i>
                                        </div>
                                    @endif
                                    <div class="truncate max-w-xs">
                                        {{ Str::limit($article->title, 40) }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ ucfirst($article->category) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-6 w-6 rounded-full mr-2" src="https://ui-avatars.com/api/?name={{ urlencode($article->user->name ?? 'Unknown') }}&background=3b82f6&color=fff" alt="">
                                    {{ $article->user->name ?? 'Unknown' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-eye text-gray-400 mr-1"></i>
                                    {{ $article->view_count ?? 0 }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar text-gray-400 mr-1"></i>
                                    {{ $article->created_at ? $article->created_at->format('d M Y') : 'N/A' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-2">
                                    <a href="{{ route('articles.edit', $article->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('articles.show', $article->id) }}" class="text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
                <a href="{{ route('articles.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center text-sm">
                    <span>Lihat Semua Artikel</span>
                    <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        @else
        <div class="bg-white rounded-lg shadow-md mb-8 p-8 text-center">
            <div class="flex flex-col items-center">
                <div class="text-gray-300 text-5xl mb-4">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-700 mb-2">Belum Ada Artikel</h3>
                <p class="text-gray-500 mb-6">Mulai tambahkan artikel pertama Anda untuk ditampilkan di sini.</p>
                <a href="{{ route('articles.create') }}" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-150">
                    <i class="fas fa-plus-circle mr-2"></i>Tambah Artikel Baru
                </a>
            </div>
        </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // Traffic Chart - With error handling
        try {
            var trafficOptions = {
                series: [{
                    name: 'Pengunjung',
                    data: {{ isset($weeklyVisitorsData) ? json_encode($weeklyVisitorsData) : '[0, 0, 0, 0, 0, 0, 0]' }}
                }],
                chart: {
                    type: 'area',
                    height: 320,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                colors: ['#4F46E5'],
                xaxis: {
                    categories: {{ isset($weekDays) ? json_encode($weekDays) : "['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']" }},
                    tooltip: {
                        enabled: false
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function (value) {
                            return Math.round(value);
                        }
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.2,
                        stops: [0, 90, 100]
                    }
                },
                tooltip: {
                    y: {
                        formatter: function (value) {
                            return value + " pengunjung";
                        }
                    }
                }
            };

            var trafficChart = new ApexCharts(document.querySelector("#trafficChart"), trafficOptions);
            trafficChart.render();
        } catch(e) {
            console.error("Error rendering traffic chart:", e);
            document.querySelector("#trafficChart").innerHTML = '<div class="flex items-center justify-center h-full"><p class="text-gray-500">Tidak dapat memuat grafik traffic</p></div>';
        }

        // Category Chart - With error handling
        try {
            var categoryOptions = {
                series: {{ isset($categoryCounts) ? json_encode($categoryCounts) : '[0]' }},
                chart: {
                    type: 'donut',
                    height: 320
                },
                labels: {{ isset($categoryNames) ? json_encode($categoryNames) : "['Tidak Ada Kategori']" }},
                colors: ['#4F46E5', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#EC4899', '#0EA5E9', '#14B8A6'],
                legend: {
                    position: 'bottom',
                    fontSize: '14px',
                    fontFamily: 'Inter, sans-serif',
                    markers: {
                        width: 12,
                        height: 12,
                        strokeWidth: 0,
                        strokeColor: '#fff',
                        radius: 12
                    },
                    itemMargin: {
                        horizontal: 10,
                        vertical: 5
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '50%',
                            labels: {
                                show: true,
                                name: {
                                    show: true
                                },
                                value: {
                                    show: true,
                                    formatter: function (val) {
                                        return val + " artikel";
                                    }
                                },
                                total: {
                                    show: true,
                                    label: 'Total',
                                    formatter: function (w) {
                                        return w.globals.seriesTotals.reduce((a, b) => a + b, 0) + " artikel";
                                    }
                                }
                            }
                        }
                    }
                }
            };

            var categoryChart = new ApexCharts(document.querySelector("#categoryChart"), categoryOptions);
            categoryChart.render();
        } catch(e) {
            console.error("Error rendering category chart:", e);
            document.querySelector("#categoryChart").innerHTML = '<div class="flex items-center justify-center h-full"><p class="text-gray-500">Tidak dapat memuat grafik kategori</p></div>';
        }
        
        // Search functionality
        try {
            var articleSearch = document.getElementById('articleSearch');
            if (articleSearch) {
                articleSearch.addEventListener('keyup', function() {
                    var input = this.value.toLowerCase();
                    var tbody = document.getElementById('articlesTableBody');
                    if (!tbody) return;
                    
                    var rows = tbody.getElementsByTagName('tr');
                    
                    for (var i = 0; i < rows.length; i++) {
                        var showRow = false;
                        var cells = rows[i].getElementsByTagName('td');
                        
                        // Skip empty state row
                        if (cells.length <= 1) continue;
                        
                        for (var j = 0; j < cells.length; j++) {
                            if (cells[j].textContent.toLowerCase().indexOf(input) > -1) {
                                showRow = true;
                                break;
                            }
                        }
                        
                        rows[i].style.display = showRow ? '' : 'none';
                    }
                });
            }
        } catch(e) {
            console.error("Error initializing search:", e);
        }
        
        // Traffic period toggle
        try {
            var trafficPeriod = document.getElementById('trafficPeriod');
            if (trafficPeriod) {
                trafficPeriod.addEventListener('change', function() {
                    // In a real app, this would fetch new data via AJAX
                    // For now, we'll just show a notification
                    alert('This would fetch ' + this.value + ' data in a real application');
                });
            }
        } catch(e) {
            console.error("Error initializing traffic period selector:", e);
        }
    </script>
@endsection
