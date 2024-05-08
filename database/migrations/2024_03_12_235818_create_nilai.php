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
        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->unsignedInteger('siswa_id');
            $table->foreign('siswa_id')->references('id_siswa')->on('siswa');
            $table->unsignedInteger('mata_pelajaran_id');
            $table->foreign('mata_pelajaran_id')->references('id_mata_pelajaran')->on('mata_pelajaran');
            $table->float('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
