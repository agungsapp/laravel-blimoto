<?php

namespace Database\Seeders;

use App\Models\Hasil;
use Illuminate\Database\Seeder;

class HasilSeeder extends Seeder
{
  public function run()
  {
    // Define the number of records you want to create
    $data = [
      [
        'hasil' => 'proses'
      ],
      [
        'hasil' => 'acc'
      ],
      [
        'hasil' => 'riject'
      ],
      [
        'hasil' => 'DO'
      ],
    ]; // You can change this to the desired number

    // Loop to insert multiple rows of data
    Hasil::insert($data);
  }
}
