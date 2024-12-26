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
        <h1>{{ $nav }}</h1>
        
        <form action="{{ route('bankaccounts.store') }}" method="POST">
            @csrf
            <!-- nama bank -->
            <div class="form-group">
                <label for="nama_bank">Nama Bank</label>
                <input type="text" name="nama_bank" id="nama_bank" class="form-control" value="{{ old('nama_bank') }}" required>
            </div>
            <!-- nomor rekening -->
            <div class="form-group">
                <label for="nomor_rekening">Nomor Rekening</label>
                <input type="text" name="nomor_rekening" id="nomor_rekening" class="form-control" value="{{ old('nomor_rekening') }}" required>
            </div>
            <!-- nama pemiliki -->
            <div class="form-group">
                <label for="nama_pemilik">Nama Pemilik</label>
                <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" value="{{ old('nama_pemilik') }}" required>
            </div>
            <!-- tanggal ditambah -->
            <div class="form-group">
                <label for="tanggal_ditambah">Tanggal Ditambah</label>
                <input type="date" name="tanggal_ditambah" id="tanggal_ditambah" class="form-control" value="{{ old('tanggal_ditambah') }}" required>
            </div>
            <!-- tanggal diubah -->
            <div class="form-group">
                <label for="tanggal_diubah">Tanggal Diubah</label>
                <input type="date" name="tanggal_diubah" id="tanggal_diubah" class="form-control" value="{{ old('tanggal_diubah') }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
