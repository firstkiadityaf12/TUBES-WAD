<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiKeuangan;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = TransaksiKeuangan::orderBy('tanggal_transaksi', 'desc')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_transaksi' => 'required|date',
            'kategori' => 'required|in:pemasukan,pengeluaran',
            'deskripsi' => 'nullable|string|max:100',
            'jumlah' => 'required|numeric',
            'metode_bayar' => 'required|in:tunai,transfer',
            'id_akun_bank' => 'required|integer',
            'status' => 'required|in:berhasil,pending,gagal',
        ]);

        TransaksiKeuangan::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction recorded successfully!');
    }

    public function edit($id)
    {
        $transaction = TransaksiKeuangan::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_transaksi' => 'required|date',
            'kategori' => 'required|in:pemasukan,pengeluaran',
            'deskripsi' => 'nullable|string|max:100',
            'jumlah' => 'required|numeric',
            'metode_bayar' => 'required|in:tunai,transfer',
            'id_akun_bank' => 'required|integer',
            'status' => 'required|in:berhasil,pending,gagal',
        ]);

        $transaction = TransaksiKeuangan::findOrFail($id);
        $transaction->update($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    public function destroy($id)
    {
        $transaction = TransaksiKeuangan::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }

    public function show($id)
    {
        $transaction = TransaksiKeuangan::findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }
}
