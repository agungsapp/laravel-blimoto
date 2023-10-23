<?php

namespace Database\Seeders;

use App\Models\DiskonMotor;
use Illuminate\Database\Seeder;

class DiskonMotorSeeder extends Seeder
{
  public function run()
  {

    $data = [
      [
        'id_motor' => 1,
        'id_leasing' => 2,
        'diskon_35' => 10000000,
        'diskon_24' => 7000000,
        'diskon_12' => 500000,
        'dp_35' => 900000,
        'dp_24' => 1200000,
        'dp_12' => 14000000,
      ],
    ];

    foreach ($data as $item) {
      DiskonMotor::create($item);
    }
  }
}
