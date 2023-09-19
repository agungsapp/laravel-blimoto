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
        Schema::create('detail_motor', function (Blueprint $table) {
            $table->id();
            $table->string('warna');
            $table->string('gambar');
            $table->unsignedBigInteger('id_motor');
            $table->foreign('id_motor')
                ->references('id')
                ->on('motor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_motor');
    }
};
