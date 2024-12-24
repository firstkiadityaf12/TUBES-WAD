@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
    <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tanggal_pemasukan" class="form-label">Tanggal Pemasukan</label>
            <input type="date" class="form-control" id="tanggal_pemasukan" name="tanggal_pemasukan" value="{{ $pemasukan->tanggal_pemasukan }}" required>
        </div>
        <div class="mb-3">
            <label for="sumber_pemasukan" class="form-label">Sumber Pemasukan</label>
            <input type="text" class="form-control" id="sumber_pemasukan" name="sumber_pemasukan" value="{{ $pemasukan->sumber_pemasukan }}" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_pemasukan" class="form-label">Jumlah Pemasukan</label>
            <input type="number" step="0.01" class="form-control" id="jumlah_pemasukan" name="jumlah_pemasukan" value="{{ $pemasukan->jumlah_pemasukan }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $pemasukan->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label for="id_bank" class="form-label">Akun Bank</label>
            <select class="form-select" id="id_bank" name="id_bank" required>
                @foreach($akun_banks as $bank)
                    <option value="{{ $bank->id }}" {{ $pemasukan->id_bank == $bank->id ? 'selected' : '' }}>
                        {{ $bank->nama_bank }} - {{ $bank->nomor_rekening }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
