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
        Schema::create('ternak_detail_kondisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ternak_kondisi_id');
            $table->date('tgl_kejadian_kondisi');
            $table->unsignedBigInteger('ternak_tag_id');
            $table->unsignedBigInteger('ternak_kandang_id');
            $table->unsignedBigInteger('ternak_jenis_id');
            $table->string('sex_hewan_kondisi');
            $table->unsignedBigInteger('ternak_kesehatan_id');
            $table->string('keterangan')->nullable();
            $table->string('penanganan')->nullable();
            $table->string('tag_baru')->nullable();

            $table->foreign('ternak_kondisi_id')
                ->references('id')
                ->on('ternak_kondisi')
                ->onDelete('cascade');

            $table->foreign('ternak_tag_id')
                ->references('id')
                ->on('ternak_hewan')
                ->onDelete('cascade');

            $table->foreign('ternak_kandang_id')
                ->references('id')
                ->on('ternak_kandang')
                ->onDelete('cascade');

            $table->foreign('ternak_jenis_id')
                ->references('id')
                ->on('jenis')
                ->onDelete('cascade');

            $table->foreign('ternak_kesehatan_id')
                  ->references('id')
                  ->on('kesehatan')
                  ->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ternak_detail_kondisi');
    }
};
