<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MerkMotorSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'nama' => 'Honda'
      ],
      [
        'nama' => 'Yamaha'
      ],
      [
        'nama' => 'Suzuki'
      ],
      [
        'nama' => 'Kawasaki'
      ],
    ];
    DB::table('merk')->insert($data);
  }
}
