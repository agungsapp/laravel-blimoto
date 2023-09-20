<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorDetailSeeder extends Seeder
{
  public function run()
  {
    // Define the number of records you want to create
    $numberOfRecords = 20; // You can change this to the desired number

    // Loop to insert multiple rows of data
    for ($i = 1; $i <= $numberOfRecords; $i++) {
      DB::table('detail_motor')->insert([
        'warna' => 'Color ' . $i,
        'gambar' => 'image' . $i . '.jpg',
        'id_motor' => $i, // Replace with the actual motor IDs
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
  }
}
