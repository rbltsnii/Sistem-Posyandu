<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalitaController extends Controller
{
    public function index()
    {
        $balitas = Balita::with('orangTua')->get();
        return view('balitas.index', compact('balitas'));
    }

    public function create()
    {
        $parents = User::where('role', 'parent')->get();
        return view('balitas.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:balitas',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'user_id' => 'required|exists:users,id',
            'berat_lahir' => 'numeric',
            'tinggi_lahir' => 'numeric',
        ]);

        Balita::create($validated);
        return redirect()->route('balitas.index')->with('success', 'Data Balita berhasil ditambahkan');
    }

    public function show(Balita $balita)
    {
        return view('balitas.show', compact('balita'));
    }
    
    public function edit(Balita $balita)
    {
        $parents = User::where('role', 'parent')->get();
        return view('balitas.edit', compact('balita', 'parents'));
    }

    public function update(Request $request, Balita $balita)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik' => 'required|unique:balitas,nik,' . $balita->id,
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'user_id' => 'required|exists:users,id',
            'berat_lahir' => 'numeric',
            'tinggi_lahir' => 'numeric',
        ]);

        $balita->update($validated);
        return redirect()->route('balitas.index')->with('success', 'Data Balita berhasil diperbarui');
    }

    public function destroy(Balita $balita)
    {
        $balita->delete();
        return redirect()->route('balitas.index')->with('success', 'Data Balita berhasil dihapus');
    }
}
