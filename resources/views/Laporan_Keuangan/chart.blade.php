@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Grafik Laporan Keuangan</h1>
    @if($laporan->isEmpty())
        <p class="text-center">Data laporan keuangan tidak tersedia.</p>
    @else
        <canvas id="keuanganChart"></canvas>
    @endif
    <a href="{{ route('laporan_keuangan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    @if(!$laporan->isEmpty())
        const ctx = document.getElementById('keuanganChart').getContext('2d');
        const data = {
            labels: @json($laporan->pluck('periode_laporan')),
            datasets: [
                {
                    label: 'Total Pemasukan',
                    data: @json($laporan->pluck('total_pemasukan')),
                    borderColor: 'green',
                    backgroundColor: 'rgba(0, 255, 0, 0.2)',
                    tension: 0.1,
                    fill: true,
                },
                {
                    label: 'Total Pengeluaran',
                    data: @json($laporan->pluck('total_pengeluaran')),
                    borderColor: 'red',
                    backgroundColor: 'rgba(255, 0, 0, 0.2)',
                    tension: 0.1,
                    fill: true,
                },
                {
                    label: 'Saldo Akhir',
                    data: @json($laporan->pluck('saldo_akhir')),
                    borderColor: 'blue',
                    backgroundColor: 'rgba(0, 0, 255, 0.2)',
                    tension: 0.1,
                    fill: true,
                },
            ],
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Laporan Keuangan per Periode',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let value = context.raw || 0;
                                return context.dataset.label + ': Rp' + value.toLocaleString('id-ID');
                            },
                        },
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
    @endif
</script>
@endsection
