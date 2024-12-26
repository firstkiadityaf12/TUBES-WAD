@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Pengeluaran</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pengeluaran ID: {{ $pengeluaran->id }}</h5>

                <p><strong>Tanggal Pengeluaran:</strong> {{ $pengeluaran->tanggal_pengeluaran }}</p>
                <p><strong>Sumber Pengeluaran:</strong> {{ $pengeluaran->sumber_pengeluaran }}</p>
                <p><strong>Jumlah Pengeluaran:</strong> Rp{{ number_format($pengeluaran->jumlah_pengeluaran, 2, ',', '.') }}</p>
                <p><strong>Deskripsi:</strong> {{ $pengeluaran->deskripsi }}</p>
                <p><strong>Akun Bank:</strong> {{ $pengeluaran->id_akun_bank }}</p>
            </div>
        </div>

        <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        <a href="{{ route('pengeluaran.edit', $pengeluaran->id) }}" class="btn btn-primary mt-3">Edit</a>

        <form action="{{ route('pengeluaran.destroy', $pengeluaran->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Apakah Anda yakin ingin menghapus pengeluaran ini?')">Hapus</button>
        </form>
    </div>
@endsection
