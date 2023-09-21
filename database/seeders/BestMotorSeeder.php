<?php

namespace Database\Seeders;

use App\Models\BestMotor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BestMotorSeeder extends Seeder
{
  public function run()
  {
    // Define the number of records you want to create
    $data = [
      [
        'nama' => 'No Best'
      ],
      [
        'nama' => 'Diskon Terbaik'
      ],
      [
        'nama' => 'DP Termurah'
      ],
      [
        'nama' => 'Harga Terbawah'
      ],
      [
        'nama' => 'Angsuran Ringan'
      ],
    ]; // You can change this to the desired number

    // Loop to insert multiple rows of data
    BestMotor::insert($data);
  }
}
