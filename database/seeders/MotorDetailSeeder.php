<?php

namespace Database\Seeders;

use App\Models\DetailMotor;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorDetailSeeder extends Seeder
{
  public function run()
  {
    // // Define the number of records you want to create
    // $numberOfRecords = 20; // You can change this to the desired number

    // // Loop to insert multiple rows of data
    // for ($i = 1; $i <= $numberOfRecords; $i++) {
    //   DB::table('detail_motor')->insert([
    //     'warna' => 'Color ' . $i,
    //     'gambar' => rand(1, 5) . '.webp',
    //     'id_motor' => $i, // Replace with the actual motor IDs
    //     'created_at' => now(),
    //     'updated_at' => now(),
    //   ]);
    // }

    $data = [
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-07_Produk Promo 1.webp',
        'id_motor' => 1,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-07_Produk Promo 2.webp',
        'id_motor' => 2,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-07_Produk Promo 3.webp',
        'id_motor' => 3,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-07_Produk Promo 4.webp',
        'id_motor' => 4,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-07_Produk Promo 5.webp',
        'id_motor' => 5,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
    ];

    foreach ($data as $item) {
      DetailMotor::create([
        'warna' => $item['warna'],
        'gambar' => $item['gambar'],
        'id_motor' => $item['id_motor'],
        'created_at' => Carbon::parse($item['created_at']),
        'updated_at' => Carbon::parse($item['updated_at']),
      ]);
    }
  }
}
