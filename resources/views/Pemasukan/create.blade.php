@extends('layouts.app')

@section('content')
<style>
        label {
            display: block;
            font-size: 1rem; 
            margin-bottom: 5px;
            color: #000; 
        }
    </style>

<div class="container">
    <h1>{{ $nav }}</h1>
    <p class="text-muted">Bagian ini digunakan untuk menambahkan data pemasukan baru ke sistem. Pastikan semua informasi diisi dengan benar.</p>
    <form action="{{ route('pemasukan.store') }}" method="POST">
        @csrf
        <div class="form-group">
                <label for="tanggal_pemasukan">Tanggal Pemasukan</label>
                <input type="date" name="tanggal_pemasukan" id="tanggal_pemasukan" class="form-control" value="{{ old('tanggal_pemasukan') }}" required>
            </div>
            <div class="form-group">
                <label for="sumber_pemasukan">Sumber Pemasukan</label>
                <input type="text" name="sumber_pemasukan" id="sumber_pemasukan" class="form-control" value="{{ old('sumber_pemasukan') }}" required>
            </div>
            <div class="form-group">
                <label for="jumlah_pemasukan">Jumlah Pemasukan</label>
                <input type="number" name="jumlah_pemasukan" id="jumlah_pemasukan" class="form-control" value="{{ old('jumlah_pemasukan') }}" step="0.01" required>
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
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
