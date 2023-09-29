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
                'diskon' => 0.20,
                'gambar' => 'fif.jpg',
            ],
            [
                'nama' => 'Adira',
                'diskon' => 0.40,
                'gambar' => 'adira.png',
            ],
            [
                'nama' => 'OTO',
                'diskon' => 0.50,
                'gambar' => 'oto.jpg',
            ],
        ];
        DB::table('leasing_motor')->insert($data);
    }
}
