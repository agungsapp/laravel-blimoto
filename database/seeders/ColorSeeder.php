<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
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
                'nama' => 'silver',
            ],
            [
                'nama' => 'hitam',
            ],
            [
                'nama' => 'putih',
            ],
            [
                'nama' => 'hijau',
            ],
            [
                'nama' => 'biru',
            ],
            [
                'nama' => 'merah',
            ],
        ];
        DB::table('color')->insert($data);
    }
}
