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
        'gambar' => 'honda-1652082402.webp',
      ],
      [
        'nama' => 'Yamaha',
        'gambar' => 'yamaha-1651737896.png',
      ],
      [
        'nama' => 'Suzuki',
        'gambar' => 'suzuki-1652082502.webp',
      ],
      [
        'nama' => 'Kawasaki',
        'gambar' => 'kawasaki-1652082467.webp',
      ],
    ];

    foreach ($data as $item) {
      Mitra::create($item);
    }
  }
}
