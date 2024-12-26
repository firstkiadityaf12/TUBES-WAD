@extends('layouts.app')

@section('content')
<div class="container">
        <h1>Detail Pemasukan</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Pemasukan ID: {{ $pemasukan->id }}</h5>

                <p><strong>Tanggal Pemasukan:</strong> {{ $pemasukan->tanggal_pemasukan }}</p>
                <p><strong>Sumber Pemasukan:</strong> {{ $pemasukan->sumber_pemasukan }}</p>
                <p><strong>Jumlah Pemasukan:</strong> Rp{{ number_format($pemasukan->jumlah_pemasukan, 2, ',', '.') }}</p>
                <p><strong>Deskripsi:</strong> {{ $pemasukan->deskripsi }}</p>
                <p><strong>Akun Bank:</strong> {{ $pemasukan->id_akun_bank }}</p>
            </div>
        </div>

        <a href="{{ route('pemasukan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
        <a href="{{ route('pemasukan.edit', $pemasukan->id) }}" class="btn btn-primary mt-3">Edit</a>

        <form action="{{ route('pemasukan.destroy', $pemasukan->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Apakah Anda yakin ingin menghapus pemasukan ini?')">Hapus</button>
        </form>
    </div>
@endsection
