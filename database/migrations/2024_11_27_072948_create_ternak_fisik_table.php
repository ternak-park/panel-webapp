<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTernakFisikTable extends Migration
{
    public function up()
    {
        Schema::create('ternak_fisik', function (Blueprint $table) {
            $table->id();
            $table->uuid('ternak_uuid');
            $table->decimal('berat_masuk', 8, 2)->nullable();
            $table->decimal('berat_terakhir', 8, 2)->nullable();
            $table->decimal('kenaikan_berat', 8, 2)->nullable();
            $table->decimal('adg', 8, 2)->nullable(); // Average Daily Gain
            
            $table->foreign('ternak_uuid')
                  ->references('uuid')
                  ->on('ternak_park')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_fisik');
    }
}