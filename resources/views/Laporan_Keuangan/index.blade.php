@extends('layouts.app')

@section('content')
<div class="text-black container">
<h1 class="text-black">{{ $nav }}</h1>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('laporan_keuangan.create') }}" class="btn btn-success">Tambah Laporan Keuangan</a>
        <a href="{{ route('laporan_keuangan.chart') }}" class="btn btn-info">Tampilkan Grafik</a>
        <a href="{{ route('laporan_keuangan.pdf') }}" class="btn btn-danger">Export PDF</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Periode</th>
                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
                <th>Saldo Akhir</th>
                <th>Catatan</th>
                <th>Tanggal Dibuat</th>
                <th>Tanggal Diubah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->periode_laporan }}</td>
                <td>{{ 'Rp' . number_format($item->total_pemasukan, 0, ',', '.') }}</td>
                <td>{{ 'Rp' . number_format($item->total_pengeluaran, 0, ',', '.') }}</td>
                <td>{{ 'Rp' . number_format($item->saldo_akhir, 0, ',', '.') }}</td>
                <td>{{ $item->catatan ?? '-' }}</td> <!-- Tambahkan kolom catatan -->
                <td>{{ $item->tanggal_pembuatan ?? '-' }}</td>
                <td>{{ $item->tanggal_diubah ?? '-' }}</td>
                <td>
                    <a href="{{ route('laporan_keuangan.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('laporan_keuangan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('laporan_keuangan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection