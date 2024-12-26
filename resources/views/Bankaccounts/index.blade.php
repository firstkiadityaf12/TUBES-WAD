@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
<<<<<<< HEAD
    <a href="{{ route('akun_banks.create') }}" class="btn btn-success mb-3">Tambah Bank Account</a>
=======
    <a href="{{ route('laporan-keuangan.create') }}" class="btn btn-success mb-3">Tambah Laporan Keuangan</a>
>>>>>>> laporan
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
<<<<<<< HEAD
                <th>Nama Bank</th>
                <th>Nomor Rekening</th>
                <th>Nama Pemilik</th>
                <th>Tanggal Ditambah</th>
                <th>Tanggal Diubah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bankaccounts as $bankaccount)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bankaccount->nama_bank }}</td>
                <td>{{ $bankaccount->nomor_rekening }}</td>
                <td>{{ $bankaccount->nama_pemilik }}</td>
                <td>{{ $bankaccount->tanggal_ditambahkan }}</td>
                <td>{{ $bankaccount->tanggal_diubah }}</td>
                </td>
                <td>
                    <a href="{{ route('akun_banks.show', $bankaccount->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('akun_banks.edit', $bankaccount->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('akun_banks.destroy', $bankaccount->id) }}" method="POST" style="display:inline;">
=======
                <th>Periode</th>
                <th>Total Pemasukan</th>
                <th>Total Pengeluaran</th>
                <th>Saldo Akhir</th>
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
                <td>
                    <a href="{{ route('laporan-keuangan.show', $item->id_laporan) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('laporan-keuangan.edit', $item->id_laporan) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('laporan-keuangan.destroy', $item->id_laporan) }}" method="POST" style="display:inline;">
>>>>>>> laporan
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
