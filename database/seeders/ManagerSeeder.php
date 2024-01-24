<?php

namespace Database\Seeders;

use App\Models\Ceo;
use App\Models\Manager;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
  public function run()
  {
    // Define the number of records you want to create
    $data = [
      [
        'nama' => 'Manager Oke',
        'username' => 'manager',
        'password' => Hash::make('manager123'),
      ],
    ]; // You can change this to the desired number

    // Loop to insert multiple rows of data
    Manager::insert($data);
  }
}
