@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header Title -->
    <div class="text-center my-4">
        <h1 class="display-4 text-primary fw-bold">Manajemen Tagihan</h1>
        <p class="text-muted">Kelola tagihanmu bersama BUKU SISTA dengan mudah dan cepat.</p>
    </div>

    <!-- Filter and Sort Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title text-primary">Filter & Sortir</h5>
            <form action="{{ route('tagihan.index') }}" method="GET">
                <div class="row g-2">
                    <!-- Filter by Status -->
                    <div class="col-md-4">
                        <label for="status" class="form-label">Filter Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="" {{ request('status') == '' ? 'selected' : '' }}>Semua Status</option>
                            <option value="dibayar" {{ request('status') == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                            <option value="belum dibayar" {{ request('status') == 'belum dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
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
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-filter"></i> Terapkan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add and Export Buttons -->
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('tagihan.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah Tagihan
        </a>
        <a href="{{ route('tagihan.exportPdf', request()->all()) }}" class="btn btn-danger">
            <i class="bi bi-file-earmark-pdf"></i> Export PDF
        </a>
    </div>

    <!-- Table Section -->
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title text-primary">Daftar Tagihan</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr class="text-center">
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
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $tagihan->nama_tagihan }}</td>
                                <td class="text-center">{{ $tagihan->tanggal_jatuh_tempo }}</td>
                                <td class="text-center">{{ number_format($tagihan->jumlah_tagihan, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $tagihan->status == 'dibayar' ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ ucfirst($tagihan->status) }}
                                    </span>
                                </td>
                                <td class="text-center">{{ $tagihan->akunBank->nama_bank ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('tagihan.show', $tagihan->id) }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('tagihan.edit', $tagihan->id) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('tagihan.destroy', $tagihan->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">Tidak ada data tagihan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
