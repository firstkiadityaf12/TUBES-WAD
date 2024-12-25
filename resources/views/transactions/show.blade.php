@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Transaksi</h2>
    <p><strong>Tanggal:</strong> {{ $transaction->tanggal_transaksi }}</p>
    <p><strong>Kategori:</strong> {{ ucfirst($transaction->kategori) }}</p>
    <p><strong>Deskripsi:</strong> {{ $transaction->deskripsi }}</p>
    <p><strong>Jumlah:</strong> {{ $transaction->jumlah }}</p>
    <p><strong>Metode Bayar:</strong> {{ ucfirst($transaction->metode_bayar) }}</p>
    <p><strong>Status:</strong> {{ ucfirst($transaction->status) }}</p>
    <a href="{{ route('transactions.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
