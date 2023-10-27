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
        'diskon' => 500000,
        'diskon_promo' => 10000000,
        'tenor' => 35,
      ],
      [
        'id_motor' => 1,
        'id_leasing' => 2,
        'diskon' => 300000,
        'diskon_promo' => 700000,
        'tenor' => 27,
      ],
      [
        'id_motor' => 1,
        'id_leasing' => 2,
        'diskon' => 100000,
        'diskon_promo' => 500000,
        'tenor' => 23,
      ],
    ];

    foreach ($data as $item) {
      DiskonMotor::create($item);
    }
  }
}
