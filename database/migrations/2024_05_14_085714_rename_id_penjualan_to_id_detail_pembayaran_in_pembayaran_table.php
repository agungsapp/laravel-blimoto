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
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign(['id_penjualan']);
            // Rename the column
            $table->renameColumn('id_penjualan', 'id_detail_pembayaran');
            // Add foreign key constraint to the new column name
            $table->foreign('id_detail_pembayaran')->references('id')->on('detail_pembayaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            // Drop foreign key constraint first
            $table->dropForeign(['id_detail_pembayaran']);
            // Rename the column back to its original name
            $table->renameColumn('id_detail_pembayaran', 'id_penjualan');
            // Add foreign key constraint to the original column name
            $table->foreign('id_penjualan')->references('id')->on('penjualan')->onDelete('cascade');
        });
    }
};
