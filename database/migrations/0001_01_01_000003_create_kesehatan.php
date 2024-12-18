<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('kesehatan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kesehatan');
            $table->string('nama_kesehatan');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kesehatan');
    }
};
