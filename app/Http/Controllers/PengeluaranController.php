<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\AkunBank;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::all();
        $nav = 'List Pengeluaran';

        return view('pengeluaran.index', compact('pengeluarans', 'nav'));
    }

    public function show(Pengeluaran $pengeluaran)
    {
        $nav = 'Detail Pengeluaran - ' . $pengeluaran->tanggal_pengeluaran;

        return view('pengeluaran.show', compact('pengeluaran', 'nav'));
    }

    public function create()
    {
        $nav = 'Tambah Pengeluaran';
        $akunBanks = AkunBank::all(); // Mendapatkan data akun bank

        return view('pengeluaran.create', compact('nav', 'akunBanks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_pengeluaran' => 'required|date',
            'sumber_pengeluaran' => 'required|string|max:255',
            'jumlah_pengeluaran' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
            'id_akun_bank' => 'required|integer|exists:akun_banks,id', // Foreign key
        ]);

        Pengeluaran::create($validated);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        $nav = 'Edit Pengeluaran - ' . $pengeluaran->tanggal_pengeluaran;
        $akunBanks = AkunBank::all(); // Mendapatkan data akun bank

        return view('pengeluaran.edit', compact('pengeluaran', 'nav', 'akunBanks'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validated = $request->validate([
            'tanggal_pengeluaran' => 'required|date',
            'sumber_pengeluaran' => 'required|string|max:255',
            'jumlah_pengeluaran' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
            'id_akun_bank' => 'required|integer|exists:akun_banks,id', // Foreign key
        ]);

        $pengeluaran->update($validated);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil diperbarui.');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran berhasil dihapus.');
    }
}
