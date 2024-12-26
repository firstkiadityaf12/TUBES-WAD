@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Transaksi</h2>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tanggal_transaksi" class="form-label" style="color: black;">Tanggal Transaksi</label>
            <input type="date" name="tanggal_transaksi" class="form-control" id="tanggal_transaksi" value="{{ $transaction->tanggal_transaksi }}" required>
            <small class="form-text text-muted">Pilih tanggal transaksi yang ingin Anda perbarui.</small>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label" style="color: black;">Kategori</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option value="pemasukan" {{ $transaction->kategori == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                <option value="pengeluaran" {{ $transaction->kategori == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
            </select>
            <small class="form-text text-muted">Pilih kategori transaksi (Pemasukan atau Pengeluaran).</small>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label" style="color: black;">Deskripsi</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="{{ $transaction->deskripsi }}">
            <small class="form-text text-muted">Masukkan deskripsi singkat mengenai transaksi.</small>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label" style="color: black;">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ $transaction->jumlah }}" required>
            <small class="form-text text-muted">Masukkan jumlah uang untuk transaksi ini.</small>
        </div>
        <div class="mb-3">
            <label for="metode_bayar" class="form-label" style="color: black;">Metode Bayar</label>
            <select name="metode_bayar" id="metode_bayar" class="form-select" required>
                <option value="tunai" {{ $transaction->metode_bayar == 'tunai' ? 'selected' : '' }}>Tunai</option>
                <option value="transfer" {{ $transaction->metode_bayar == 'transfer' ? 'selected' : '' }}>Transfer</option>
            </select>
            <small class="form-text text-muted">Pilih metode pembayaran untuk transaksi ini.</small>
        </div>
        <div class="mb-3">
            <label for="id_akun_bank" class="form-label" style="color: black;">Akun Bank</label>
            <input type="text" name="id_akun_bank" class="form-control" id="id_akun_bank" value="{{ $transaction->id_akun_bank }}" required>
            <small class="form-text text-muted">Masukkan ID akun bank jika menggunakan transfer.</small>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label" style="color: black;">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="berhasil" {{ $transaction->status == 'berhasil' ? 'selected' : '' }}>Berhasil</option>
                <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="gagal" {{ $transaction->status == 'gagal' ? 'selected' : '' }}>Gagal</option>
            </select>
            <small class="form-text text-muted">Pilih status transaksi (Berhasil, Pending, atau Gagal).</small>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
