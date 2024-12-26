<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Routing\Controller;
use App\Models\Pengeluaran;
use App\Models\Akun_Bank;
=======
use App\Models\Pengeluaran;
>>>>>>> 9d48a8d32f087c824acdcbb00fd9bd95326cc704

class PengeluaranController extends Controller
{
    public function index(){
        $pengeluarans = Pengeluaran::all();
        $nav = 'list pengeluaran';


        return view('pengeluaran.index', compact('pengeluarans', 'nav'));
    }

    public function readPengeluaran(Pengeluaran $pengeluarans)
    {
        $nav = 'Detail Buku - ' . $pengeluarans->tanggal_pengeluaran;
        return view('pengeluaran.readPengeluaran', compact('pengeluarans', 'nav'));
    }

    public function createPengeluaran()
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

    public function edit(Pengeluaran $pengeluarans){
        $nav = 'Edit Pengeluaran - ' . $pengeluarans->tanggal_pengeluaran;
        return view('pengeluaran.edit', compact('pengeluarans', 'nav'));
    }

    public function updatePengeluaran(UpdatePengeluaranRequest $request, Pengeluaran $pengeluarans){
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
<<<<<<< HEAD

        return redirect()->route(pengeluaran.index)->with('success', 'Pengeluaran Berhasil Dihapus');
=======
        
        return redirect()->route('pengeluaran.index')->with('success', 'Pengeluaran Berhasil Dihapus');
>>>>>>> 9d48a8d32f087c824acdcbb00fd9bd95326cc704
    }

}
