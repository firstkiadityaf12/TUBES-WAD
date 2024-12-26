<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Bankaccount;
class PengeluaranController extends Controller
{
    public function index(){
        $pengeluarans = Pengeluaran::all();
        $nav = 'list pengeluaran';


        return view('pengeluaran.index', compact('pengeluarans', 'nav'));
    }

    public function show(Pengeluaran $pengeluarans)
    {
        $nav = 'Detail Pengeluaran - ' . $pengeluarans->tanggal_pengeluaran;
        return view('pengeluaran.show', compact('pengeluarans', 'nav'));
    }
    

    public function create()
    {
        $nav = 'Tambah Pengeluaran';
        $akunBanks = Bankaccount::all(); // Mendapatkan data akun bank
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

    public function edit(Pengeluaran $pengeluarans){
        $nav = 'Edit Pengeluaran - ' . $pengeluarans->tanggal_pengeluaran;
        $akunBanks = Bankaccount::all();
        return view('pengeluaran.edit', compact('pengeluarans', 'nav', 'akunBanks'));
        
    }

    public function update(UpdatePengeluaranRequest $request, Pengeluaran $pengeluarans){
        $validated = $request->validate([
            'tanggal_pengeluaran' => 'required|date',
            'sumber_pengeluaran' => 'required|string|max:255',
            'jumlah_pengeluaran' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
            'id_akun_bank' => 'required|integer|exists:akun_banks,id', // Foreign key
        ]);

        $pengeluarans->update($validated);

        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran Berhasil Diperbarui');
    }

    public function hapusPengeluaran(Pengeluaran $pengeluarans){
        $pengeluarans ->delete();
        
        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran Berhasil Dihapus');
    }

}
