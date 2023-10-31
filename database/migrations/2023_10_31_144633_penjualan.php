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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_konsumen');
            $table->string('nama_sales');
            $table->integer('jumlah');
            $table->longText('catatan');
            $table->date('tanggal_dibuat')->default(now());
            $table->date('tanggal_hasil')->nullable();
            $table->unsignedBigInteger('id_motor');
            $table->unsignedBigInteger('id_lising');
            $table->unsignedBigInteger('id_kota');
            $table->unsignedBigInteger('id_hasil');

            $table->foreign('id_motor')
                ->references('id')
                ->on('motor');
            $table->foreign('id_lising')
                ->references('id')
                ->on('leasing_motor');
            $table->foreign('id_kota')
                ->references('id')
                ->on('kota');
            $table->foreign('id_hasil')
                ->references('id')
                ->on('hasil');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
};
