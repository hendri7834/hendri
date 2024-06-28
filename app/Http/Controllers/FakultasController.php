<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('fakultas.index', compact('fakultas'));
    }

    // Create method
    public function create()
    {
        return view('fakultas.create');
    }

    // Store method
    public function store(Request $request)
    {
        $request->validate([
            'nama_fakultas' => 'required',
            'pimpinan_fakultas' => 'required',
        ]);

        Fakultas::create($request->all());
        return redirect()->route('fakultas.index')->with('success', 'Fakultas created successfully.');
    }

    // Edit method
    public function edit(Fakultas $fakultas)
    {
        return view('fakultas.edit', compact('fakultas'));
    }

    // Update method
    public function update(Request $request, Fakultas $fakultas)
    {
        $request->validate([
            'nama_fakultas' => 'required',
            'pimpinan_fakultas' => 'required',
        ]);

        $fakultas->update($request->all());
        return redirect()->route('fakultas.index')->with('success', 'Fakultas updated successfully.');
    }

    // Destroy method
    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success', 'Fakultas deleted successfully.');
    }
}