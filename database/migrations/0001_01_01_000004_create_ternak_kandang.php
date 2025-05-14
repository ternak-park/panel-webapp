<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Membuat tabel kandang sebagai tabel master
        Schema::create('ternak_kandang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kandang')->unique();
            $table->integer('total_ternak_kandang');
            $table->unsignedBigInteger('nama_pemilik_id');
            $table->timestamps();

              $table->foreign('nama_pemilik_id')
                  ->references('id')
                  ->on('pemilik')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_kandang');
    }
};
