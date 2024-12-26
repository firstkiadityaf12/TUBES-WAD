@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
    <a href="{{ route('laporan_keuangan.create') }}" class="btn btn-success mb-3">Tambah Laporan Keuangan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Periode</th>
                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
                <th>Saldo Akhir</th>
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
                <td>{{ number_format($item->total_pemasukan, 2) }}</td>
                <td>{{ number_format($item->total_pengeluaran, 2) }}</td>
                <td>{{ number_format($item->saldo_akhir, 2) }}</td>
                <td>{{ $item->tanggal_pembuatan ?? '-' }}</td>
                <td>{{ $item->tanggal_diubah ?? '-' }}</td>
                <td>
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
