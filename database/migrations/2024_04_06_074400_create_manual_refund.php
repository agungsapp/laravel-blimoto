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
        Schema::create('manual_transfer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penjualan');
            $table->unsignedBigInteger('id_pengajuan');
            $table->string("nama_rekening");
            $table->integer("kode");
            $table->string("norek");
            $table->timestamps();

            $table->foreign('id_penjualan')->references('id')->on('penjualan');
            $table->foreign('id_pengajuan')->references('id')->on('pengajuan_refund');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manual_transfer');
    }
};
