<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brosur_motor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file');
            $table->string('is_popular');
            $table->unsignedBigInteger('id_motor');
            $table->foreign('id_motor')->references('id')->on('motor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brosur_motor');
    }
};
