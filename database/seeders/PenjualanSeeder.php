<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
  public function run()
  {
    // Define the number of records you want to create
    $data = [
      [
        'nama_konsumen' => 'Konsumen 1',
        'nama_sales' => 'Sales 1',
        'jumlah' => 12,
        'catatan' => 'Ini catatan penjualan motor',
        'tanggal_dibuat' => now(),
        'id_lising' => 1,
        'id_motor' => 1,
        'id_kota' => 1,
        'id_hasil' => 1,
      ],
    ]; // You can change this to the desired number

    // Loop to insert multiple rows of data
    Penjualan::insert($data);
  }
}
