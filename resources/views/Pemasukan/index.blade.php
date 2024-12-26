@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header Title -->
    <div class="text-center my-4">
        <h1 class="display-4" style="color: black;">PEMASUKAN</h1>
    </div>

    <!-- Navigation -->
    <h1>{{ $nav }}</h1>
    <p class="text-muted">Bagian ini menampilkan daftar pemasukan yang telah tercatat dalam sistem.</p>
    
    <!-- Button to Add New Income -->
    <a href="{{ route('pemasukan.create') }}" class="btn btn-success mb-3">Tambah Pemasukan</a>
    
    <!-- Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Sumber</th>
                <th>Jumlah</th>
                <th>ID Bank</th>
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
                <td>{{ $pemasukan->id_akun_bank ?? '-' }}</td>
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
