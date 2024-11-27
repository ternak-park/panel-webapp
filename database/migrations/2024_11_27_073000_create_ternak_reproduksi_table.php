<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTernakReproduksiTable extends Migration
{
    public function up()
    {
        Schema::create('ternak_reproduksi', function (Blueprint $table) {
            $table->id();
            $table->uuid('ternak_uuid');
            $table->uuid('induk_betina_uuid')->nullable();
            $table->uuid('induk_jantan_uuid')->nullable();
            
            $table->date('tanggal_birahi')->nullable();
            $table->date('tanggal_kawin')->nullable();
            $table->date('tanggal_ib')->nullable();
            $table->string('nomor_semen')->nullable();
            $table->string('jenis_semen')->nullable();
            
            $table->foreign('ternak_uuid')
                  ->references('uuid')
                  ->on('ternak_park')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_reproduksi');
    }
}