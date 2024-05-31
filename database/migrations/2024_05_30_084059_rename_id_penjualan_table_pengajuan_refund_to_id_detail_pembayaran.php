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
        Schema::table('pengajuan_refund', function (Blueprint $table) {
            // Hapus foreign key yang lama
            // $table->dropForeign(['id_penjualan']);

            // Ganti nama kolom
            $table->renameColumn('id_penjualan', 'id_detail_pembayaran');

            // Tambahkan foreign key yang baru
            $table->foreign('id_detail_pembayaran')->references('id')->on('detail_pembayaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengajuan_refund', function (Blueprint $table) {
            $table->dropForeign(['id_detail_pembayaran']);
            $table->renameColumn('id_detail_pembayaran', 'id_penjualan');
            // $table->foreign('id_penjualan')->references('id')->on('penjualan')->onDelete('cascade');
        });
    }
};
