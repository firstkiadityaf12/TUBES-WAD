@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Tanggal Pemasukan:</strong> {{ $pemasukan->tanggal_pemasukan }}</p>
            <p><strong>Sumber Pemasukan:</strong> {{ $pemasukan->sumber_pemasukan }}</p>
            <p><strong>Jumlah Pemasukan:</strong> {{ $pemasukan->jumlah_pemasukan }}</p>
            <p><strong>Deskripsi:</strong> {{ $pemasukan->deskripsi }}</p>
            <p><strong>Akun Bank:</strong> {{ $pemasukan->id_akun_bank ?? '-' }}</p>
        </div>
    </div>
    <a href="{{ route('pemasukan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
