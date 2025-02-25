<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Membuat tabel kandang sebagai tabel master
        Schema::create('kandang', function (Blueprint $table) {
            $table->string('kode_kandang')->primary();
            $table->string('anak_kandang');
            $table->timestamps();

            $table->foreign('anak_kandang')
                  ->references('kode_petugas')
                  ->on('petugas')
                  ->onDelete('cascade');
        });

        // Membuat tabel detail_ternak_kandang untuk menyimpan detail hewan di kandang
        Schema::create('detail_ternak_kandang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kandang');
            $table->string('hewan_tag');
            $table->unsignedBigInteger('jenis_domba');
            $table->unsignedBigInteger('berat_domba');
            $table->unsignedBigInteger('kondisi_domba');
            $table->timestamps();

            $table->foreign('kode_kandang')
                  ->references('kode_kandang')
                  ->on('kandang')
                  ->onDelete('cascade');

            $table->foreign('jenis_domba')
                  ->references('id')
                  ->on('tipe')
                  ->onDelete('cascade');

            $table->foreign('berat_domba')
                  ->references('id')
                  ->on('ternak_fisik')
                  ->onDelete('cascade');

            $table->foreign('kondisi_domba')
                  ->references('id')
                  ->on('kesehatan')
                  ->onDelete('cascade');
                  
            $table->foreign('hewan_tag')
                  ->references('tag')
                  ->on('ternak_hewan')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_ternak_kandang');
        Schema::dropIfExists('kandang');
    }
};