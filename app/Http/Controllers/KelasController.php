<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.index', ['kelas' => Kelas::latest()->paginate(10)]);
    }

    public function create()
    {
        $guru = Guru::all();
        return view('kelas.create', compact('guru'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_kelas' => 'required|max:12',
            'nama_kelas' => 'required|max:20',
            'tingkat' => 'required|max:100',
            'wali_kelas_id' => 'required|exists:guru,id_guru',
        ]);

        Kelas::create($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil disimpan');
    }

    public function show($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.show', ['kelas' => $kelas]);
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = Guru::all();
        return view('kelas.edit', ['kelas' => $kelas, 'guru' => $guru]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_kelas' => 'required|max:12',
            'nama_kelas' => 'required|max:20',
            'tingkat' => 'required|max:100',
            'wali_kelas_id' => 'required|exists:guru,id_guru',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($validatedData);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diupdate');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus');
    }
}

