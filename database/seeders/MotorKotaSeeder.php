<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MotorKota;

class MotorKotaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // seeder modifikasi april perubahan cek lokasi update harga
    $id = 3;
    $otr = 77777777;
    $data = [
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '1',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '2',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '3',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '4',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '5',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '6',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '7',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '8',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '9',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '10',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '11',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '12',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '13',
      ],
      [
        'id_kota' => $id,
        'harga_otr' => $otr,
        'id_motor' => '14',
      ],
    ];

    foreach ($data as $item) {
      MotorKota::create($item);
    }
  }
}
