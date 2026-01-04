<?php

namespace App\Http\Controllers;

use App\Models\Penimbangan;
use App\Models\Balita;
use Illuminate\Http\Request;

class PenimbanganController extends Controller
{
    public function index()
    {
        $penimbangans = Penimbangan::with('balita')->latest()->get();
        return view('penimbangans.index', compact('penimbangans'));
    }

    public function create()
    {
        $balitas = Balita::all();
        return view('penimbangans.create', compact('balitas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'balita_id' => 'required|exists:balitas,id',
            'tgl_penimbangan' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ]);
        
        Penimbangan::create($validated);
        return redirect()->route('penimbangans.index')->with('success', 'Data Penimbangan berhasil ditambahkan');
    }

    public function show(Penimbangan $penimbangan)
    {
        // Simple show implementation potentially reusing create view just for displaying
        // Or just redirect to index for now as detail view wasn't specifically requested
        return redirect()->route('penimbangans.index'); 
    }

    public function edit(Penimbangan $penimbangan)
    {
        $balitas = Balita::all();
        return view('penimbangans.edit', compact('penimbangan', 'balitas'));
    }

    public function update(Request $request, Penimbangan $penimbangan)
    {
        $validated = $request->validate([
            'balita_id' => 'required|exists:balitas,id',
            'tgl_penimbangan' => 'required|date',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'lingkar_kepala' => 'nullable|numeric',
            'keterangan' => 'nullable|string',
        ]);

        $penimbangan->update($validated);
        return redirect()->route('penimbangans.index')->with('success', 'Data Penimbangan berhasil diperbarui');
    }

    public function destroy(Penimbangan $penimbangan)
    {
        $penimbangan->delete();
        return redirect()->route('penimbangans.index')->with('success', 'Data Penimbangan berhasil dihapus');
    }
}
