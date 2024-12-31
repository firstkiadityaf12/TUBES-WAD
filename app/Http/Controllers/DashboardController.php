<?php

namespace App\Http\Controllers;
use App\Models\LaporanKeuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\TransaksiKeuangan;
use App\Models\Bankaccount;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTransaksi = TransaksiKeuangan::count();
        $totalPengeluaran = TransaksiKeuangan::where('kategori', 'pengeluaran')->sum('jumlah');
        $totalPemasukan = TransaksiKeuangan::where('kategori', 'pemasukan')->sum('jumlah');
        $totalLaporanKeuangan = LaporanKeuangan::count();
        $totalAkunBank = BankAccount::count();
        $totalSaldoAkunBank = BankAccount::sum('saldo');
        $totalTagihan = Tagihan::count();
    
        return view('dashboard.index', compact(
            'totalTransaksi', 
            'totalPengeluaran', 
            'totalPemasukan', 
            'totalLaporanKeuangan', 
            'totalAkunBank', 
            'totalSaldoAkunBank', 
            'totalTagihan'
        ));
    }
}