<?php

namespace App\Http\Controllers;

use App\Models\Jadwal_Pelajaran;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mata_Pelajaran;
use App\Models\Guru;

class JadwalPelajaranController extends Controller
{
    public function index()
    {
        $jadwal_pelajaran = Jadwal_Pelajaran::with(['kelas', 'mata_pelajaran', 'guru'])->paginate(10);
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        // $guru = Guru::all();
        // $kelas = Kelas::all();

        // return view('jadwal_pelajaran.index', compact('jadwal_pelajaran', 'hari', 'guru', 'kelas'));
        return view('jadwal_pelajaran.index', compact('jadwal_pelajaran', 'hari'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $mata_pelajaran = Mata_Pelajaran::all();
        $guru = Guru::all();
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        return view('jadwal_pelajaran.create', compact('kelas', 'mata_pelajaran', 'guru', 'hari'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'kelas_id' => 'required|exists:kelas,id_kelas',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id_mata_pelajaran',
            'guru_id' => 'required|exists:guru,id_guru',
        ]);

        Jadwal_Pelajaran::create($validatedData);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal pelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = Jadwal_Pelajaran::findOrFail($id);
        $kelas = Kelas::all();
        $mata_pelajaran = Mata_Pelajaran::all();
        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $guru = Guru::all();
        return view('jadwal_pelajaran.edit', compact('jadwal', 'kelas', 'mata_pelajaran', 'guru', 'hari'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required|string|max:10',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'kelas_id' => 'required|exists:kelas,id_kelas',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id_mata_pelajaran',
            'guru_id' => 'required|exists:guru,id_guru',
        ]);

        $jadwal_pelajaran = Jadwal_Pelajaran::findOrFail($id);

        $jadwal_pelajaran->update([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal pelajaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal_pelajaran = Jadwal_Pelajaran::findOrFail($id);
        $jadwal_pelajaran->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal pelajaran berhasil dihapus.');
    }
}
