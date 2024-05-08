<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $guarded = [];

    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';


    public function wali_kelas()
    {
        return $this->belongsTo(Guru::class, 'wali_kelas_id', 'id_guru');
    }

}
