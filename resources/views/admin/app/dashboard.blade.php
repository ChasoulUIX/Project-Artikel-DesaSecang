@extends('admin.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.css">
@endsection

@section('content')
    <div class="container mx-auto px-4">
        <!-- Dashboard Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-800 tracking-tight">Dashboard</h1>
            <p class="text-gray-600 mt-2">Selamat datang kembali, {{ Auth::user()->name }} 👋</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 rounded-2xl bg-blue-100 text-blue-600">
                        <i class="fas fa-newspaper text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Artikel</p>
                        <div class="flex items-center">
                            <h2 class="text-2xl font-bold text-gray-800">150</h2>
                            <span class="text-green-500 text-sm ml-2">+12%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 rounded-2xl bg-green-100 text-green-600">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Pengguna</p>
                        <div class="flex items-center">
                            <h2 class="text-2xl font-bold text-gray-800">1,250</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 rounded-2xl bg-purple-100 text-purple-600">
                        <i class="fas fa-eye text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Views</p>
                        <div class="flex items-center">
                            <h2 class="text-2xl font-bold text-gray-800">25,430</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="p-3 rounded-2xl bg-yellow-100 text-yellow-600">
                        <i class="fas fa-comment text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Komentar</p>
                        <div class="flex items-center">
                            <h2 class="text-2xl font-bold text-gray-800">384</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Analytics Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Traffic Chart -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Traffic Overview</h3>
                <div id="trafficChart" class="h-80"></div>
            </div>

            <!-- Popular Categories -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Kategori Populer</h3>
                <div id="categoryChart" class="h-80"></div>
            </div>
        </div>

        <!-- Recent Articles with Search -->
        <div class="bg-white rounded-xl shadow-sm mb-8 border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">Artikel Terbaru</h3>
                    <div class="relative">
                        <input type="text" placeholder="Cari artikel..." 
                            class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Makna Puasa di Bulan Ramadhan</td>
                                <td class="px-6 py-4 whitespace-nowrap">Ibadah</td>
                                <td class="px-6 py-4 whitespace-nowrap">Ahmad</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Published</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">2023-07-20</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">Toleransi Antar Umat Beragama</td>
                                <td class="px-6 py-4 whitespace-nowrap">Kerukunan</td>
                                <td class="px-6 py-4 whitespace-nowrap">Budi</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Draft</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">2023-07-19</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-bold text-gray-800">Aksi Cepat</h3>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="#" class="group flex items-center p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl hover:from-blue-100 hover:to-blue-200 transition-all">
                    <div class="p-3 rounded-full bg-blue-500 text-white group-hover:scale-110 transition-transform">
                        <i class="fas fa-plus-circle text-xl"></i>
                    </div>
                    <span class="ml-3 font-medium text-blue-700">Tambah Artikel Baru</span>
                </a>
                <a href="#" class="group flex items-center p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-xl hover:from-green-100 hover:to-green-200 transition-all">
                    <div class="p-3 rounded-full bg-green-500 text-white group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-plus text-xl"></i>
                    </div>
                    <span class="ml-3 font-medium text-green-700">Tambah Pengguna</span>
                </a>
                <a href="#" class="group flex items-center p-4 bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl hover:from-purple-100 hover:to-purple-200 transition-all">
                    <div class="p-3 rounded-full bg-purple-500 text-white group-hover:scale-110 transition-transform">
                        <i class="fas fa-cog text-xl"></i>
                    </div>
                    <span class="ml-3 font-medium text-purple-700">Pengaturan Website</span>
                </a>
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
                data: [30, 40, 35, 50, 49, 60, 70]
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
                categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min']
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
            series: [44, 55, 13, 43, 22],
            chart: {
                type: 'donut',
                height: 320
            },
            labels: ['Ibadah', 'Kerukunan', 'Motivasi', 'Sejarah', 'Lainnya'],
            colors: ['#4F46E5', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6'],
            legend: {
                position: 'bottom'
            }
        };

        var categoryChart = new ApexCharts(document.querySelector("#categoryChart"), categoryOptions);
        categoryChart.render();
    </script>
@endsection
