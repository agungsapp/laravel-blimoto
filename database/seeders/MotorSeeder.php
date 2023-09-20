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
      DB::table('motor')->insert([
        'nama' => 'Motor ' . $i,
        'berat' => rand(200, 500) . ' kg',
        'power' => rand(100, 300) . ' cc',
        'harga' => rand(10000000, 20000000),
        'deskripsi' => 'Description for Motor ' . $i,
        'fitur_utama' => 'Feature 1, Feature 2, Feature 3',
        'id_merk' => 1, // Replace with the actual merk IDs
        'id_type' => 1, // Replace with the actual type IDs
        'id_best_motor' => rand(1, 4), // Replace with the actual type IDs
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }
}
