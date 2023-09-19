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
        Schema::create('motor_kota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kota');
            $table->unsignedBigInteger('id_motor');
            $table->foreign('id_kota')->references('id')->on('kota');
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
        Schema::dropIfExists('motor_kota');
    }
};
