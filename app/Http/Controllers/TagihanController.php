<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use Illuminate\Routing\Controller;

class TagihanController extends Controller
{
    public function index()
    {
        $tagihans = Tagihan::all();
        return view('tagihan.index', compact('tagihans'));
    }

    public function create()
    {
        return view('tagihan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        Tagihan::create($request->all());

        return redirect()->route('tagihan.index');
    }

    public function edit($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        return view('tagihan.edit', compact('tagihan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        $tagihan = Tagihan::findOrFail($id);
        $tagihan->update($request->all());

        return redirect()->route('tagihan.index');
    }

    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->delete();

        return redirect()->route('tagihan.index');
    }

    public function markAsPaid($id)
    {
        $tagihan = Tagihan::findOrFail($id);
        $tagihan->status = 'lunas';  // Misalnya, kita memiliki kolom status di tabel Tagihan
        $tagihan->save();

        return redirect()->route('tagihan.index');
    }
}
