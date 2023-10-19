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
    //     
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
        'harga' => 19198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 2,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'CB150X',
        'harga' => 33198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 3,
        'id_best_motor' => 2,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Vario 160',
        'harga' => 26198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 2,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'BeAT Street',
        'harga' => 18198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 2,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'BeAT CBS',
        'harga' => 18198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 2,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'GTR 150',
        'harga' => 24198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 2,
        'id_best_motor' => 3,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Revo x',
        'harga' => 17198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 2,
        'id_best_motor' => 3,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Supra x',
        'harga' => 19198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 2,
        'id_best_motor' => 3,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'CB 150 R',
        'harga' => 31198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 2,
        'id_best_motor' => 5,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'PCX',
        'harga' => 31198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 4,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Genio',
        'harga' => 21198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 4,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Vario 125',
        'harga' => 23198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 5,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'ADV',
        'harga' => 24198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 4,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
      [
        'nama' => 'Scoopy',
        'harga' => 22198000,
        'stock' => 1,
        'deskripsi' => 'Deskripsi motor 1',
        'fitur_utama' => 'Fitur motor 1',
        'bonus' => 'ini bonus 1',
        'id_merk' => 1,
        'id_type' => 1,
        'id_best_motor' => 4,
        'created_at' => '2023-10-03 19:55:45',
        'updated_at' => '2023-10-03 19:55:45',
      ],
    ];

    foreach ($data as $item) {
      Motor::create($item);
    }
  }
}
