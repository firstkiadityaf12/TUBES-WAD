@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Grafik Laporan Keuangan</h1>
    <canvas id="keuanganChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('keuanganChart').getContext('2d');
    const data = {
        labels: @json($laporan->pluck('periode_laporan')),
        datasets: [
            {
                label: 'Total Pemasukan',
                data: @json($laporan->pluck('total_pemasukan')),
                borderColor: 'green',
                backgroundColor: 'rgba(0, 255, 0, 0.2)',
                borderWidth: 1,
            },
            {
                label: 'Total Pengeluaran',
                data: @json($laporan->pluck('total_pengeluaran')),
                borderColor: 'red',
                backgroundColor: 'rgba(255, 0, 0, 0.2)',
                borderWidth: 1,
            },
            {
                label: 'Saldo Akhir',
                data: @json($laporan->pluck('saldo_akhir')),
                borderColor: 'blue',
                backgroundColor: 'rgba(0, 0, 255, 0.2)',
                borderWidth: 1,
            },
        ],
    };

    const config = {
        type: 'line', // Ubah menjadi 'bar' untuk grafik batang
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    };

    new Chart(ctx, config);
</script>
@endsection
