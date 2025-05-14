<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ternak_fisik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ternak_tag_id');
            $table->unsignedBigInteger('ternak_kandang_id');
            $table->date('tgl_masuk_lahir_fisik');
            $table->decimal('berat_masuk_fisik', 8, 2);
            $table->date('tgl_timbang_terakhir_fisik');
            $table->decimal('berat_terakhir_fisik', 8, 2);
            $table->decimal('kenaikan_berat_fisik', 8, 2);

            $table->foreign('ternak_tag_id')
                ->references('id')
                ->on('ternak_hewan')
                ->onDelete('cascade');

            $table->foreign('ternak_kandang_id')
                ->references('id')
                ->on('ternak_kandang')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_fisik');
    }
};
