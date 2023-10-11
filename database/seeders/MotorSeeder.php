<?php

namespace Database\Seeders;

use App\Models\Motor;
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
        'nama' => 'BeAT Deluxe',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 19198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 2,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'CB150X',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 33198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 3,
        'id_best_motor' => 2,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Vario 160',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 26198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 2,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'BeAT Street',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 18198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 2,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'BeAT CBS',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 18198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 2,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'GTR 150',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 24198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 2,
        'id_best_motor' => 3
        ,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Revo x',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 17198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 2,
        'id_best_motor' => 3
        ,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Supra x',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 19198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 2,
        'id_best_motor' => 3
        ,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'CB 150 R',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 31198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 2,
        'id_best_motor' => 5
        ,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'PCX',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 31198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 4
        ,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Genio',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 21198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 4
        ,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'V125',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 23198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 5
        ,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'ADV',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 24198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 4
        ,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Scoopy',
        'berat' => '78kg',
        'power' => '150cc',
        'harga' => 22198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 4
        ,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
    ];

    foreach ($data as $item) {
      Motor::create($item);
    }
  }
}
