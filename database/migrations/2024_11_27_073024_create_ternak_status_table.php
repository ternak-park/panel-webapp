<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTernakStatusTable extends Migration
{
    public function up()
    {
        Schema::create('ternak_status', function (Blueprint $table) {
            $table->id();
            $table->uuid('ternak_uuid');
            
            $table->enum('kondisi', [
                'sehat', 
                'sakit', 
                'karantina', 
                'pemulihan'
            ])->default('sehat');
            
            $table->enum('status_kepemilikan', [
                'aktif', 
                'dijual', 
                'mati', 
                'hilang'
            ])->default('aktif');
            
            $table->string('kandang')->nullable();
            $table->string('kavling')->nullable();
            $table->text('catatan')->nullable();
            
            $table->foreign('ternak_uuid')
                  ->references('uuid')
                  ->on('ternak_park')
                  ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_status');
    }
}