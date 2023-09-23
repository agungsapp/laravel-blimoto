<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeMotorSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'nama' => 'Matic'
      ],
      [
        'nama' => 'CUB/Bebek'
      ],
      [
        'nama' => 'Sport'
      ],
      [
        'nama' => 'EV'
      ],
      [
        'nama' => 'BigBike'
      ],
    ];
    DB::table('type')->insert($data);
  }
}
