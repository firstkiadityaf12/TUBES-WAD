@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center my-4">
        <h1 class="display-4" style="color: black;">Tambah Tagihan</h1>
    </div>

    <form action="{{ route('tagihan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_tagihan" class="form-label">Nama Tagihan</label>
            <input type="text" class="form-control" id="nama_tagihan" name="nama_tagihan" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
            <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" required>
        </div>

        <div class="mb-3">
            <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan</label>
            <input type="number" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="belum_lunas">Belum Lunas</option>
                <option value="lunas">Lunas</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="id_akun_bank" class="form-label">Akun Bank</label>
            <select class="form-select" id="id_akun_bank" name="id_akun_bank" required>
                @foreach($akunBanks as $bank)
                    <option value="{{ $bank->id }}">{{ $bank->nama_bank }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('tagihan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
