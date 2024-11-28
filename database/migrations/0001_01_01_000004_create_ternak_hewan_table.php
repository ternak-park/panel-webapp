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
            $table->enum('jenis_hewan', ['domba', 'kambing']);
            $table->enum('sex', ['jantan', 'betina']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ternak_hewan');
    }
};
