@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
    <a href="{{ route('akun_banks.create') }}" class="btn btn-success mb-3">Tambah Bank Account</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Bank</th>
                <th>Nomor Rekening</th>
                <th>Nama Pemilik</th>
                <th>Tanggal Ditambah</th>
                <th>Tanggal Diubah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bankaccounts as $bankaccount)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $bankaccount->nama_bank }}</td>
                <td>{{ $bankaccount->nomor_rekening }}</td>
                <td>{{ $bankaccount->nama_pemilik }}</td>
                <td>{{ $bankaccount->tanggal_ditambahkan }}</td>
                <td>{{ $bankaccount->tanggal_diubah }}</td>
                </td>
                <td>
                    <a href="{{ route('akun_banks.show', $bankaccount->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('akun_banks.edit', $bankaccount->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('akun_banks.destroy', $bankaccount->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
