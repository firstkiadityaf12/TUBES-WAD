<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use Illuminate\Routing\Controller;
use App\Models\Bankaccount;
use Barryvdh\DomPDF\Facade as Pdf;

class TagihanController extends Controller
{
    public function index(Request $request)
    {
        $query = Tagihan::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('tanggal')) {
            $query->orderBy('tanggal_jatuh_tempo', $request->tanggal);
        }

        if ($request->filled('jumlah')) {
            $query->orderBy('jumlah_tagihan', $request->jumlah);
        }

        $tagihans = $query->get();
        $nav = 'List Tagihan';

        return view('tagihan.index', compact('tagihans', 'nav'));
    }

    public function show(Tagihan $tagihan)
    {
        $nav = 'Detail Tagihan - ' . $tagihan->nama_tagihan;
        return view('tagihan.show', compact('tagihan', 'nav'));
    }

    public function create()
    {
        $akunBanks = Bankaccount::all();
        $nav = 'Tambah Tagihan';
        return view('tagihan.create', compact('akunBanks', 'nav'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tagihan' => 'required|string|max:255',
            'tanggal_jatuh_tempo' => 'required|date',
            'jumlah_tagihan' => 'required|numeric',
            'status' => 'required|in:dibayar,belum dibayar',
            'catatan' => 'nullable|string|max:255',
            'id_akun_bank' => 'required|exists:akun_banks,id',
        ]);

        Tagihan::create([
            'nama_tagihan' => $request->nama_tagihan,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'jumlah_tagihan' => $request->jumlah_tagihan,
            'status' => $request->status,
            'catatan' => $request->catatan ?? '',
            'id_akun_bank' => $request->id_akun_bank,
        ]);

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil ditambahkan.');
    }

    public function edit(Tagihan $tagihan)
    {
        $akunBanks = Bankaccount::all();
        $nav = 'Edit Tagihan - ' . $tagihan->nama_tagihan;
        return view('tagihan.edit', compact('tagihan', 'akunBanks', 'nav'));
    }

    public function update(Request $request, Tagihan $tagihan)
    {
        $request->validate([
            'nama_tagihan' => 'required|string|max:255',
            'tanggal_jatuh_tempo' => 'required|date',
            'jumlah_tagihan' => 'required|numeric',
            'status' => 'required|in:dibayar,belum dibayar',
            'catatan' => 'nullable|string|max:255',
            'id_akun_bank' => 'required|exists:akun_banks,id',
        ]);

        $tagihan->update([
            'nama_tagihan' => $request->nama_tagihan,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'jumlah_tagihan' => $request->jumlah_tagihan,
            'status' => $request->status,
            'catatan' => $request->catatan ?? '',
            'id_akun_bank' => $request->id_akun_bank,
        ]);

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil diperbarui.');
    }

    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil dihapus.');
    }

    public function markAsPaid($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->status = 'dibayar';
        $tagihan->save();

        return redirect()->route('tagihan.index')->with('success', 'Status tagihan berhasil diperbarui.');
    }

    public function exportPdf(Request $request)
    {
        $query = Tagihan::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('tanggal')) {
            $query->orderBy('tanggal_jatuh_tempo', $request->tanggal);
        }

        if ($request->filled('jumlah')) {
            $query->orderBy('jumlah_tagihan', $request->jumlah);
        }

        $tagihans = $query->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('tagihan.pdf', compact('tagihans'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('daftar_tagihan.pdf');
    }
}
