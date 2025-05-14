<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ternak_detail_kandang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kode_kandang_id');
            $table->integer('total_ternak');
            $table->decimal('total_bb', 8, 2);
            $table->unsignedBigInteger('nama_petugas_id');
            $table->unsignedBigInteger('nama_pemilik_id');

            $table->foreign('kode_kandang_id')
                  ->references('id')
                  ->on('ternak_kandang')
                  ->onDelete('cascade');

            $table->foreign('nama_petugas_id')
                  ->references('id')
                  ->on('petugas')
                  ->onDelete('cascade');

              $table->foreign('nama_pemilik_id')
                  ->references('id')
                  ->on('pemilik')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ternak_detail_kandang');
    }
};
