<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyProfileSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      [
        'nama_perusahaan' => 'BliMoto',
        'alamat' => 'Jakarta - 3654123',
        'no_wa' => '+6282182662724',
        'logo' => 'Logo-blimoto.webp',
      ],
    ];
    DB::table('company_profile')->insert($data);
  }
}
