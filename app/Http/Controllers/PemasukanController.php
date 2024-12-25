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
    public function index()
    {
        //
        $pemasukans = Pemasukan::all();
        $nav = 'List Pemasukan';
        return view('pemasukan.index', compact('pemasukans', 'nav'));
    }

    public function read(Pemasukan $pemasukans)
    {
        $nav = 'Detail Pemasukan - ' . $pemasukans->tanggal_pemasukan;
        return view('pemasukan.read', compact('pemasukans', 'nav'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $nav = 'Tambah Pemasukan';
        $akun_banks = Bankaccount::all(); // Fetch all available Akun_Bank
        return view('pemasukan.create', compact('nav', 'akun_banks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'tanggal_pemasukan' => 'required|string',
            'sumber_pemasukan' => 'required|string',
            'jumlah_pemasukan' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'id_bank' => 'required|exists:akun_banks,id',
        ]);

        Pemasukan::create($validatedData);

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pemasukan = Pemasukan::with('akunBank')->findOrFail($id);
        $nav = 'Detail Pemasukan';
        return view('pemasukan.show', compact('pemasukan', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $pemasukan = Pemasukan::findOrFail($id);
        $akun_banks = Bankaccount::all();
        $nav = 'Edit Pemasukan';
        return view('pemasukan.edit', compact('pemasukan', 'akun_banks', 'nav'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'tanggal_pemasukan' => 'required|string',
            'sumber_pemasukan' => 'required|string',
            'jumlah_pemasukan' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'id_bank' => 'required|exists:akun_banks,id',
        ]);

        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->update($validatedData);

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->delete();

        return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil dihapus.');
    }
}
