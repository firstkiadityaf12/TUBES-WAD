@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header Title -->
    <div class="text-center my-4">
        <h1 class="display-4" style="color: black;">TAGIHAN</h1>
    </div>

    <!-- Navigation -->
    <h1>{{ $nav ?? 'Navigasi Default' }}</h1>
    <p class="text-muted">Bagian ini menampilkan daftar tagihan yang harus dibayarkan.</p>

    <!-- Button to Check New Bill -->
    <a href="{{ route('tagihan.create') }}" class="btn btn-success mb-3">Tambah Tagihan</a>

    <!-- Display Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tagihan</th>
                <th>Jatuh Tempo</th>
                <th>Jumlah</th>
                <th>Status</th>
                <th>Bank</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tagihans as $tagihan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tagihan->nama_tagihan }}</td>
                <td>{{ $tagihan->tanggal_jatuh_tempo }}</td>
                <td>{{ number_format($tagihan->jumlah_tagihan, 0, ',', '.') }}</td>
                <td>{{ ucfirst($tagihan->status) }}</td>
                <td>{{ $tagihan->akunBank->nama_bank ?? '-' }}</td>
                <td>
                    <a href="{{ route('tagihan.show', $tagihan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('tagihan.edit', $tagihan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('tagihan.destroy', $tagihan->id) }}" method="POST" style="display:inline;">
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
