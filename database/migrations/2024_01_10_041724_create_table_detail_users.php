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
        //
        Schema::create('detail_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_kota');
            $table->string('email');
            $table->enum('jk', ['l', 'p']);
            $table->text('alamat');
            $table->timestamps();

            $table->foreign('id_user')
                ->references('id')
                ->on('users');

            $table->foreign('id_kota')
                ->references('id')
                ->on('kota');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('detail_users');
    }
};
