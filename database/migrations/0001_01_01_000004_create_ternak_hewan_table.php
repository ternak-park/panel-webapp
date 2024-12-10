<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ternak_hewan', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->unique();
            $table->enum('jenis', ['Domba', 'Kambing']);
            $table->enum('sex', ['Jantan', 'Betina']);
            $table->unsignedBigInteger('ternak_tipe')->nullable();
            $table->string('gambar_hewan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ternak_tipe')
                  ->references('id')
                  ->on('tipe')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_hewan');
    }
};
