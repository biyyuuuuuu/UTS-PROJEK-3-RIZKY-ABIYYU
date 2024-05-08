<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    // Menampilkan semua data absensi
    public function index()
    {
        $absensi = Absensi::all();
        return view('absensi.index', compact('absensi'));
    }

    // Menampilkan form untuk membuat absensi baru
    public function create()
    {
        // Mengambil data siswa untuk opsi dropdown
        $siswa = \App\Models\Siswa::all();
        return view('absensi.create', compact('siswa'));
    }

    // Menyimpan data absensi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string'
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil disimpan.');
    }

    // Menampilkan detail data absensi
    public function show($id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('absensi.show', compact('absensi'));
    }

    // Menampilkan form untuk mengedit data absensi
    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        $siswa = \App\Models\Siswa::all();
        return view('absensi.edit', compact('absensi', 'siswa'));
    }

    // Mengupdate data absensi yang telah diedit
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string'
        ]);

        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diperbarui.');
    }

    // Menghapus data absensi
    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil dihapus.');
    }
}
