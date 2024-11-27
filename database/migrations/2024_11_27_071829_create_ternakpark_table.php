<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTernakParkTable extends Migration
{
    public function up()
    {
        Schema::create('ternak_park', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique(); // Tambahkan UUID untuk referensi
            $table->enum('jenis', ['domba', 'kambing'])->default('domba');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_park');
    }
}