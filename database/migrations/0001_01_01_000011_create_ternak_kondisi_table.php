<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ternak_kondisi', function (Blueprint $table) {
            $table->id();
            $table->enum('status_kepemilikan', [
                'aktif',
                'dijual',
                'mati',
                'hilang'
            ])->default('aktif');

            $table->unsignedBigInteger('ternak_tag');
            $table->unsignedBigInteger('ternak_status');

            $table->foreign('ternak_tag')
                  ->references('id')
                  ->on('ternak_hewan')
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
