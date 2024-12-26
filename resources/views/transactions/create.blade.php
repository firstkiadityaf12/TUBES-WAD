@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Transaksi</h2>
    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggal_transaksi" class="form-label">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" class="form-control" id="tanggal_transaksi" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option value="pemasukan">Pemasukan</option>
                <option value="pengeluaran">Pengeluaran</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi">
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" required>
        </div>
        <div class="mb-3">
            <label for="metode_bayar" class="form-label">Metode Bayar</label>
            <select name="metode_bayar" id="metode_bayar" class="form-select" required>
                <option value="tunai">Tunai</option>
                <option value="transfer">Transfer</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_akun_bank" class="form-label">Akun Bank</label>
            <input type="text" name="id_akun_bank" class="form-control" id="id_akun_bank" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="berhasil">Berhasil</option>
                <option value="pending">Pending</option>
                <option value="gagal">Gagal</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

