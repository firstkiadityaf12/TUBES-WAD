@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
    <a href="{{ route('pengeluaran.create') }}" class="btn btn-success mb-3">Tambah Pengeluaran</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Sumber</th>
                <th>Jumlah</th>
                <th>Bank</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengeluarans as $pengeluaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pengeluaran->tanggal_pengeluaran }}</td>
                <td>{{ $pengeluaran->sumber_pengeluaran }}</td>
                <td>{{ $pengeluaran->jumlah_pengeluaran }}</td>
                <td>{{ $pengeluaran->id_akun_bank ?? '-' }}</td>
                <td>
                    <a href="{{ route('pengeluaran.show', $pengeluaran->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('pengeluaran.edit', $pengeluaran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
