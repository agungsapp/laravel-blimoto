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
        'warna' => 'Silver',
        'gambar' => '2023-10-13_Produk Promo Deluxe Silver.webp',
        'id_motor' => 1,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Biru',
        'gambar' => '2023-10-13_Produk Promo Deluxe Blue.webp',
        'id_motor' => 1,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo Deluxe Black.webp',
        'id_motor' => 1,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hijau',
        'gambar' => '2023-10-13_Produk Promo Deluxe Green.webp',
        'id_motor' => 1,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hijau',
        'gambar' => '2023-10-13_Produk Promo CB150X GREEN.webp',
        'id_motor' => 2,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Merah',
        'gambar' => '2023-10-13_Produk Promo CB150X RED.webp',
        'id_motor' => 2,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Putih Emas',
        'gambar' => '2023-10-13_Produk Promo V160 CBS WHITE gold.webp',
        'id_motor' => 3,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam Emas',
        'gambar' => '2023-10-13_Produk Promo V160 CBS BLACK gold.webp',
        'id_motor' => 3,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Putih',
        'gambar' => '2023-10-13_Produk Promo V160 ABS WHITE.webp',
        'id_motor' => 3,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo V160 ABS BLACK.webp',
        'id_motor' => 3,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Silver',
        'gambar' => '2023-10-13_Produk Promo BSTREET SILVER.webp',
        'id_motor' => 4,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo BSTREET BLACK.webp',
        'id_motor' => 4,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo BEAT CBS BLACK.webp',
        'id_motor' => 5,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Biru',
        'gambar' => '2023-10-13_Produk Promo BEAT CBS BLUE.webp',
        'id_motor' => 5,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Merah',
        'gambar' => '2023-10-13_Produk Promo BEAT CBS RED.webp',
        'id_motor' => 5,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Silver',
        'gambar' => '2023-10-13_Produk Promo BEAT CBS SILVER.webp',
        'id_motor' => 5,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam Merah',
        'gambar' => '2023-10-13_Produk Promo GTR150 BLACK RED.webp',
        'id_motor' => 6,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hiam Putih',
        'gambar' => '2023-10-13_Produk Promo GTR150 BLACK WHITE.webp',
        'id_motor' => 6,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo GTR150 BLACK.webp',
        'id_motor' => 6,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Merah Hitam',
        'gambar' => '2023-10-13_Produk Promo GTR150 RED BLACK.webp',
        'id_motor' => 6,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo REVOX.webp',
        'id_motor' => 7,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam Emas',
        'gambar' => '2023-10-13_Produk Promo SUPRAX BLACK GOLD.webp',
        'id_motor' => 8,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Merah',
        'gambar' => '2023-10-13_Produk Promo SUPRAX RED.webp',
        'id_motor' => 8,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo CB150R BLACK.webp',
        'id_motor' => 9,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Full Hitam',
        'gambar' => '2023-10-13_Produk Promo CB150R FULLBLACK.webp',
        'id_motor' => 9,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Merah',
        'gambar' => '2023-10-13_Produk Promo CB150R RED.webp',
        'id_motor' => 9,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Silver',
        'gambar' => '2023-10-13_Produk Promo CB150R SILVER.webp',
        'id_motor' => 9,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo PCX ABS BLACK.webp',
        'id_motor' => 10,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Biru',
        'gambar' => '2023-10-13_Produk Promo PCX ABS BLUE.webp',
        'id_motor' => 10,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Merah',
        'gambar' => '2023-10-13_Produk Promo PCX ABS RED.webp',
        'id_motor' => 10,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Putih',
        'gambar' => '2023-10-13_Produk Promo PCX ABS WHITE.webp',
        'id_motor' => 10,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Merah',
        'gambar' => '2023-10-13_Produk Promo GENIO 1.webp',
        'id_motor' => 11,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo GENIO 2.webp',
        'id_motor' => 11,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Abu - Abu',
        'gambar' => '2023-10-13_Produk Promo GENIO 3.webp',
        'id_motor' => 11,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Ungu',
        'gambar' => '2023-10-13_Produk Promo GENIO 4.webp',
        'id_motor' => 11,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam Putih',
        'gambar' => '2023-10-13_Produk Promo GENIO 5.webp',
        'id_motor' => 11,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Silver Hitam',
        'gambar' => '2023-10-13_Produk Promo GENIO 6.webp',
        'id_motor' => 11,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Putih',
        'gambar' => '2023-10-13_Produk Promo V125 WHITE.webp',
        'id_motor' => 12,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Merah',
        'gambar' => '2023-10-13_Produk Promo V125 RED.webp',
        'id_motor' => 12,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Biru',
        'gambar' => '2023-10-13_Produk Promo V125 BLUE.webp',
        'id_motor' => 12,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo V125 BLACK.webp',
        'id_motor' => 12,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam Matte',
        'gambar' => '2023-10-13_Produk Promo V125 BLACK MATTE.webp',
        'id_motor' => 12,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hitam',
        'gambar' => '2023-10-13_Produk Promo ADV ABS BLACK.webp',
        'id_motor' => 13,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Merah',
        'gambar' => '2023-10-13_Produk Promo ADV ABS RED.webp',
        'id_motor' => 13,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Putih',
        'gambar' => '2023-10-13_Produk Promo ADV ABS WHITE.webp',
        'id_motor' => 13,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Biru',
        'gambar' => '2023-10-13_Produk Promo Scoopy Fashion Blue.webp',
        'id_motor' => 14,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Cokelat',
        'gambar' => '2023-10-13_Produk Promo Scoopy Fashion Brown.webp',
        'id_motor' => 14,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Hijau',
        'gambar' => '2023-10-13_Produk Promo Scoopy Prestige Green.webp',
        'id_motor' => 14,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Putih',
        'gambar' => '2023-10-13_Produk Promo Scoopy Prestige White.webp',
        'id_motor' => 14,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Sporty Hitam',
        'gambar' => '2023-10-13_Produk Promo Scoopy Sporty Black.webp',
        'id_motor' => 14,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Sporty Merah',
        'gambar' => '2023-10-13_Produk Promo Scoopy Sporty Red.webp',
        'id_motor' => 14,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Stylelish Cokelat',
        'gambar' => '2023-10-13_Produk Promo Scoopy Stylish Brown.webp',
        'id_motor' => 14,
        'created_at' => '2023-10-03 20:58:04',
        'updated_at' => '2023-10-03 20:58:04',
      ],
      [
        'warna' => 'Stylelish Merah',
        'gambar' => '2023-10-13_Produk Promo Scoopy Stylish Red.webp',
        'id_motor' => 14,
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
