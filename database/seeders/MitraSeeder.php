<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mitra;

class MitraSeeder extends Seeder
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
        'nama' => 'Honda',
        'gambar' => '2023-10-05_MITRA KAMI 01 .webp',
      ],
      [
        'nama' => 'Yamaha',
        'gambar' => '2023-10-05_MITRA KAMI 02.webp',
      ],
      [
        'nama' => 'Suzuki',
        'gambar' => '2023-10-05_MITRA KAMI 03.webp',
      ],
      [
        'nama' => 'Kawasaki',
        'gambar' => '2023-10-05_MITRA KAMI 04.webp',
      ],
    ];

    foreach ($data as $item) {
      Mitra::create($item);
    }
  }
}
