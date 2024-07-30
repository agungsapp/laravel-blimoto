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
            $table->dropColumn('warna_motor');
            $table->unsignedBigInteger('id_color')->after('diskon_dp')->default(1);

            $table->foreign('id_color')->references('id')->on('color');
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
            $table->dropForeign(['id_color']);
            $table->dropColumn('id_color');
            $table->string('warna_motor')->after('diskon_dp');
        });
    }
};
