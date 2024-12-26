@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center text-black" style="margin-top: 20px;">Hasil Pencarian</h2>
    <p class="text-center">Hasil pencarian untuk: <strong>{{ $query }}</strong></p>

    @if($transactions->isEmpty())
        <div class="alert alert-warning text-center">
            Tidak ada hasil yang ditemukan.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Metode Bayar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->tanggal_transaksi }}</td>
                        <td>{{ ucfirst($transaction->kategori) }}</td>
                        <td>{{ $transaction->deskripsi }}</td>
                        <td>{{ number_format($transaction->jumlah, 2) }}</td>
                        <td>{{ ucfirst($transaction->metode_bayar) }}</td>
                        <td>{{ ucfirst($transaction->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('transactions.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
