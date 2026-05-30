@extends('layouts.app')

@section('content')
    @php $title = 'Monthly Sales Overview ✨'; @endphp

    <div class="mb-8">
        <h2 class="text-3xl font-light tracking-tight text-gray-800 italic">
            Monthly <span class="text-pink-500 font-semibold not-italic">Overview</span> ୨୧
        </h2>
        <p class="text-gray-400 text-sm tracking-widest uppercase mt-1">
           Analytics & performance
        </p>
    </div>

    <!-- Chart Card -->
    <div class="bg-white/80 backdrop-blur-sm p-8 rounded-[2rem] shadow-[0_20px_50px_rgba(255,182,193,0.15)] border border-pink-100">
        <div class="h-[400px] w-full">
            <canvas id="salesChart"></canvas>
        </div>
    </div>

    <!-- Chart Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('salesChart');

        const labels = @json($labels ?? []);
        const data = @json($data ?? []);

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Revenue',
                    data: data,
                    borderColor: '#ec4899',
                    backgroundColor: (context) => {
                        const chart = context.chart;
                        const {ctx, chartArea} = chart;
                        if (!chartArea) return null;
                        const gradient = ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                        gradient.addColorStop(0, 'rgba(236, 72, 153, 0.4)');
                        gradient.addColorStop(1, 'rgba(236, 72, 153, 0.01)');
                        return gradient;
                    },
                    fill: true,
                    tension: 0.4,
                    borderWidth: 3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#ec4899',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#fdf2f8' } },
                    x: { grid: { display: false } }
                }
            }
        });
    });
    </script>
@endsection