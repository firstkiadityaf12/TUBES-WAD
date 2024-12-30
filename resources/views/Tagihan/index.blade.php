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

    <!-- Button to Add New Bill -->
    <a href="{{ route('tagihan.create') }}" class="btn btn-success mb-3">Tambah Tagihan</a>

    <!-- Filter and Sort Section -->
    <form action="{{ route('tagihan.index') }}" method="GET" class="mb-3">
        <div class="row g-2">
            <!-- Filter by Status -->
            <div class="col-md-4">
                <label for="status" class="form-label">Filter Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Status</option>
                    <option value="lunas" {{ request('status') == 'lunas' ? 'selected' : '' }}>Lunas</option>
                    <option value="belum bayar" {{ request('status') == 'belum bayar' ? 'selected' : '' }}>Belum Bayar</option>
                </select>
            </div>

            <!-- Sort by Tanggal Jatuh Tempo -->
            <div class="col-md-4">
                <label for="tanggal" class="form-label">Sortir Tanggal Jatuh Tempo</label>
                <select class="form-select" id="tanggal" name="tanggal">
                    <option value="" {{ request('tanggal') == '' ? 'selected' : '' }}>Default</option>
                    <option value="asc" {{ request('tanggal') == 'asc' ? 'selected' : '' }}>Terlama</option>
                    <option value="desc" {{ request('tanggal') == 'desc' ? 'selected' : '' }}>Terbaru</option>
                </select>
            </div>

            <!-- Sort by Jumlah Tagihan -->
            <div class="col-md-4">
                <label for="jumlah" class="form-label">Sortir Jumlah Tagihan</label>
                <select class="form-select" id="jumlah" name="jumlah">
                    <option value="" {{ request('jumlah') == '' ? 'selected' : '' }}>Default</option>
                    <option value="asc" {{ request('jumlah') == 'asc' ? 'selected' : '' }}>Terkecil</option>
                    <option value="desc" {{ request('jumlah') == 'desc' ? 'selected' : '' }}>Terbesar</option>
                </select>
            </div>
        </div>
        <!-- Submit Button -->
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Terapkan Filter & Sortir</button>
        </div>
    </form>

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
            @forelse($tagihans as $tagihan)
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
            @empty
            <tr>
                <td colspan="7" class="text-center">Tidak ada data tagihan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
