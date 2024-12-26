@extends('layouts.app')

@section('content')
    <style>
        label {
            display: block;
            font-size: 1rem; /* Ukuran font sesuai */
            margin-bottom: 5px; /* Tambahkan jarak dengan input */
            color: #000; /* Pastikan warna terlihat */
        }
    </style>
    <div class="container">
        <h1>{{ $nav }}</h1>
        
        <form action="{{ route('pengeluaran.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                <input type="date" name="tanggal_pengeluaran" id="tanggal_pengeluaran" class="form-control" value="{{ old('tanggal_pengeluaran') }}" required>
            </div>
            <div class="form-group">
                <label for="sumber_pengeluaran">Sumber Pengeluaran</label>
                <input type="text" name="sumber_pengeluaran" id="sumber_pengeluaran" class="form-control" value="{{ old('sumber_pengeluaran') }}" required>
            </div>
            <div class="form-group">
                <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                <input type="number" name="jumlah_pengeluaran" id="jumlah_pengeluaran" class="form-control" value="{{ old('jumlah_pengeluaran') }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
            </div>
            <div class="form-group">
                <label for="id_akun_bank">Akun Bank</label>
                <select name="id_akun_bank" id="id_akun_bank" class="form-control" required>
                    @foreach ($akunBanks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->nama_bank }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
