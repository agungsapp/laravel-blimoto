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
        Schema::create('review_motor', function (Blueprint $table) {
            $table->id();
            $table->string('caption');
            $table->integer('bintang');
            $table->unsignedBigInteger('id_motor');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_motor')
                ->references('id')
                ->on('motor');
            $table->foreign('id_user')
                ->references('id')
                ->on('users');
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
        Schema::dropIfExists('review_motor');
    }
};
