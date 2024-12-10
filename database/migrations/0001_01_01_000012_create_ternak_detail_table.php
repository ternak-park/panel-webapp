<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTernakDetailTable extends Migration
{
    public function up()
    {
        Schema::create('ternak_detail', function (Blueprint $table) {
            $table->id();
            $table->string('ternak_tag');
            $table->string('sex')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->unsignedBigInteger('ternak_status')->nullable();
            $table->unsignedBigInteger('ternak_tipe')->nullable();
            $table->unsignedBigInteger('ternak_program')->nullable();
            $table->unsignedBigInteger('ternak_kandang')->nullable();
            $table->unsignedBigInteger('pemilik')->nullable();

            $table->foreign('ternak_tag')
                  ->references('tag')
                  ->on('ternak_hewan')
                  ->onDelete('cascade');

            $table->foreign('ternak_status')
                  ->references('id')
                  ->on('status')
                  ->onDelete('cascade');

            $table->foreign('ternak_tipe')
                  ->references('id')
                  ->on('tipe')
                  ->onDelete(action: 'cascade');

            $table->foreign('ternak_program')
                  ->references('id')
                  ->on('program')
                  ->onDelete('cascade');

            $table->foreign('ternak_kandang')
                  ->references('id')
                  ->on('ternak_kandang')
                  ->onDelete('cascade');

            $table->foreign('pemilik')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_detail');
    }
}
