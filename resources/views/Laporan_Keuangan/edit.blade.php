@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('laporan_keuangan.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <h1 class="text-center text-black">Edit Laporan Keuangan</h1>
    <form action="{{ route('laporan_keuangan.update', $laporanKeuangan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="text-black mb-3">
            <label for="periode_laporan" class="form-label">Periode Laporan</label>
            <input type="text" class="form-control" id="periode_laporan" name="periode_laporan" value="{{ $laporanKeuangan->periode_laporan }}" required>
        </div>
        <div class="text-black mb-3">
            <label for="total_pemasukan" class="form-label">Total Pemasukan</label>
            <input type="number" step="0.01" class="form-control" id="total_pemasukan" name="total_pemasukan" value="{{ $laporanKeuangan->total_pemasukan }}" required>
        </div>
        <div class="text-black mb-3">
            <label for="total_pengeluaran" class="form-label">Total Pengeluaran</label>
            <input type="number" step="0.01" class="form-control" id="total_pengeluaran" name="total_pengeluaran" value="{{ $laporanKeuangan->total_pengeluaran }}" required>
        </div>
        <div class="text-black mb-3">
            <label for="saldo_akhir" class="form-label">Saldo Akhir</label>
            <input type="number" step="0.01" class="form-control" id="saldo_akhir" name="saldo_akhir" value="{{ $laporanKeuangan->saldo_akhir }}" required>
        </div>
        <div class="text-black mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" id="catatan" name="catatan">{{ $laporanKeuangan->catatan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
