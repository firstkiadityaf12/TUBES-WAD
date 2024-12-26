@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $nav }}</h1>
    <a href="{{ route('bankaccounts.create') }}" class="btn btn-success mb-3">Tambah Bank Account</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Bank</th>
                <th>Nomor Rekening</th>
                <th>Nama Pemilik</th>
                <th>Saldo</th>
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
                <td>{{ $bankaccount->saldo }}</td>
                <td>{{ $bankaccount->tanggal_ditambahkan }}</td>
                <td>{{ $bankaccount->tanggal_diubah }}</td>
                </td>
                <td>
                    <a href="{{ route('bankaccounts.edit', $bankaccount->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('bankaccounts.destroy', $bankaccount->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus laporan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
