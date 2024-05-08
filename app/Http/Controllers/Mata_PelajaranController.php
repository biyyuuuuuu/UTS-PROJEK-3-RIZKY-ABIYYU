<?php

namespace App\Http\Controllers;

use App\Models\Mata_Pelajaran;
use Illuminate\Http\Request;

class Mata_PelajaranController extends Controller
{
    public function index()
    {
        return view('mata_pelajaran.index', ['mata_pelajaran'=>Mata_Pelajaran::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mata_pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_pelajaran' => 'required|max:12',
            'nama_pelajaran' => 'required|max:20',
            'tingkat' => 'required|max:10',
        ]);

        Mata_Pelajaran::create($validatedData);

        return redirect()->route('mata_pelajaran.index')->with('success', 'Data mata_pelajaran berhasil disimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mata_pelajaran = Mata_Pelajaran::findOrFail($id);
        return view('mata_pelajaran.show', ['mata_pelajaran' => $mata_pelajaran]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mata_pelajaran = Mata_Pelajaran::findOrFail($id);
        return view('mata_pelajaran.edit', ['mata_pelajaran' => $mata_pelajaran]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'kode_pelajaran' => 'required|max:12',
            'nama_pelajaran' => 'required|max:20',
            'tingkat' => 'required|max:10',
        ]);

        $mata_pelajaran = Mata_Pelajaran::findOrFail($id);
        $mata_pelajaran->update($validatedData);

        return redirect()->route('mata_pelajaran.index')->with('success', 'Data mata_pelajaran berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mata_pelajaran = Mata_Pelajaran::findOrFail($id);
        $mata_pelajaran->delete();

        return redirect()->route('mata_pelajaran.index')->with('success', 'Data mata_pelajaran berhasil dihapus');
    }
}

