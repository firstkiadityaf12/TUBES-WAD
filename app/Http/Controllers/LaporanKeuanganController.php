<?php

namespace App\Http\Controllers;
use App\Models\LaporanKeuangan;
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
        return view('laporan_keuangan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'periode_laporan' => 'required|string',
            'total_pemasukan' => 'required|numeric',
            'total_pengeluaran' => 'required|numeric',
            'saldo_akhir' => 'required|numeric',
            'catatan' => 'nullable|string',
            'tanggal_pembuatan' => 'required|date',
        ]);

        $validated['tanggal_diubah'] = null;

        LaporanKeuangan::create($validated);

        return redirect()->route('laporan-keuangan.index')->with('success', 'Laporan Keuangan berhasil ditambahkan.');
    }

    public function edit(LaporanKeuangan $laporanKeuangan)
    {
        return view('laporan_keuangan.edit', compact('laporanKeuangan'));
    }

    public function update(Request $request, LaporanKeuangan $laporanKeuangan)
    {
        $validated = $request->validate([
            'periode_laporan' => 'required|string',
            'total_pemasukan' => 'required|numeric',
            'total_pengeluaran' => 'required|numeric',
            'saldo_akhir' => 'required|numeric',
            'catatan' => 'nullable|string',
            'tanggal_pembuatan' => 'required|date',
        ]);

        $validated['tanggal_diubah'] = now();

        $laporanKeuangan->update($validated);

        return redirect()->route('laporan-keuangan.index')->with('success', 'Laporan Keuangan berhasil diperbarui.');
    }

    public function destroy(LaporanKeuangan $laporanKeuangan)
    {
        $laporanKeuangan->delete();
        return redirect()->route('laporan-keuangan.index')->with('success', 'Laporan Keuangan berhasil dihapus.');
    }
}