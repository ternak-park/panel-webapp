<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTernakEkonomiTable extends Migration
{
    public function up()
    {
        Schema::create('ternak_ekonomi', function (Blueprint $table) {
            $table->id();
            $table->uuid('ternak_uuid');
            
            $table->decimal('harga_beli', 12, 2)->nullable();
            $table->decimal('harga_jual', 12, 2)->nullable();
            $table->decimal('hpp_pembelian', 12, 2)->nullable();
            $table->decimal('biaya_transportasi', 12, 2)->nullable();
            
            $table->foreign('ternak_uuid')
                  ->references('uuid')
                  ->on('ternak_park')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_ekonomi');
    }
}