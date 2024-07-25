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
        Schema::table('detail_motor', function (Blueprint $table) {

            $table->dropColumn('warna');
            $table->unsignedBigInteger('id_color')->after('id')->default(1);
            $table->foreign('id_color')->references('id')->on('color')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_motor', function (Blueprint $table) {
            $table->dropForeign(['id_color']);
            $table->dropColumn('id_color');
            $table->string('warna');
        });
    }
};
