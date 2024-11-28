<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ternak_ekonomi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ternak_tag');

            $table->decimal('harga_beli', 12, 2)->nullable();
            $table->decimal('harga_jual', 12, 2)->nullable();
            $table->decimal('hpp_pembelian', 12, 2)->nullable();
            $table->decimal('biaya_transportasi', 12, 2)->nullable();

            $table->foreign('ternak_tag')
                  ->references('id')
                  ->on('ternak_hewan')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_ekonomi');
    }
};
