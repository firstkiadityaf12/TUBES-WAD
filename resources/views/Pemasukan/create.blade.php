@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
    <p class="text-muted">Bagian ini digunakan untuk menambahkan data pemasukan baru ke sistem. Pastikan semua informasi diisi dengan benar.</p>
    <form action="{{ route('pemasukan.store') }}" method="POST">
        @csrf
        <!-- Tanggal Pemasukan -->
        <div class="mb-3">
            <label for="tanggal_pemasukan" class="form-label">Tanggal Pemasukan</label>
            <input 
                type="date" 
                class="form-control" 
                id="tanggal_pemasukan" 
                name="tanggal_pemasukan" 
                required 
                placeholder="Pilih tanggal pemasukan" 
                title="Masukkan tanggal transaksi pemasukan Anda."
            >
            <small class="form-text text-muted">Masukkan tanggal pemasukan sesuai dengan transaksi yang dilakukan.</small>
        </div>
        <!-- Sumber Pemasukan -->
        <div class="mb-3">
            <label for="sumber_pemasukan" class="form-label">Sumber Pemasukan</label>
            <input 
                type="text" 
                class="form-control" 
                id="sumber_pemasukan" 
                name="sumber_pemasukan" 
                required 
                placeholder="Contoh: Penjualan Produk" 
                title="Masukkan sumber dari pemasukan ini, misalnya penjualan atau pendapatan lain."
            >
            <small class="form-text text-muted">Tuliskan sumber pemasukan, misalnya penjualan produk atau pendapatan lainnya.</small>
        </div>
        <!-- Jumlah Pemasukan -->
        <div class="mb-3">
            <label for="jumlah_pemasukan" class="form-label">Jumlah Pemasukan</label>
            <input 
                type="number" 
                step="0.01" 
                class="form-control" 
                id="jumlah_pemasukan" 
                name="jumlah_pemasukan" 
                required 
                placeholder="Masukkan jumlah nominal (contoh: 50000)" 
                title="Masukkan jumlah nominal pemasukan."
            >
            <small class="form-text text-muted">Masukkan jumlah nominal pemasukan dalam angka, contoh: 50000.</small>
        </div>
        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea 
                class="form-control" 
                id="deskripsi" 
                name="deskripsi" 
                placeholder="Contoh: Penjualan produk A ke pelanggan B." 
                title="Masukkan deskripsi tambahan tentang pemasukan ini (opsional)."
            ></textarea>
            <small class="form-text text-muted">Tambahkan deskripsi detail tentang pemasukan ini, misalnya jenis produk atau pelanggan (opsional).</small>
        </div>
        <!-- Akun Bank -->
        <div class="mb-3">
            <label for="id_bank" class="form-label">Akun Bank</label>
            <select 
                class="form-select" 
                id="id_bank" 
                name="id_bank" 
                required 
                title="Pilih akun bank tempat pemasukan dicatat."
            >
                @foreach($akun_banks as $bank)
                    <option value="{{ $bank->id }}">
                        {{ $bank->nama_bank }} - {{ $bank->nomor_rekening }}
                    </option>
                @endforeach
            </select>
            <small class="form-text text-muted">Pilih akun bank yang digunakan untuk mencatat transaksi pemasukan.</small>
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
