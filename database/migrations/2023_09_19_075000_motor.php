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
        Schema::create('motor', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga');
            $table->boolean('stock')->default(1);
            $table->longText('deskripsi');
            $table->longText('fitur_utama');
            $table->longText('bonus');
            $table->unsignedBigInteger('id_merk');
            $table->unsignedBigInteger('id_type');
            $table->foreign('id_merk')
                ->references('id')
                ->on('merk');
            $table->foreign('id_type')
                ->references('id')
                ->on('type');
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
        Schema::dropIfExists('motor');
    }
};
