<?php

namespace App\Http\Controllers;

use App\Models\Imunisasi;
use App\Models\Balita;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    public function index()
    {
        $imunisasis = Imunisasi::with('balita')->latest()->get();
        return view('imunisasies.index', compact('imunisasis'));
    }

    public function create()
    {
        $balitas = Balita::all();
        return view('imunisasies.create', compact('balitas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'balita_id' => 'required|exists:balitas,id',
            'tgl_imunisasi' => 'required|date',
            'jenis_imunisasi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        Imunisasi::create($validated);
        return redirect()->route('imunisasies.index')->with('success', 'Data Imunisasi berhasil ditambahkan');
    }
    
    public function show(Imunisasi $imunisasi)
    {
        return redirect()->route('imunisasies.index');
    }

    public function edit(Imunisasi $imunisasi)
    {
        $balitas = Balita::all();
        return view('imunisasies.edit', compact('imunisasi', 'balitas'));
    }

    public function update(Request $request, Imunisasi $imunisasi)
    {
        $validated = $request->validate([
            'balita_id' => 'required|exists:balitas,id',
            'tgl_imunisasi' => 'required|date',
            'jenis_imunisasi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $imunisasi->update($validated);
        return redirect()->route('imunisasies.index')->with('success', 'Data Imunisasi berhasil diperbarui');
    }

    public function destroy(Imunisasi $imunisasi)
    {
        $imunisasi->delete();
        return redirect()->route('imunisasies.index')->with('success', 'Data Imunisasi berhasil dihapus');
    }
}
