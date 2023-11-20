<?php

namespace Database\Seeders;

use App\Models\Motor;
use App\Models\MtrBestMotor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MtrBestMotorSeeder extends Seeder
{
  public function run()
  {

    $data = [

      [
        'id_motor' => 1,
        'id_best_motor' => 2,
      ],
      [
        'id_motor' => 2,
        'id_best_motor' => 2,
      ],
      [
        'id_motor' => 3,
        'id_best_motor' => 2,
      ],
      [
        'id_motor' => 4,
        'id_best_motor' => 2,
      ],
      [
        'id_motor' => 5,
        'id_best_motor' => 2,
      ],
      [
        'id_motor' => 6,
        'id_best_motor' => 3,
      ],
      [
        'id_motor' => 7,
        'id_best_motor' => 3,
      ],
      [
        'id_motor' => 8,
        'id_best_motor' => 3,
      ],
      [
        'id_motor' => 9,
        'id_best_motor' => 5,
      ],
      [
        'id_motor' => 10,
        'id_best_motor' => 4,
      ],
      [
        'id_motor' => 11,
        'id_best_motor' => 4,
      ],
      [
        'id_motor' => 12,
        'id_best_motor' => 5,
      ],
      [
        'id_motor' => 13,
        'id_best_motor' => 4,
      ],
      [
        'id_motor' => 14,
        'id_best_motor' => 4,
      ],
    ];

    foreach ($data as $item) {
      MtrBestMotor::create($item);
    }
  }
}
