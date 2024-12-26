@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Transaksi</h2>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" class="form-control" id="tanggal_transaksi" value="{{ $transaction->tanggal_transaksi }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option value="pemasukan" {{ $transaction->kategori == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                <option value="pengeluaran" {{ $transaction->kategori == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{ $transaction->deskripsi }}">
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ $transaction->jumlah }}" required>
        </div>
        <div class="mb-3">
            <label for="metode_bayar" class="form-label">Metode Bayar</label>
            <select name="metode_bayar" id="metode_bayar" class="form-select" required>
                <option value="tunai" {{ $transaction->metode_bayar == 'tunai' ? 'selected' : '' }}>Tunai</option>
                <option value="transfer" {{ $transaction->metode_bayar == 'transfer' ? 'selected' : '' }}>Transfer</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_akun_bank" class="form-label">Akun Bank</label>
            <input type="text" name="id_akun_bank" class="form-control" id="id_akun_bank" value="{{ $transaction->id_akun_bank }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="berhasil" {{ $transaction->status == 'berhasil' ? 'selected' : '' }}>Berhasil</option>
                <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="gagal" {{ $transaction->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
