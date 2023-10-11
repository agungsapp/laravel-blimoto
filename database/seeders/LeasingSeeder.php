<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeasingSeeder extends Seeder
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
                'diskon_normal' => 0.10,
                'diskon' => 0.20,
                'gambar' => '2023-10-11_W1.webp',
            ],
            [
                'nama' => 'Adira',
                'diskon_normal' => 0.10,
                'diskon' => 0.40,
                'gambar' => '2023-10-11_W4.webp',
            ],
            [
                'nama' => 'OTO',
                'diskon_normal' => 0.30,
                'diskon' => 0.50,
                'gambar' => '2023-10-11_w2.webp',
            ],
            [
                'nama' => 'MCF',
                'diskon_normal' => 0.10,
                'diskon' => 0.40,
                'gambar' => '2023-10-11_W3.webp',
            ],
        ];
        DB::table('leasing_motor')->insert($data);
    }
}
