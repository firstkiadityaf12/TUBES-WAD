@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary mb-4">Edit Tagihan</h1>
    <form action="{{ route('tagihan.update', $tagihan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_tagihan" class="form-label">Nama Tagihan</label>
            <input type="text" class="form-control" id="nama_tagihan" name="nama_tagihan" value="{{ $tagihan->nama_tagihan }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
            <input type="date" class="form-control" id="tanggal_jatuh_tempo" name="tanggal_jatuh_tempo" value="{{ $tagihan->tanggal_jatuh_tempo }}" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan</label>
            <input type="number" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" value="{{ $tagihan->jumlah_tagihan }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="dibayar" {{ $tagihan->status == 'dibayar' ? 'selected' : '' }}>Dibayar</option>
                <option value="belum dibayar" {{ $tagihan->status == 'belum dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="id_akun_bank" class="form-label">Akun Bank</label>
            <select class="form-select" id="id_akun_bank" name="id_akun_bank" required>
                @foreach($akunBanks as $bank)
                    <option value="{{ $bank->id }}" {{ $tagihan->id_akun_bank == $bank->id ? 'selected' : '' }}>
                        {{ $bank->nama_bank }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
