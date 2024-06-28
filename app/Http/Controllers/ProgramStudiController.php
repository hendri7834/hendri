<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    // Index method
    public function index()
    {
        $programStudis = ProgramStudi::with('fakultas')->get();
        return view('program_studi.index', compact('programStudis'));
    }

    // Create method
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('program_studi.create', compact('fakultas'));
    }

    // Store method
    public function store(Request $request)
    {
        $request->validate([
            'kode_prodi' => 'required|integer',
            'nama_prodi' => 'required|string',
            'kode_fakultas' => 'required|exists:fakultas,id',
        ]);

        ProgramStudi::create($request->all());
        return redirect()->route('program-studi.index')->with('success', 'Program Studi created successfully.');
    }

    // Edit method
    public function edit(ProgramStudi $programStudi)
    {
        $fakultas = Fakultas::all();
        return view('program_studi.edit', compact('programStudi', 'fakultas'));
    }

    // Update method
    public function update(Request $request, ProgramStudi $programStudi)
    {
        $request->validate([
            'kode_prodi' => 'required|integer',
            'nama_prodi' => 'required|string',
            'kode_fakultas' => 'required|exists:fakultas,id',
        ]);

        $programStudi->update($request->all());
        return redirect()->route('program-studi.index')->with('success', 'Program Studi updated successfully.');
    }

    // Destroy method
    public function destroy(ProgramStudi $programStudi)
    {
        $programStudi->delete();
        return redirect()->route('program-studi.index')->with('success', 'Program Studi deleted successfully.');
    }
}