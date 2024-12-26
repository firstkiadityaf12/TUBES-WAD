@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center text-black" style="margin-top: 20px;">Daftar Transaksi</h2>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('transactions.search') }}" method="GET" class="d-flex">
            <input type="text" name="query" class="form-control" placeholder="Cari transaksi..." required>
            <button type="submit" class="btn btn-primary ms-2">Cari</button>
        </form>
        
        <a href="{{ route('transactions.create') }}" class="btn btn-success">Tambah Transaksi</a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Jumlah dalam Rupiah</th>
                <th>Metode Bayar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaction->tanggal_transaksi }}</td>
                    <td>{{ ucfirst($transaction->kategori) }}</td>
                    <td>{{ $transaction->deskripsi }}</td>
                    <td>{{ number_format($transaction->jumlah, 2) }}</td>
                    <td>{{ ucfirst($transaction->metode_bayar) }}</td>
                    <td>{{ ucfirst($transaction->status) }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada transaksi ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Menampilkan jumlah transaksi sebagai counter di bawah tabel -->
    <div class="d-flex justify-content-end mt-3">
        <p><strong>Jumlah Transaksi: </strong>{{ $totalTransactions }}</p>
    </div>
</div>
@endsection
