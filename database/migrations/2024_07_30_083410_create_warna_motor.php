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
        Schema::create('warna_motor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_motor');
            $table->unsignedBigInteger('id_color');

            $table->timestamps();

            $table->foreign('id_motor')->references('id')->on('motor')->onDelete('cascade');
            $table->foreign('id_color')->references('id')->on('color')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warna_motor');
    }
};
