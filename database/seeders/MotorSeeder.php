<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorSeeder extends Seeder
{
  public function run()
  {
    // // Define the number of records you want to create
    // $numberOfRecords = 30; // You can change this to the desired number

    // // Loop to insert multiple rows of data
    // for ($i = 1; $i <= $numberOfRecords; $i++) {
    // $harga = rand(10000000, 20000000);
    //   DB::table('motor')->insert([
    //     'nama' => 'Motor ' . $i,
    //     'berat' => rand(200, 500) . ' kg',
    //     'stock' => 1,
    //     'power' => rand(100, 300) . ' cc',
    //     'harga' => $harga,
    //     'deskripsi' => 'Description for Motor ' . $i,
    //     'fitur_utama' => 'Feature 1, Feature 2, Feature 3',
    //     'id_merk' => rand(1, 3),
    //     'id_type' => rand(1, 4),
    //     'id_best_motor' => rand(1, 4),
    //     'created_at' => now(),
    //     'updated_at' => now(),
    //   ]);
    // }

    $data = [
      [
        'nama' => 'REVO FIT',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 16198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 2,
        'id_best_motor' => 1,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Genio CBS',
        'berat' => '78kg',
        'power' => '120cc',
        'harga' => 19288000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 1,
        'created_at' => '2023-10-03 19:56:55',
        'updated_at' => '2023-10-03 19:56:55',
      ],
      [
        'nama' => 'CB150 Verza SW',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 21123000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur Motor 1',
        'id_merk' => 1,
        'id_type' => 3,
        'id_best_motor' => 1,
        'created_at' => '2023-10-03 20:02:49',
        'updated_at' => '2023-10-03 20:02:49',
      ],
      [
        'nama' => 'PCX 160 e:HEV',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 45482000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 1,
        'created_at' => '2023-10-03 20:04:39',
        'updated_at' => '2023-10-03 20:04:39',
      ],
    ];

    foreach ($data as $item) {
      Motor::create($item);
    }
  }
}
