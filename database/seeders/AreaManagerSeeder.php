<?php

namespace Database\Seeders;

use App\Models\AreaManager;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AreaManagerSeeder extends Seeder
{
  public function run()
  {
    // Define the number of records you want to create
    $data = [
      [
        'nama' => 'Area Manager',
        'username' => 'am123',
        'password' => Hash::make('am123'),
      ],
    ]; // You can change this to the desired number

    // Loop to insert multiple rows of data
    AreaManager::insert($data);
  }
}
