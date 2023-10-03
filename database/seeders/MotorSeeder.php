<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorSeeder extends Seeder
{
  public function run()
  {
    // Define the number of records you want to create
    $numberOfRecords = 30; // You can change this to the desired number

    // Loop to insert multiple rows of data
    for ($i = 1; $i <= $numberOfRecords; $i++) {
    $harga = rand(10000000, 20000000);
      DB::table('motor')->insert([
        'nama' => 'Motor ' . $i,
        'berat' => rand(200, 500) . ' kg',
        'stock' => 1,
        'power' => rand(100, 300) . ' cc',
        'harga' => $harga,
        'deskripsi' => 'Description for Motor ' . $i,
        'fitur_utama' => 'Feature 1, Feature 2, Feature 3',
        'id_merk' => rand(1, 3),
        'id_type' => rand(1, 4),
        'id_best_motor' => rand(1, 4),
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }
}
