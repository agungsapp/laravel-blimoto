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
        Schema::create('hook', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable()->default('nama hook');
            $table->string('gambar')->default('path_gambar');
            $table->string('link')->default('url_href');
            $table->string('warna')->default('#DD0202');
            $table->boolean('status')->default(1);
            $table->integer('order');
            $table->string('warna_teks')->default('#DD0202');
            $table->string('caption')->default('caption_hook');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hooks');
    }
};
