<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ternak_fisik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ternak_tag');
            $table->decimal('berat_masuk', 8, 2)->nullable();
            $table->decimal('berat_terakhir', 8, 2)->nullable();
            $table->decimal('kenaikan_berat', 8, 2)->nullable();

            $table->foreign('ternak_tag')
                  ->references('id')
                  ->on('ternak_hewan')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_fisik');
    }
};
