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
        'nama' => 'FIF Group',
        'gambar' => '2023-10-05_MITRA KAMI 01 .webp',
      ],
      [
        'nama' => 'Adira',
        'gambar' => '2023-10-05_MITRA KAMI 02.webp',
      ],
      [
        'nama' => 'MCF',
        'gambar' => '2023-10-05_MITRA KAMI 03.webp',
      ],
      [
        'nama' => 'OTO',
        'gambar' => '2023-10-05_MITRA KAMI 04.webp',
      ],
      [
        'nama' => 'Honda',
        'gambar' => '2023-10-18_honda-motorcycles-logo-11.png',
      ],
      [
        'nama' => 'Suzuki',
        'gambar' => '2023-10-18_suzuki-png.png',
      ],
      [
        'nama' => 'Yamaha',
        'gambar' => '2023-10-18_yamaha-free-download-free-png.webp',
      ],
      [
        'nama' => 'Kawasaki',
        'gambar' => '2023-10-18_kawasaki-logo-407E4B7736-seeklogo.com.png',
      ],
    ];

    foreach ($data as $item) {
      Mitra::create($item);
    }
  }
}
