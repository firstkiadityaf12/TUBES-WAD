@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Transaksi Keuangan</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Metode Bayar</th>
                <th>Akun Bank</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->tanggal_transaksi }}</td>
                    <td>{{ $transaction->kategori }}</td>
                    <td>{{ $transaction->deskripsi }}</td>
                    <td>Rp{{ number_format($transaction->jumlah, 0, ',', '.') }}</td>
                    <td>{{ $transaction->metode_bayar }}</td>
                    <td>{{ $transaction->id_akun_bank }}</td>
                    <td>{{ $transaction->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
