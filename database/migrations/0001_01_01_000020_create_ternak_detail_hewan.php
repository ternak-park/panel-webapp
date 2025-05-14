<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ternak_detail_hewan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ternak_tag');
            $table->string('tag_induk_betina')->nullable();
            $table->string('tag_induk_jantan')->nullable();
            $table->unsignedBigInteger('ternak_kandang');
            $table->string('tag_anak')->nullable();
            $table->unsignedBigInteger('nama_pemilik');
            $table->date('tanggal_masuk')->nullable();
            $table->string('ternak_sex');
            $table->unsignedBigInteger('ternak_jenis');
            $table->unsignedBigInteger('ternak_kesehatan');
            $table->unsignedBigInteger('ternak_program');
            $table->unsignedBigInteger('ternak_status');
            $table->string('ternak_usia');
            $table->integer('lama_hari_dipeternakan');
            $table->date('tgl_terjual_mati')->nullable();
            $table->unsignedBigInteger('ternak_fisik');
            $table->decimal('bb_masuk_lahir', 8, 2);
            $table->decimal('bb_terbaru', 8, 2);
            $table->date('tgl_timbang_terbaru');


            $table->foreign('ternak_tag')
                  ->references('id')
                  ->on('ternak_hewan')
                  ->onDelete('cascade');

            $table->foreign('ternak_kandang')
                  ->references('id')
                  ->on('ternak_kandang')
                  ->onDelete('cascade');

            $table->foreign('nama_pemilik')
                  ->references('id')
                  ->on('pemilik')
                  ->onDelete('cascade');

            // $table->foreign('ternak_sex')
            //       ->references('sex')
            //       ->on('ternak_hewan')
            //       ->onDelete('cascade');

            $table->foreign('ternak_jenis')
                  ->references('id')
                  ->on('jenis')
                  ->onDelete('cascade');

            $table->foreign('ternak_kesehatan')
                  ->references('id')
                  ->on('kesehatan')
                  ->onDelete('cascade');

            $table->foreign('ternak_program')
                  ->references('id')
                  ->on('program')
                  ->onDelete('cascade');

            $table->foreign('ternak_status')
                  ->references('id')
                  ->on('status')
                  ->onDelete('cascade');

            $table->foreign('ternak_fisik')
                  ->references('id')
                  ->on('ternak_fisik')
                  ->onDelete('cascade');

            // $table->foreign('bb_masuk_lahir')
            //       ->references('berat_masuk')
            //       ->on('ternak_fisik')
            //       ->onDelete('cascade');

            // $table->foreign('bb_terbaru')
            //       ->references('berat_terakhir')
            //       ->on('ternak_fisik')
            //       ->onDelete('cascade');

            // $table->foreign('tgl_timbang_terbaru')
            //       ->references('tgl_timbang_terakhir')
            //       ->on('ternak_fisik')
            //       ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_detail_hewan');
    }
};
