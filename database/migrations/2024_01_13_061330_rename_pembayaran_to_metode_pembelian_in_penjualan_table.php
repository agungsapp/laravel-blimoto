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
            $table->renameColumn('pembayaran', 'metode_pembelian');
            $table->string('warna_motor')->nullable();
            $table->string('bpkb')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('metode_pembayaran')->nullable();
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
            $table->renameColumn('metode_pembelian', 'pembayaran');
            $table->dropColumn(['warna_motor', 'bpkb', 'no_hp', 'metode_pembayaran']);
        });
    }
};
