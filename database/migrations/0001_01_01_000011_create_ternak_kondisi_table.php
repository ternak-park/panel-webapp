<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ternak_kondisi', function (Blueprint $table) {
            $table->id();
            $table->string('ternak_tag');
            $table->unsignedBigInteger('ternak_kesehatan');
            $table->unsignedBigInteger('ternak_status');

            $table->foreign('ternak_kesehatan')
                  ->references('id')
                  ->on('kesehatan')
                  ->onDelete('cascade');

            $table->foreign('ternak_status')
                  ->references('id')
                  ->on('status')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_kondisi');
    }
};
