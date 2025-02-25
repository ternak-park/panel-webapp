<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Buat tabel petugas
        Schema::create('petugas', function (Blueprint $table) {
            $table->string('kode_petugas')->primary();
            $table->string('nama_petugas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('petugas');
    }
};