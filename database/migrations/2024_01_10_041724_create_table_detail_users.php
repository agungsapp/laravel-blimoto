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
            $table->integer('id_user');
            $table->string('email');
            $table->enum('jk', ['l', 'p']);
            $table->integer('id_kota');
            $table->text('alamat');
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
        //
        Schema::dropIfExists('detail_users');
    }
};
