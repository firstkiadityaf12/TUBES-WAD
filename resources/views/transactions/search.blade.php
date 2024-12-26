@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center text-black" style="margin-top: 20px;">Hasil Pencarian</h2>
    <p class="text-muted">Pencarian untuk: <strong>{{ $query }}</strong></p>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('transactions.index') }}" class="btn btn-primary">Kembali ke Daftar Transaksi</a>
    </div>

    @if($totalTransactions > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Deskripsi Transaksi</th>
                    <th>Jumlah dalam Rupiah</th>
                    <th>Metode Pembayaran</th>
                    <th>Status Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $index => $transaction)
                    <tr>
                        <td>{{ $index + 1 }}</td>
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

        <div class="d-flex justify-content-end mt-3">
            <p><strong>Jumlah Transaksi Ditemukan: </strong>{{ $totalTransactions }}</p>
        </div>
    @else
        <p class="text-center">Tidak ada hasil yang ditemukan untuk kata kunci <strong>{{ $query }}</strong>.</p>
    @endif
</div>
@endsection
