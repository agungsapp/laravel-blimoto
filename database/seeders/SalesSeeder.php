<?php

namespace Database\Seeders;

use App\Models\Sales;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SalesSeeder extends Seeder
{
  public function run()
  {
    // Define the number of records you want to create
    $data = [
      [
        'nama' => 'Sales 1',
        'kode' => 12,
        'username' => 'sales',
        'password' => Hash::make('sales123'),
      ],
    ]; // You can change this to the desired number

    // Loop to insert multiple rows of data
    Sales::insert($data);
  }
}
