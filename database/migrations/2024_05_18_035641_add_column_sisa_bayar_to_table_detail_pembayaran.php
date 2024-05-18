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
        Schema::table('detail_pembayaran', function (Blueprint $table) {
            $table->integer('sisa_bayar')->after('jumlah_bayar')->default(0);
            $table->integer('total_lunas')->after('sisa_bayar')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_pembayaran', function (Blueprint $table) {
            $table->dropColumn('sisa_bayar');
            $table->dropColumn('total_lunas');
        });
    }
};
