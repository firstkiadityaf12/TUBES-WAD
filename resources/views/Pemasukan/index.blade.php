@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
    <a href="{{ route('pemasukan.create') }}" class="btn btn-success mb-3">Tambah Pemasukan</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Sumber</th>
                <th>Jumlah</th>
                <th>Bank</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemasukans as $pemasukan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pemasukan->tanggal_pemasukan }}</td>
                <td>{{ $pemasukan->sumber_pemasukan }}</td>
                <td>{{ $pemasukan->jumlah_pemasukan }}</td>
                <td>{{ $pemasukan->akunBank->nama_bank ?? '-' }}</td>
                <td>
                    <a href="{{ route('pemasukan.show', $pemasukan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('pemasukan.edit', $pemasukan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pemasukan.destroy', $pemasukan->id) }}" method="POST" style="display:inline;">
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
