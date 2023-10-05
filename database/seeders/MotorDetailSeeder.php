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
        'gambar' => 'terbaik1.webp',
        'id_motor' => 1,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => 'terbaik2.webp',
        'id_motor' => 2,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => 'terbaik3.webp',
        'id_motor' => 3,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => 'terbaik4.webp',
        'id_motor' => 4,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => 'terbaik5.webp',
        'id_motor' => 5,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => 'terbaik6.webp',
        'id_motor' => 6,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],

      // up new
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-04_12160.webp',
        'id_motor' => 7,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Putih',
        'gambar' => '2023-10-04_wonderfull-white-2-13122022-124524.webp',
        'id_motor' => 8,
        'created_at' => '2023-10-03 20:58:55',
        'updated_at' => '2023-10-03 20:58:55',
      ],
      [
        'warna' => 'Biru',
        'gambar' => '2023-10-04_galaxy-blue-2-24012022-110058.webp',
        'id_motor' => 9,
        'created_at' => '2023-10-03 20:59:45',
        'updated_at' => '2023-10-03 20:59:45',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-04_88212.png',
        'id_motor' => 10,
        'created_at' => '2023-10-03 21:00:37',
        'updated_at' => '2023-10-03 21:00:37',
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
