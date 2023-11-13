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
        Schema::create('diskon_motor', function (Blueprint $table) {
            $table->id();
            $table->integer('diskon');
            $table->integer('diskon_promo');
            $table->integer('tenor');
            $table->integer('potongan_tenor');
            $table->unsignedBigInteger('id_leasing');
            $table->unsignedBigInteger('id_motor');
            $table->unsignedBigInteger('id_lokasi');

            $table->foreign('id_leasing')->references('id')->on('leasing_motor');
            $table->foreign('id_motor')->references('id')->on('motor');
            $table->foreign('id_lokasi')->references('id')->on('kota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diskon_motor');
    }
};
