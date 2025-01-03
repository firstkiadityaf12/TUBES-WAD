@extends('layouts.app')

@section('content')
    <style>

        body, h1, ul, table, th, td, a {
            color: black;
        }
        label {
            display: block;
            font-size: 1.5rem;
            margin-bottom: 6px;
            color: #000;
        }
    </style>
    <div class="container">
        <h1>{{ $nav }}</h1>
        
        <form action="{{ route('laporan_keuangan.store') }}" method="POST">
            @csrf
            <!-- Periode Laporan -->
            <div class="form-group">
                <label for="periode_laporan">Periode Laporan</label>
                <select name="periode_laporan" id="periode_laporan" class="form-control" required>
                    <option value="">-- Pilih Periode --</option>
                    @foreach($periode as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Catatan -->
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control">{{ old('catatan') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection


<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-black">{{ $nav }}</h1>
    <form action="{{ route('laporan_keuangan.store') }}" method="POST">
        @csrf
        <div class="text-black mb-3">
            <label for="periode_laporan" class="form-label">Periode Laporan</label>
            <input type="text" name="periode_laporan" class="form-control" id="periode_laporan" placeholder="Misal: Januari 2024" required>
        </div>

        <div class="text-black mb-3">
            <label for="total_pemasukan" class="form-label">Total Pemasukan</label>
            <input type="number" step="0.01" class="form-control" id="total_pemasukan" name="total_pemasukan" required>
        </div>
        <div class="text-black mb-3">
            <label for="total_pengeluaran" class="form-label">Total Pengeluaran</label>
            <input type="number" step="0.01" class="form-control" id="total_pengeluaran" name="total_pengeluaran" required>
        </div>
        <div class="text-black mb-3">
            <label for="saldo_akhir" class="form-label">Saldo Akhir</label>
            <input type="number" step="0.01" class="form-control" id="saldo_akhir" name="saldo_akhir" required>
        </div>
        <div class="text-black mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea class="form-control" id="catatan" name="catatan"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection -->
