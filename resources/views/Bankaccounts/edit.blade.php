@extends('layouts.app')

@section('content')
    <style>
        label {
            display: block;
            font-size: 1.5rem; 
            margin-bottom: 4px; 
            color: #000;
        }
    </style>

    <div class="container">
        <h1>Edit Account Bank</h1>

        <form action="{{ route('bankaccounts.update', $bankaccounts->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- nama bank -->
            <div class="form-group">
                <label for="nama_bank">Nama Bank</label>
                <input type="text" name="nama_bank" id="nama_bank" class="form-control" 
                       value="{{ old('nama_bank', $bankaccounts->nama_bank) }}" required>
            </div>
            <!-- nomor rekening -->
            <div class="form-group">
                <label for="nomor_rekening">Nomor Rekening</label>
                <input type="text" name="nomor_rekening" id="nomor_rekening" class="form-control" 
                       value="{{ old('nomor_rekening', $bankaccounts->nomor_rekening) }}" required>
            </div>
            <!-- nama pemilik -->
            <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik</label>
                <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" 
                       value="{{ old('nama_pemilik', $bankaccounts->nama_pemilik) }}" required>
            </div>
            <!-- saldo -->
            <div class="form-group">
                <label for="saldo">Saldo</label>
                <input type="number" name="saldo" id="saldo" class="form-control" 
                       value="{{ old('saldo', $bankaccounts->saldo) }}" required>
            </div>
            <!-- tanggal ditambahkan -->
            <div class="form-group">
                <label for="tanggal_ditambahkan">Tanggal Ditambahkan</label>
                <input type="date" name="tanggal_ditambahkan" id="tanggal_ditambahkan" class="form-control" 
                       value="{{ old('tanggal_ditambahkan', $bankaccounts->tanggal_ditambahkan) }}" required>
            </div>
            <!-- tanggal diubah -->
            <div class="form-group">
                <label for="tanggal_diubah">Tanggal Diubah</label>
                <input type="date" name="tanggal_diubah" id="tanggal_diubah" class="form-control" 
                       value="{{ old('tanggal_diubah', $bankaccounts->tanggal_diubah) }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Perbarui</button>
        </form>
    </div>
@endsection
