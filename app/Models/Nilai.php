<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $primaryKey = 'id_nilai';

    protected $fillable = [
        'siswa_id',
        'mata_pelajaran_id',
        'nilai',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function mata_pelajaran()
    {
        return $this->belongsTo(Mata_Pelajaran::class, 'mata_pelajaran_id');
    }
}
