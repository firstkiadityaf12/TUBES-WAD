@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
    <p class="text-muted">Bagian ini digunakan untuk menambahkan data tagihan baru ke sistem. Pastikan semua informasi diisi dengan benar.</p>

    <form action="{{ route('tagihan.store') }}" method="POST">
        @csrf
        <!-- Nama Tagihan -->
        <div class="mb-3">
            <label for="nama_tagihan" class="form-label">Nama Tagihan</label>
            <input
                type="text"
                class="form-control"
                id="nama_tagihan"
                name="nama_tagihan"
                required
                placeholder="Contoh: Pembayaran Listrik"
                title="Masukkan nama tagihan, misalnya pembayaran listrik."
            >
            <small class="form-text text-muted">Masukkan nama tagihan yang perlu dibayar, misalnya pembayaran listrik atau lainnya.</small>
        </div>

        <!-- Tanggal Jatuh Tempo -->
        <div class="mb-3">
            <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
            <input
                type="date"
                class="form-control"
                id="tanggal_jatuh_tempo"
                name="tanggal_jatuh_tempo"
                required
                placeholder="Pilih tanggal jatuh tempo"
                title="Masukkan tanggal jatuh tempo untuk tagihan ini."
            >
            <small class="form-text text-muted">Masukkan tanggal jatuh tempo tagihan sesuai dengan transaksi yang dilakukan.</small>
        </div>

        <!-- Jumlah Tagihan -->
        <div class="mb-3">
            <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan</label>
            <input
                type="number"
                step="0.01"
                class="form-control"
                id="jumlah_tagihan"
                name="jumlah_tagihan"
                required
                placeholder="Masukkan jumlah nominal (contoh: 500000)"
                title="Masukkan jumlah nominal tagihan."
            >
            <small class="form-text text-muted">Masukkan jumlah nominal tagihan dalam angka, contoh: 500000.</small>
        </div>

        <!-- Status Tagihan -->
        <div class="mb-3">
            <label for="status" class="form-label">Status Tagihan</label>
            <input
                type="text"
                class="form-control"
                id="status"
                name="status"
                required
                placeholder="Masukkan status tagihan (contoh: belum lunas atau lunas)"
                title="Masukkan status tagihan, apakah sudah dibayar atau belum."
            >
            <small class="form-text text-muted">Masukkan status tagihan, contoh: belum lunas atau lunas.</small>
        </div>

        <!-- Akun Bank -->
        <div class="mb-3">
            <label for="id_akun_bank">Akun Bank</label>
            <select name="id_akun_bank" id="id_akun_bank" class="form-control" required>
                @foreach ($akunBanks as $bank)
                    <option value="{{ $bank->id }}">{{ $bank->nama_bank }}</option>
                @endforeach
            </select>
            <small class="form-text text-muted">Pilih akun bank tempat pembayaran tagihan.</small>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<!-- Tooltip Initialization -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Activate Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection
