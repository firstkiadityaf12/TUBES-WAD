<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bankaccount;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankaccounts = Bankaccount::all();
        $nav = 'Bank Account';
        return view('bankaccounts.index', compact('bankaccounts', 'nav'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create
        $nav = 'Tambah Bank Account';
        return view('bankaccounts.create', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Bankaccount $request)
    {
        $validateData = $request->validate([
            'nama_bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|unique:akun_banks,nomor_rekening',
            'nama_pemilik' => 'required|string|max:255',
            'saldo' => 'required|numeric|min:0',
            'tanggal_ditambahkan' => 'required|string|max:255',
            'tanggal_diubah' => 'required|string|max:255',
        ]);

        Bankaccount::create($validateData);
        return redirect()->route('bankaccounts.index')->with('success','Bank Account berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bankaccount $bankaccount)
    {
        //detail bank account
        $nav = 'Detail Bank Account'.$bankaccount->nama_bank;
        return view('bankaccounts.show', compact('bankaccount', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bankaccounts = BankAccount::findOrFail($id);
        return view('bankaccounts.edit', compact('bankaccounts'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bankaccount $bankaccount)
    {
        $validateData = $request->validate([
            'nama_bank' => 'string|max:255',
            'nomor_rekening' => 'string|max:255',
            'nama_pemilik' => 'string|max:255',
            'saldo' => 'numeric|min:0',
            'tanggal_ditambahkan' => 'string|max:255',
            'tanggal_diubah' => 'string|max:255',
        ]);

       $bankaccount->update($validateData);
       return redirect()->route('bankaccounts.index')->with('Success','Bank Account berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bankaccount $bankaccount)
    {
        $bankaccount->delete();
        return redirect()->route('bankaccounts.index')->with('Success','Bank Account berhasil dihapus');
    }
}
