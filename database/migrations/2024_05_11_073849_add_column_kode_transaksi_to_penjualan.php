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
        Schema::table('penjualan', function (Blueprint $table) {
            $table->string('kode_transaksi')->after('nama_konsumen')->nullable();
            $table->boolean('is_edit')->after('is_cetak')->default(false);
            $table->index('kode_transaksi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->dropIndex(['kode_transaksi']);
            $table->dropColumn('kode_transaksi');
            $table->dropColumn('is_edit');
        });
    }
};
