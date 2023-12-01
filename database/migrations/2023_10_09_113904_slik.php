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
        Schema::create('slik', function (Blueprint $table) {
            $table->id();
            $table->string('no');
            $table->string('ktp');
            $table->string('kk');
            $table->string('status');
            $table->string('email')->nullable();
            $table->enum('status_pembayaran', ['pending', 'success', 'free'])->default('pending');
            $table->unsignedBigInteger('id_type_slik');
            $table->foreign('id_type_slik')->references('id')->on('type_slik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slik');
    }
};
