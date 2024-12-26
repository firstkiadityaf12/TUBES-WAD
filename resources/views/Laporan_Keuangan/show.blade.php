@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
    <table class="table table-bordered">
        <tr>
            <th>Periode</th>
            <td>{{ $laporanKeuangan->periode_laporan }}</td>
        </tr>
        <tr>
            <th>Total Pemasukan</th>
            <td>{{ number_format($laporanKeuangan->total_pemasukan, 2) }}</td>
        </tr>
        <tr>
            <th>Total Pengeluaran</th>
            <td>{{ number_format($laporanKeuangan->total_pengeluaran, 2) }}</td>
        </tr>
        <tr>
            <th>Saldo Akhir</th>
            <td>{{ number_format($laporanKeuangan->saldo_akhir, 2) }}</td>
        </tr>
        <tr>
            <th>Catatan</th>
            <td>{{ $laporanKeuangan->catatan }}</td>
        </tr>
    </table>
    <a href="{{ route('laporan-keuangan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
