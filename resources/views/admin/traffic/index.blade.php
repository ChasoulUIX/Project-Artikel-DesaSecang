@extends('admin.layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .stats-card {
        transition: all 0.3s ease;
    }
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .chart-container {
        height: 300px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Traffic Pengunjung</h1>
    </div>

    <!-- Filter periode -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Filter Periode</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('user.traffic') }}" method="GET" class="mb-0">
                <div class="row align-items-end">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Periode</label>
                        <select name="period" id="period" class="form-select">
                            <option value="today" {{ $period == 'today' ? 'selected' : '' }}>Hari Ini</option>
                            <option value="yesterday" {{ $period == 'yesterday' ? 'selected' : '' }}>Kemarin</option>
                            <option value="week" {{ $period == 'week' ? 'selected' : '' }}>7 Hari Terakhir</option>
                            <option value="month" {{ $period == 'month' ? 'selected' : '' }}>30 Hari Terakhir</option>
                            <option value="year" {{ $period == 'year' ? 'selected' : '' }}>1 Tahun Terakhir</option>
                            <option value="custom" {{ $period == 'custom' ? 'selected' : '' }}>Kustom</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3 mb-3 custom-date {{ $period == 'custom' ? '' : 'd-none' }}">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="text" name="start_date" id="start_date" class="form-control date-picker" value="{{ $startDate->format('Y-m-d') }}">
                    </div>
                    
                    <div class="col-md-3 mb-3 custom-date {{ $period == 'custom' ? '' : 'd-none' }}">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="text" name="end_date" id="end_date" class="form-control date-picker" value="{{ $endDate->format('Y-m-d') }}">
                    </div>
                    
                    <div class="col-md-3 mb-3">
                        <button type="submit" class="btn btn-primary w-100">Terapkan Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 stats-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Kunjungan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalVisits) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-eye fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 stats-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengunjung Unik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($uniqueVisitors) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 stats-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kunjungan Artikel</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($articleVisits) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 stats-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Rasio Artikel/Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalVisits > 0 ? round(($articleVisits / $totalVisits) * 100, 1) : 0 }}%
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-percentage fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart Kunjungan -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tren Kunjungan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="visitsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Distribusi Perangkat</h6>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="deviceChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Popular Articles -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Artikel Populer</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Artikel</th>
                                    <th>Penulis</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Kunjungan</th>
                                    <th>Total View Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($popularArticles as $key => $article)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
                                    </td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>{{ ucfirst($article->category) }}</td>
                                    <td>{{ $article->visitor_logs_count }} kali</td>
                                    <td>{{ $article->view_count }} kali</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Halaman dan Referrer -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Halaman Terpopuler</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Halaman</th>
                                    <th>Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pageVisits as $page)
                                <tr>
                                    <td>{{ \Illuminate\Support\Str::limit($page->page_visited, 50) }}</td>
                                    <td>{{ $page->total }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Top Referrer</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sumber</th>
                                    <th>Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($topReferrers as $referrer)
                                <tr>
                                    <td>{{ \Illuminate\Support\Str::limit($referrer->referrer, 50) }}</td>
                                    <td>{{ $referrer->total }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pengguna yang Login -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">User Aktif</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama User</th>
                                    <th>Email</th>
                                    <th>Jumlah Kunjungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($loggedInUsers as $key => $userLog)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $userLog->user->name }}</td>
                                    <td>{{ $userLog->user->email }}</td>
                                    <td>{{ $userLog->visit_count }} kali</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    // Initialize datepicker
    flatpickr(".date-picker", {
        dateFormat: "Y-m-d",
    });
    
    // Toggle custom date fields
    document.getElementById('period').addEventListener('change', function() {
        const customDateFields = document.querySelectorAll('.custom-date');
        if (this.value === 'custom') {
            customDateFields.forEach(field => field.classList.remove('d-none'));
        } else {
            customDateFields.forEach(field => field.classList.add('d-none'));
        }
    });
    
    // Visits chart
    const visitsChartCtx = document.getElementById('visitsChart').getContext('2d');
    const visitsChart = new Chart(visitsChartCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($dailyVisits->pluck('date')->map(function($date) { return \Carbon\Carbon::parse($date)->format('d M'); })) !!},
            datasets: [{
                label: 'Kunjungan',
                data: {!! json_encode($dailyVisits->pluck('visits')) !!},
                backgroundColor: 'rgba(78, 115, 223, 0.05)',
                borderColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointBorderColor: '#fff',
                pointRadius: 4,
                pointHoverRadius: 6,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
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
                    '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#5a5c69', '#858796'
                ],
                hoverBackgroundColor: [
                    '#2e59d9', '#17a673', '#2c9faf', '#f4b619', '#e02d1b', '#484a54', '#6e707e'
                ],
                borderWidth: 0
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            },
            cutout: '70%'
        }
    });
</script>
@endsection 