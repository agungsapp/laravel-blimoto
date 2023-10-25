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
        'diskon' => 10000000,
        'tenor' => 35,
      ],
    ];

    foreach ($data as $item) {
      DiskonMotor::create($item);
    }
  }
}
