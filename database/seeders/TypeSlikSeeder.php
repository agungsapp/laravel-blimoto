<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSlikSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'nama' => 'Premium',
        'harga' => 50000,
      ],
      [
        'nama' => 'Biasa',
        'harga' => 0,
      ],
    ];
    DB::table('type_slik')->insert($data);
  }
}
