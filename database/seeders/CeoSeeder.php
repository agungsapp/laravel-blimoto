<?php

namespace Database\Seeders;

use App\Models\Ceo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CeoSeeder extends Seeder
{
  public function run()
  {
    // Define the number of records you want to create
    $data = [
      [
        'nama' => 'Kurniawan Tri Anggoro',
        'username' => 'awan',
        'password' => Hash::make('awan123'),
      ],
    ]; // You can change this to the desired number

    // Loop to insert multiple rows of data
    Ceo::insert($data);
  }
}
