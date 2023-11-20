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
        Schema::create('mtr_motor_best', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_motor');
            $table->unsignedBigInteger('id_best_motor')->nullable()->default(1);
            $table->foreign('id_motor')
                ->references('id')
                ->on('motor');
            $table->foreign('id_best_motor')
                ->references('id')
                ->on('best_motor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mtr_motor_best');
    }
};
