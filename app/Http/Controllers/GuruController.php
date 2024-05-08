<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index', ['guru' => Guru::latest()->paginate(10)]);
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|max:12',
            'nama' => 'required|max:20',
            'alamat' => 'required|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'bidang_mengajar' => 'required|max:10',
        ]);

        Guru::create($validatedData);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil disimpan');
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.show', ['guru' => $guru]);
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', ['guru' => $guru]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nip' => 'required|max:12',
            'nama' => 'required|max:20',
            'alamat' => 'required|max:100',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'bidang_mengajar' => 'required|max:10',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update($validatedData);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diupdate');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus');
    }
}

