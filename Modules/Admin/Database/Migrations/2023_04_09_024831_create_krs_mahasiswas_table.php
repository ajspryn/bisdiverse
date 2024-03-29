<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krs_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->text('mahasiswa_npm');
            $table->string('kelas');
            $table->string('kelas_ujian');
            $table->text('matkul_kode');
            $table->text('dosen_kds')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('krs_mahasiswas');
    }
};
