<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_pelajaran', function (Blueprint $table) {
            $table->increments('id_jadwal_pelajaran');
            $table->string('hari',10);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->unsignedInteger('kelas_id');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas');
            $table->unsignedInteger('mata_pelajaran_id');
            $table->foreign('mata_pelajaran_id')->references('id_mata_pelajaran')->on('mata_pelajaran');
            $table->unsignedInteger('guru_id');
            $table->foreign('guru_id')->references('id_guru')->on('guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelajaran');
    }
};
