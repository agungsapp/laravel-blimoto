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
        'id_lokasi' => 1,
        'diskon' => 500000,
        'diskon_promo' => 1000000,
        'tenor' => 35,
        'potongan_tenor' => 2,
      ],
      [
        'id_motor' => 1,
        'id_leasing' => 2,
        'id_lokasi' => 1,
        'diskon' => 300000,
        'diskon_promo' => 700000,
        'tenor' => 29,
        'potongan_tenor' => 2,
      ],
      [
        'id_motor' => 1,
        'id_leasing' => 2,
        'id_lokasi' => 1,
        'diskon' => 100000,
        'diskon_promo' => 500000,
        'tenor' => 23,
        'potongan_tenor' => 2,
      ],
    ];

    foreach ($data as $item) {
      DiskonMotor::create($item);
    }
  }
}
