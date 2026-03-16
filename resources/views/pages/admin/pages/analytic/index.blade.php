@extends('pages.admin.components.layouts.app')

@section('content')
    <div class="p-6 space-y-8">

        <!-- HEADER -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Website Analytics</h1>
                <p class="text-sm text-gray-500">Statistik pengunjung website</p>
            </div>
        </div>


        <!-- STATISTIC CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- TOTAL VISITOR -->
            <div class="bg-white rounded-2xl shadow-sm p-6 flex items-center justify-between hover:shadow-md transition">

                <div>
                    <p class="text-sm text-gray-500">Total Visitor</p>
                    <p class="text-3xl font-bold text-gray-800 mt-1">
                        {{ number_format($totalVisitor) }}
                    </p>
                </div>

                <div class="bg-blue-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm7.5 0c0 4.418-4.477 8-10 8s-10-3.582-10-8 4.477-8 10-8 10 3.582 10 8z" />
                    </svg>
                </div>

            </div>


            <!-- VISITOR TODAY -->
            <div class="bg-white rounded-2xl shadow-sm p-6 flex items-center justify-between hover:shadow-md transition">

                <div>
                    <p class="text-sm text-gray-500">Visitor Hari Ini</p>
                    <p class="text-3xl font-bold text-blue-600 mt-1">
                        {{ number_format($todayVisitor) }}
                    </p>
                </div>

                <div class="bg-green-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3v18h18" />
                    </svg>
                </div>

            </div>


            <!-- VISITOR WEEK -->
            <div class="bg-white rounded-2xl shadow-sm p-6 flex items-center justify-between hover:shadow-md transition">

                <div>
                    <p class="text-sm text-gray-500">Visitor Minggu Ini</p>
                    <p class="text-3xl font-bold text-emerald-600 mt-1">
                        {{ number_format($weekVisitor) }}
                    </p>
                </div>

                <div class="bg-emerald-100 p-3 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3" />
                    </svg>
                </div>

            </div>

        </div>



        <!-- CHART -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between mb-4">
                <h2 class="font-semibold text-gray-700">
                    Visitor 7 Hari Terakhir
                </h2>
            </div>

            <canvas id="visitorChart" height="90"></canvas>

        </div>



        <!-- TOP PAGE -->
        <div class="bg-white rounded-2xl shadow-sm p-6">

            <div class="flex items-center justify-between mb-4">
                <h2 class="font-semibold text-gray-700">
                    Halaman Paling Banyak Dikunjungi
                </h2>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead>
                        <tr class="border-b text-gray-500">
                            <th class="text-left py-3">Page</th>
                            <th class="text-right py-3">Visitor</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($topPages as $page)
                            <tr class="border-b hover:bg-gray-50 transition">

                                <td class="py-3 font-medium text-gray-700">
                                    {{ $page->page }}
                                </td>

                                <td class="text-right">

                                    <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ number_format($page->total) }} Visitor
                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="2" class="text-center py-6 text-gray-400">
                                    Belum ada data analytics
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection


@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const chartData = @json($chartVisitor);

        const labels = chartData.map(item => item.date);
        const totals = chartData.map(item => item.total);

        const ctx = document.getElementById('visitorChart');

        new Chart(ctx, {

            type: 'line',

            data: {
                labels: labels,

                datasets: [{
                    label: 'Visitor',
                    data: totals,
                    borderColor: '#2563eb',
                    backgroundColor: 'rgba(37,99,235,0.08)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2,
                    pointRadius: 3
                }]
            },

            options: {

                responsive: true,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }

            }

        });
    </script>
@endpush
