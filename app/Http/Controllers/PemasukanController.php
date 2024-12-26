<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Bankaccount;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $pemasukans = Pemasukan::all();
        $nav = 'list pemasukan';
        return view('pemasukan.index', compact('pemasukans', 'nav'));
    }

    public function show(Pemasukan $pemasukan)
    {
        $nav = 'Detail Pemasukan - ' . $pemasukan->tanggal_pemasukan;
        return view('pemasukan.show', compact('pemasukan', 'nav'));
    }


    public function create()
    {
        $nav = 'Tambah Pemasukan';
        $akunBanks = Bankaccount::all(); // Mendapatkan data akun bank
        return view('pemasukan.create', compact('nav', 'akunBanks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_pemasukan' => 'required|date',
            'sumber_pemasukan' => 'required|string|max:255',
            'jumlah_pemasukan' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
            'id_akun_bank' => 'required|integer|exists:akun_banks,id', // Foreign key
        ]);

        Pemasukan::create($validated);

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemasukan $pemasukan){
        $nav = 'Edit Pemasukan - ' . $pemasukan->tanggal_pemasukan;
        $akunBanks = Bankaccount::all();
        return view('pemasukan.edit', compact('pemasukan', 'nav', 'akunBanks'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemasukan $pemasukan){
        $validated = $request->validate([
            'tanggal_pemasukan' => 'required|date',
            'sumber_pemasukan' => 'required|string|max:255',
            'jumlah_pemasukan' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
            'id_akun_bank' => 'required|integer|exists:akun_banks,id', // Foreign key
        ]);

        $pemasukan->update($validated);

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemasukan $pemasukan){
        $pemasukan ->delete();
        
        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan Berhasil Dihapus');
    }
}
