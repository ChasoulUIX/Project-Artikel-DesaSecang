@extends('admin.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="flex justify-between items-center p-6 border-b border-gray-200">
        <h1 class="text-2xl font-semibold text-gray-800">Traffic Pengunjung</h1>
    </div>

    <!-- Filter periode -->
    <div class="p-6">
        <h2 class="text-lg font-medium text-gray-700 mb-4">Filter Periode</h2>
        <form action="{{ route('user.traffic') }}" method="GET" class="mb-0">
            <div class="flex flex-wrap gap-4 items-end">
                <div class="w-full md:w-52">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Periode</label>
                    <select name="period" id="period" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="today" {{ $period == 'today' ? 'selected' : '' }}>Hari Ini</option>
                        <option value="yesterday" {{ $period == 'yesterday' ? 'selected' : '' }}>Kemarin</option>
                        <option value="week" {{ $period == 'week' ? 'selected' : '' }}>7 Hari Terakhir</option>
                        <option value="month" {{ $period == 'month' ? 'selected' : '' }}>30 Hari Terakhir</option>
                        <option value="year" {{ $period == 'year' ? 'selected' : '' }}>1 Tahun Terakhir</option>
                        <option value="custom" {{ $period == 'custom' ? 'selected' : '' }}>Kustom</option>
                    </select>
                </div>
                
                <div class="w-full md:w-52 custom-date {{ $period == 'custom' ? '' : 'hidden' }}">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                    <input type="text" name="start_date" id="start_date" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent date-picker" value="{{ $startDate->format('Y-m-d') }}">
                </div>
                
                <div class="w-full md:w-52 custom-date {{ $period == 'custom' ? '' : 'hidden' }}">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir</label>
                    <input type="text" name="end_date" id="end_date" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent date-picker" value="{{ $endDate->format('Y-m-d') }}">
                </div>
                
                <div class="w-full md:w-auto">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-150 w-full md:w-auto">
                        Terapkan Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Total Kunjungan -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg border-l-4 border-blue-500">
        <div class="p-6">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-xs font-semibold text-blue-600 uppercase mb-1">Total Kunjungan</div>
                    <div class="text-2xl font-bold text-gray-800">{{ number_format($totalVisits) }}</div>
                </div>
                <div class="text-gray-300">
                    <i class="fas fa-eye text-3xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengunjung Unik -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg border-l-4 border-green-500">
        <div class="p-6">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-xs font-semibold text-green-600 uppercase mb-1">Pengunjung Unik</div>
                    <div class="text-2xl font-bold text-gray-800">{{ number_format($uniqueVisitors) }}</div>
                </div>
                <div class="text-gray-300">
                    <i class="fas fa-users text-3xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Kunjungan Artikel -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg border-l-4 border-cyan-500">
        <div class="p-6">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-xs font-semibold text-cyan-600 uppercase mb-1">Kunjungan Artikel</div>
                    <div class="text-2xl font-bold text-gray-800">{{ number_format($articleVisits) }}</div>
                </div>
                <div class="text-gray-300">
                    <i class="fas fa-newspaper text-3xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Rasio Artikel/Total -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:-translate-y-1 hover:shadow-lg border-l-4 border-yellow-500">
        <div class="p-6">
            <div class="flex justify-between items-center">
                <div>
                    <div class="text-xs font-semibold text-yellow-600 uppercase mb-1">Rasio Artikel/Total</div>
                    <div class="text-2xl font-bold text-gray-800">
                        {{ $totalVisits > 0 ? round(($articleVisits / $totalVisits) * 100, 1) : 0 }}%
                    </div>
                </div>
                <div class="text-gray-300">
                    <i class="fas fa-percentage text-3xl"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
    <!-- Tren Kunjungan -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Tren Kunjungan</h2>
        </div>
        <div class="p-6">
            <div class="h-80">
                <canvas id="visitsChart"></canvas>
            </div>
        </div>
    </div>
    
    <!-- Distribusi Perangkat -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Distribusi Perangkat</h2>
        </div>
        <div class="p-6">
            <div class="h-80">
                <canvas id="deviceChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Popular Articles -->
<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">Artikel Populer</h2>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Artikel</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Kunjungan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total View Count</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($popularArticles as $key => $article)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href="{{ route('articles.show', $article->id) }}" class="text-blue-600 hover:text-blue-900">
                                {{ $article->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex items-center">
                                <img class="h-6 w-6 rounded-full mr-2" src="https://ui-avatars.com/api/?name={{ urlencode($article->user->name) }}&background=3b82f6&color=fff" alt="">
                                {{ $article->user->name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
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
                            <div class="flex items-center">
                                <i class="fas fa-users text-gray-400 mr-2"></i>
                                {{ $article->visitor_logs_count }} kali
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="fas fa-eye text-gray-400 mr-2"></i>
                                {{ $article->view_count }} kali
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-newspaper text-5xl text-gray-200 mb-4"></i>
                                <p>Tidak ada data</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Halaman dan Referrer -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Halaman Terpopuler -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Halaman Terpopuler</h2>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Halaman</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($pageVisits as $page)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <div class="truncate max-w-md">
                                    {{ $page->page_visited }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="fas fa-chart-line text-gray-400 mr-2"></i>
                                    {{ $page->total }}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-6 py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-file text-5xl text-gray-200 mb-4"></i>
                                    <p>Tidak ada data</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Top Referrer -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-800">Top Referrer</h2>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sumber</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($topReferrers as $referrer)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <div class="truncate max-w-md">
                                    {{ $referrer->referrer ?: 'Direct / None' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="fas fa-link text-gray-400 mr-2"></i>
                                    {{ $referrer->total }}
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="px-6 py-10 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-external-link-alt text-5xl text-gray-200 mb-4"></i>
                                    <p>Tidak ada data</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Pengguna yang Login -->
<div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800">User Aktif</h2>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama User</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Kunjungan</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($loggedInUsers as $key => $userLog)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <div class="flex items-center">
                                <img class="h-8 w-8 rounded-full mr-3" src="https://ui-avatars.com/api/?name={{ urlencode($userLog->user->name) }}&background=3b82f6&color=fff" alt="">
                                {{ $userLog->user->name }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-gray-400 mr-2"></i>
                                {{ $userLog->user->email }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="fas fa-eye text-gray-400 mr-2"></i>
                                {{ $userLog->visit_count }} kali
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-users text-5xl text-gray-200 mb-4"></i>
                                <p>Tidak ada data</p>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize datepicker
        flatpickr(".date-picker", {
            dateFormat: "Y-m-d",
        });
        
        // Toggle custom date fields
        document.getElementById('period').addEventListener('change', function() {
            const customDateFields = document.querySelectorAll('.custom-date');
            if (this.value === 'custom') {
                customDateFields.forEach(field => field.classList.remove('hidden'));
            } else {
                customDateFields.forEach(field => field.classList.add('hidden'));
            }
        });
        
        // Chart configuration
        Chart.defaults.font.family = 'Inter, sans-serif';
        Chart.defaults.color = '#6B7280';
        
        // Visits chart
        const visitsChartCtx = document.getElementById('visitsChart').getContext('2d');
        const visitsChart = new Chart(visitsChartCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($dailyVisits->pluck('date')->map(function($date) { return \Carbon\Carbon::parse($date)->format('d M'); })) !!},
                datasets: [{
                    label: 'Kunjungan',
                    data: {!! json_encode($dailyVisits->pluck('visits')) !!},
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(79, 70, 229, 1)',
                    pointBorderColor: '#fff',
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(229, 231, 235, 0.5)'
                        },
                        ticks: {
                            font: {
                                size: 11
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 11
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#1F2937',
                        bodyColor: '#4B5563',
                        bodyFont: {
                            size: 12
                        },
                        titleFont: {
                            size: 13,
                            weight: 'bold'
                        },
                        padding: 12,
                        borderColor: 'rgba(229, 231, 235, 1)',
                        borderWidth: 1,
                        caretSize: 6,
                        displayColors: false,
                        callbacks: {
                            title: function(context) {
                                return context[0].label;
                            },
                            label: function(context) {
                                return 'Kunjungan: ' + context.parsed.y;
                            }
                        }
                    }
                }
            }
        });
        
        // Device chart
        const deviceChartCtx = document.getElementById('deviceChart').getContext('2d');
        const deviceData = {!! json_encode($deviceStats) !!};
        
        const deviceChart = new Chart(deviceChartCtx, {
            type: 'doughnut',
            data: {
                labels: deviceData.map(item => item.device),
                datasets: [{
                    data: deviceData.map(item => item.total),
                    backgroundColor: [
                        '#4F46E5', '#10B981', '#8B5CF6', '#F43F5E', '#F59E0B', '#6B7280', '#EC4899'
                    ],
                    hoverBackgroundColor: [
                        '#4338CA', '#059669', '#7C3AED', '#E11D48', '#D97706', '#4B5563', '#DB2777'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 12,
                            padding: 15,
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#1F2937',
                        bodyColor: '#4B5563',
                        bodyFont: {
                            size: 12
                        },
                        titleFont: {
                            size: 13,
                            weight: 'bold'
                        },
                        padding: 12,
                        borderColor: 'rgba(229, 231, 235, 1)',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                                const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '70%'
            }
        });
    });
</script>
@endsection 