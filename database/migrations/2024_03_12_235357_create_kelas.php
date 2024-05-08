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
        Schema::create('kelas', function (Blueprint $table) {
            $table->increments('id_kelas');
            $table->string('kode_kelas', 10)->unique();
            $table->string('nama_kelas', 10);
            $table->string('tingkat', 10);
            $table->unsignedInteger('wali_kelas_id');
            $table->foreign('wali_kelas_id')->references('id_guru')->on('guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
