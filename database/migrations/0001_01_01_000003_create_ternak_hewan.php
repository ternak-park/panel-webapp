<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ternak_hewan', function (Blueprint $table) {
            $table->id();
            $table->string('tag_hewan')->unique();
            $table->enum('sex_hewan', ['Jantan', 'Betina']);
            $table->unsignedBigInteger('ternak_jenis_id');
            $table->string('gambar_hewan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ternak_jenis_id')
                  ->references('id')
                  ->on('jenis')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_hewan');
    }
};
