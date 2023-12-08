<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusBiSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'status' => 'pengecekan',
      ],
      [
        'status' => 'blacklist',
      ],
      [
        'status' => 'bersih',
      ],
    ];
    DB::table('status_bi_checking')->insert($data);
  }
}
