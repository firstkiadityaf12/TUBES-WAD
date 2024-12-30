<?php

namespace App\Http\Controllers;
use App\Models\LaporanKeuangan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

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
    $periodePemasukan = Pemasukan::selectRaw("DATE_FORMAT(STR_TO_DATE(tanggal_pemasukan, '%Y-%m-%d'), '%Y-%m') as periode")
        ->distinct()
        ->pluck('periode')
        ->toArray();
    
    $periodePengeluaran = Pengeluaran::selectRaw("DATE_FORMAT(STR_TO_DATE(tanggal_pengeluaran, '%Y-%m-%d'), '%Y-%m') as periode")
        ->distinct()
        ->pluck('periode')
        ->toArray();

        $periode = collect(array_unique(array_merge($periodePemasukan, $periodePengeluaran)))
        ->sort()
        ->values();

    return view('laporan_keuangan.create', ['nav' => $nav, 'periode' => $periode]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'periode_laporan' => 'required|string',
            'catatan' => 'nullable|string',
        ]);
    
        $periode = $request->periode_laporan;
    
        $totalPemasukan = Pemasukan::whereRaw("DATE_FORMAT(STR_TO_DATE(tanggal_pemasukan, '%Y-%m-%d'), '%Y-%m') = ?", [$periode])
            ->sum('jumlah_pemasukan');
    
        $totalPengeluaran = Pengeluaran::whereRaw("DATE_FORMAT(STR_TO_DATE(tanggal_pengeluaran, '%Y-%m-%d'), '%Y-%m') = ?", [$periode])
            ->sum('jumlah_pengeluaran');
    
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

    public function edit(LaporanKeuangan $laporanKeuangan)
    {
        return view('laporan_keuangan.edit', compact('laporanKeuangan'));
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

    public function destroy(LaporanKeuangan $laporanKeuangan)
    {
        $laporanKeuangan->delete();
        return redirect()->route('laporan_keuangan.index')->with('success', 'Laporan Keuangan berhasil dihapus.');
    }
}