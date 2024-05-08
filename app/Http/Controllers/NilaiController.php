<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mata_Pelajaran;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['siswa', 'mata_pelajaran'])->paginate(10);
        return view('nilai.index', compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $mata_pelajaran = Mata_Pelajaran::all();
        return view('nilai.create', compact('siswa', 'mata_pelajaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id_siswa',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id_mata_pelajaran',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function edit(Nilai $nilai)
    {
        $siswa = Siswa::all();
        $mata_pelajaran = Mata_Pelajaran::all();
        return view('nilai.edit', compact('nilai', 'siswa', 'mata_pelajaran'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id_siswa',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id_mata_pelajaran',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();
        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil dihapus.');
    }
}
