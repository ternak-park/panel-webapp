<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ternak_kandang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kandang');
            $table->unsignedBigInteger('pemilik')->nullable();

            $table->foreign('pemilik')
                ->references('id')
                ->on('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_kandang');
    }
};
