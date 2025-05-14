<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ternak_kondisi', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_kejadian_kondisi');
            $table->unsignedBigInteger('ternak_tag_id');
            $table->unsignedBigInteger('ternak_kandang_id');
            $table->unsignedBigInteger('ternak_jenis_id');
            $table->string('sex_hewan_kondisi');
            $table->unsignedBigInteger('ternak_kesehatan_id');

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

    public function down()
    {
        Schema::dropIfExists('ternak_kondisi');
    }
};
