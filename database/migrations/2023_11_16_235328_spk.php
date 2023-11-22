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
        Schema::create('spk', function (Blueprint $table) {
            $table->string('nomor_spk');
            $table->date('tanggal_pesanan');
            $table->string('no_ktp');
            $table->string('nama_pemohon');
            $table->string('bpkb_stnk');
            $table->string('nomor_hp');
            $table->string('unit');
            $table->string('type');
            $table->string('warna');
            $table->string('harga');
            $table->string('keterangan_program');
            $table->string('nama_diskon');
            $table->string('kelengkapan');
            $table->string('dp');
            $table->string('total_diskon');
            $table->string('sisa_bayar');
            $table->string('kredit_via');
            $table->string('jangka_waktu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spk');
    }
};
