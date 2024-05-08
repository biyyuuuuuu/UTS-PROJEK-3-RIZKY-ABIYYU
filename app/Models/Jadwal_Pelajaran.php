<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Mata_Pelajaran;
use App\Models\Guru;

class Jadwal_Pelajaran extends Model
{
    protected $guarded = [];

    protected $table = 'jadwal_pelajaran';

    protected $primaryKey = 'id_jadwal_pelajaran';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id_kelas');
    }

    public function mata_pelajaran()
    {
        return $this->belongsTo(Mata_Pelajaran::class, 'mata_pelajaran_id', 'id_mata_pelajaran');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id_guru');
    }
}
