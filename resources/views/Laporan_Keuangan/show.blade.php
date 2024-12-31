@extends('layouts.app')

@section('content')
<style>
    body, h1, ul, table, th, td, a {
        color: black;
    }
</style>
<div class="container">
    <h1>Detail Laporan Keuangan</h1>
    <ul>
        <li><strong>Periode:</strong> {{ $laporan->periode_laporan }}</li>
        <li><strong>Total Pemasukan:</strong> Rp{{ number_format($laporan->total_pemasukan, 0, ',', '.') }}</li>
        <li><strong>Total Pengeluaran:</strong> Rp{{ number_format($laporan->total_pengeluaran, 0, ',', '.') }}</li>
        <li><strong>Saldo Akhir:</strong> Rp{{ number_format($laporan->saldo_akhir, 0, ',', '.') }}</li>
        <li><strong>Catatan:</strong> {{ $laporan->catatan }}</li>
        <li><strong>Tanggal Pembuatan:</strong> {{ $laporan->tanggal_pembuatan }}</li>
        <li><strong>Tanggal Diubah:</strong> {{ $laporan->tanggal_diubah }}</li>
    </ul>

    <h2>Pemasukan</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemasukan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                <td>{{ $item->tanggal_transaksi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Pengeluaran</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengeluaran as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>Rp{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                <td>{{ $item->tanggal_transaksi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-between mt-3">
        <a href="{{ route('laporan_keuangan.index') }}" class="btn btn-secondary">Kembali</a>
        <div>
            <a href="{{ route('laporan_keuangan.edit', $laporan->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('laporan_keuangan.export_detail_pdf', $laporan->id) }}" class="btn btn-primary">Export to PDF</a>
        </div>
    </div>


</div>
@endsection
