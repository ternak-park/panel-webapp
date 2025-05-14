<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ternak_detail_fisik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ternak_fisik_id');
            $table->unsignedBigInteger('ternak_tag_id');
            $table->unsignedBigInteger('ternak_kandang_id');
            $table->date('tgl_masuk_lahir')->nullable();
            $table->decimal('berat_masuk', 8, 2);
            $table->date('tgl_timbang_terakhir');
            $table->decimal('berat_terakhir', 8, 2);
            $table->decimal('kenaikan_berat', 8, 2);

            $table->foreign('ternak_fisik_id')
                ->references('id')
                ->on('ternak_fisik')
                ->onDelete('cascade');

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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ternak_detail_fisik');
    }
};
