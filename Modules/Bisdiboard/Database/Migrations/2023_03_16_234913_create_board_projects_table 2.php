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
        Schema::create('board_projects', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('jenis');
            $table->string('kategori');
            $table->text('nama');
            $table->text('deskripsi')->nullable();
            $table->text('status');
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
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
        Schema::dropIfExists('board_projects');
    }
};
