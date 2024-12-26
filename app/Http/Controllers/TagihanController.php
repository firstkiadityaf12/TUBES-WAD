<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use Illuminate\Routing\Controller;
use App\Models\Bankaccount;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::all();
        $nav = 'List Tagihan';
        return view('tagihan.index', compact('tagihans', 'nav'));
    }

    public function show(Tagihan $tagihan)
    {
        $nav = 'Detail Tagihan' . $tagihan->nama_tagihan;
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
            'status' => 'required|in:belum bayar,lunas',
            'id_akun_bank' => 'required|exists:akun_banks,id',
        ]);

        Tagihan::create([
            'nama_tagihan' => $request->nama_tagihan,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'jumlah_tagihan' => $request->jumlah_tagihan,
            'status' => $request->status,
            'id_akun_bank' => $request->id_akun_bank,
        ]);

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil ditambahkan.');
    }

    public function edit(Tagihan $tagihan)
    {
        $nav = 'Edit Tagihan' . $tagihan->nama_tagihan;
        return view('tagihan.edit', compact('tagihan', 'nav'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tagihan' => 'required|string|max:255',
            'tanggal_jatuh_tempo' => 'required|date',
            'jumlah_tagihan' => 'required|numeric',
            'status' => 'required|in:belum bayar,lunas',
            'id_akun_bank' => 'required|exists:akun_banks,id',
        ]);

        $tagihan = Tagihan::findOrFail($id);
        $tagihan->update([
            'nama_tagihan' => $request->nama_tagihan,
            'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
            'jumlah_tagihan' => $request->jumlah_tagihan,
            'status' => $request->status,
            'id_akun_bank' => $request->id_akun_bank,
        ]);

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil diperbarui.');
    }

    public function destroy(Tagihan $tagihan)
    {
        $tagihan->delete();

        return redirect()->route('tagihan.index')->with('success', 'Tagihan Berhasil Dihapus.');
    }

    public function markAsPaid($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->status = 'lunas';
        $tagihan->save();

        return redirect()->route('tagihan.index');
    }
}
