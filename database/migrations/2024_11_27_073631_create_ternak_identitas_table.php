<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTernakIdentitasTable extends Migration
{
    public function up()
    {
        Schema::create('ternak_identitas', function (Blueprint $table) {
            $table->id();
            $table->uuid('ternak_uuid');
            $table->string('tagging')->unique();
            $table->enum('sex', ['jantan', 'betina']);
            $table->string('tipe')->nullable();
            $table->string('jenis')->nullable();
            $table->date('tanggal_masuk');
            $table->integer('umur_masuk')->nullable();
            
            $table->unsignedBigInteger('pemilik_id')->nullable();
            $table->string('asal_ternak')->nullable();
            
            $table->foreign('ternak_uuid')
                  ->references('uuid')
                  ->on('ternak_park')
                  ->onDelete('cascade');
            
            $table->foreign('pemilik_id')
                  ->references('id')
                  ->on('pemilik');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_identitas');
    }
}