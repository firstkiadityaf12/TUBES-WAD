@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary mb-4">Detail Tagihan</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nama Tagihan:</strong> {{ $tagihan->nama_tagihan }}</li>
        <li class="list-group-item"><strong>Tanggal Jatuh Tempo:</strong> {{ $tagihan->tanggal_jatuh_tempo }}</li>
        <li class="list-group-item"><strong>Jumlah Tagihan:</strong> {{ number_format($tagihan->jumlah_tagihan, 0, ',', '.') }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ ucfirst($tagihan->status) }}</li>
        <li class="list-group-item"><strong>Akun Bank:</strong> {{ $tagihan->akunBank->nama_bank ?? '-' }}</li>
    </ul>
    <a href="{{ route('tagihan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
