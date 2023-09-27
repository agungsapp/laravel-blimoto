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
        Schema::create('cicilan_motor', function (Blueprint $table) {
            $table->id();
            $table->integer('dp')->index();
            $table->integer('tenor')->index();
            $table->integer('cicilan');
            $table->unsignedBigInteger('id_leasing');
            $table->unsignedBigInteger('id_lokasi');
            $table->unsignedBigInteger('id_motor');

            $table->foreign('id_leasing')->references('id')->on('leasing_motor');
            $table->foreign('id_lokasi')->references('id')->on('kota');
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
        Schema::dropIfExists('cicilan_motor');
    }
};
