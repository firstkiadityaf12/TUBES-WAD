<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankaccounts = Bankaccount::all();
        $nav = 'Bank Account';
        return view('akun_banks.index', compact('bankaccounts', 'nav'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create
        $nav = 'Tambah Bank Account';
        return view('akun_banks.create', compact('nav'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankAccountRequest $request)
    {
        $validateData = $request->validate([
            'nama_bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|unique:akun_banks,nomor_rekening',
            'nama_pemilik' => 'required|string|max:255',
            'saldo' => 'required|numeric|min:0',
            'tanggal_ditambahkan' => 'required|string|max:255',
            'tanggal_diubah' => 'required|string|max:255',
        ]);

        BankAccountRequest::create($validateData);
        return redirect()->route('akun_banks.index')->with('success','Bank Account berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bankaccount $bankaccount)
    {
        //detail bank account
        $nav = 'Detail Bank Account'.$bankaccount->nama_bank;
        return view('akun_banks.show', compact('bankaccount', 'nav'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bankaccount $bankaccount)
    {
        $nav = 'Edit Bank Account'.$bankaccount->nama_bank;
        return view('akun_banks.edit', compact('bankaccount', 'nav'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankAccountRequest $request, Bankaccount $bankaccount)
    {
        $validateData = $request->validate([
            'nama_bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|unique:akun_banks,nomor_rekening',
            'nama_pemilik' => 'required|string|max:255',
            'saldo' => 'required|numeric|min:0',
            'tanggal_ditambahkan' => 'required|string|max:255',
            'tanggal_diubah' => 'required|string|max:255',
        ]);

       $bankaccount->update($validateData);
       return redirect()->route('akun_banks.index')->with('Success','Bank Account berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bankaccount $bankaccount)
    {
        $bankaccount->delete();
        return redirect()->route('akun_banks.index')->with('Success','Bank Account berhasil dihapus');
    }
}
