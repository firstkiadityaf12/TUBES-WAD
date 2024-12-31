<?php

namespace App\Http\Controllers;
use App\Models\LaporanKeuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\TransaksiKeuangan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
        $laporan = LaporanKeuangan::all();
        $nav = 'Daftar Laporan Keuangan';
        return view('laporan_keuangan.index', compact('laporan', 'nav'));
    }


    public function create()
    {
        $nav = 'Tambah Laporan Keuangan';
        $periodePemasukan = TransaksiKeuangan::where('kategori', 'pemasukan')
        ->selectRaw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as periode")
        ->distinct()
        ->pluck('periode')
        ->toArray();

        $periodePengeluaran = TransaksiKeuangan::where('kategori', 'pengeluaran')
        ->selectRaw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') as periode")
        ->distinct()
        ->pluck('periode')
        ->toArray();

        $periode = collect(array_unique(array_merge($periodePemasukan, $periodePengeluaran)))
        ->sort()
        ->values();
        // $periodePemasukan = Pemasukan::selectRaw("DATE_FORMAT(STR_TO_DATE(tanggal_pemasukan, '%Y-%m-%d'), '%Y-%m') as periode")
        // ->distinct()
        // ->pluck('periode')
        // ->toArray();
    
        // $periodePengeluaran = Pengeluaran::selectRaw("DATE_FORMAT(STR_TO_DATE(tanggal_pengeluaran, '%Y-%m-%d'), '%Y-%m') as periode")
        // ->distinct()
        // ->pluck('periode')
        // ->toArray();

        // $periode = collect(array_unique(array_merge($periodePemasukan, $periodePengeluaran)))
        // ->sort()
        // ->values();

        return view('laporan_keuangan.create', ['nav' => $nav, 'periode' => $periode]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'periode_laporan' => 'required|string',
            'catatan' => 'nullable|string',
        ]);
    
        $periode = $request->periode_laporan;

        $totalPemasukan = TransaksiKeuangan::where('kategori', 'pemasukan')
        ->whereRaw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') = ?", [$periode])
        ->sum('jumlah');

        $totalPengeluaran = TransaksiKeuangan::where('kategori', 'pengeluaran')
        ->whereRaw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') = ?", [$periode])
        ->sum('jumlah');
    
        // $totalPemasukan = Pemasukan::whereRaw("DATE_FORMAT(STR_TO_DATE(tanggal_pemasukan, '%Y-%m-%d'), '%Y-%m') = ?", [$periode])
        //     ->sum('jumlah_pemasukan');
    
        // $totalPengeluaran = Pengeluaran::whereRaw("DATE_FORMAT(STR_TO_DATE(tanggal_pengeluaran, '%Y-%m-%d'), '%Y-%m') = ?", [$periode])
        //     ->sum('jumlah_pengeluaran');
    
        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        LaporanKeuangan::create([
            'periode_laporan' => $periode,
            'total_pemasukan' => $totalPemasukan,
            'total_pengeluaran' => $totalPengeluaran,
            'saldo_akhir' => $saldoAkhir,
            'catatan' => $validated['catatan'] ?? '',
            'tanggal_pembuatan' => now(),
            'tanggal_diubah' => now(),
        ]);
        //Input manual kwkwk
        // $validated = $request->validate([
            
        //     'periode_laporan' => 'string',
        //     'total_pemasukan' => 'required|numeric',
        //     'total_pengeluaran' => 'required|numeric',
        //     'saldo_akhir' => 'required|numeric',
        //     'catatan' => 'nullable|string',
        // ]);
        // $validated['tanggal_pembuatan'] = now();
        // $validated['tanggal_diubah'] = now();

        // LaporanKeuangan::create($validated);

        return redirect()->route('laporan_keuangan.index')->with('success', 'Laporan Keuangan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        return view('laporan_keuangan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'periode_laporan' => 'required|string',
            'total_pemasukan' => 'required|numeric',
            'total_pengeluaran' => 'required|numeric',
            'saldo_akhir' => 'required|numeric',
            'catatan' => 'nullable|string',
        ]);
    
        $laporan = LaporanKeuangan::findOrFail($id);
    
        $laporan->update(array_merge($validated, ['tanggal_diubah' => now()]));
    
        return redirect()->route('laporan_keuangan.index')->with('success', 'Laporan Keuangan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $laporan = LaporanKeuangan::findOrFail($id);
        $laporan->delete();
        return redirect()->route('laporan_keuangan.index')->with('success', 'Laporan Keuangan berhasil dihapus.');
    }

    public function exportPdf()
    {
        $laporan = LaporanKeuangan::all();
        $pdf = Pdf::loadView('laporan_keuangan.pdf', compact('laporan'));
        return $pdf->download('laporan_keuangan.pdf');
    }

    public function exportDetailPdf($id)
    {

        $laporan = LaporanKeuangan::findOrFail($id);
    
        $pemasukan = TransaksiKeuangan::where('kategori', 'pemasukan')
            ->whereRaw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') = ?", [$laporan->periode_laporan])
            ->get();
    
        $pengeluaran = TransaksiKeuangan::where('kategori', 'pengeluaran')
            ->whereRaw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') = ?", [$laporan->periode_laporan])
            ->get();
        $pdf = Pdf::loadView('laporan_keuangan.detail_pdf', compact('laporan', 'pemasukan', 'pengeluaran'));

        return $pdf->download('laporan_detail_' . $laporan->periode_laporan . '.pdf');
    }

    public function chart()
    {
        $laporan = LaporanKeuangan::select('periode_laporan', 'total_pemasukan', 'total_pengeluaran', 'saldo_akhir')->get();
        return view('laporan_keuangan.chart', compact('laporan'));
    }

    public function show($id)
    {

        $laporan = LaporanKeuangan::findOrFail($id);
        $pemasukan = TransaksiKeuangan::where('kategori', 'pemasukan')
            ->whereRaw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') = ?", [$laporan->periode_laporan])
            ->get();

        $pengeluaran = TransaksiKeuangan::where('kategori', 'pengeluaran')
            ->whereRaw("DATE_FORMAT(tanggal_transaksi, '%Y-%m') = ?", [$laporan->periode_laporan])
            ->get();

        return view('laporan_keuangan.show', compact('laporan', 'pemasukan', 'pengeluaran'));
    }
}