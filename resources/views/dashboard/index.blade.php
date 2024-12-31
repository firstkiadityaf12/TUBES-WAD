@extends('layouts.app')

@section('content')
<style>
    body, h1, ul, table, th, td, a {
        color: black;
    }
</style>
<div class="container">
    <h1 class="text-center">Dashboard</h1>
    <div class="row">
        <!-- Total Transaksi -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Transaksi</h5>
                    <p class="card-text">{{ $totalTransaksi }}</p>
                </div>
            </div>
        </div>
        <!-- Total Pengeluaran -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Pengeluaran</h5>
                    <p class="card-text">Rp{{ number_format($totalPengeluaran, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <!-- Total Pemasukan -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Pemasukan</h5>
                    <p class="card-text">Rp{{ number_format($totalPemasukan, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Total Laporan Keuangan -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Laporan Keuangan</h5>
                    <p class="card-text">{{ $totalLaporanKeuangan }}</p>
                </div>
            </div>
        </div>
        <!-- Total Akun Bank -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Akun Bank</h5>
                    <p class="card-text">{{ $totalAkunBank }}</p>
                </div>
            </div>
        </div>
        <!-- Total Saldo Akun Bank -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Saldo dalam Akun Bank</h5>
                    <p class="card-text">Rp{{ number_format($totalSaldoAkunBank, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Total Tagihan -->
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Total Tagihan</h5>
                    <p class="card-text">{{ $totalTagihan }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
