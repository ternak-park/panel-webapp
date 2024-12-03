<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ternak_reproduksi', function (Blueprint $table) {
            $table->id();
            $table->string('ternak_tag'); 
            $table->date('tanggal_birahi')->nullable();
            $table->date('tanggal_kawin')->nullable();
            $table->date('tanggal_ib')->nullable();
            $table->string('nomor_semen')->nullable();
            $table->string('jenis_semen')->nullable();

            $table->foreign('ternak_tag')
                  ->references('tag')
                  ->on('ternak_hewan')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_reproduksi');
    }
};
