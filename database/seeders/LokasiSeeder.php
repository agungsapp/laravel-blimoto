<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
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
                'nama' => 'Jakarta Selatan',
            ],
            [
                'nama' => 'Bogor',
            ],
            [
                'nama' => 'Depok',
            ],
            [
                'nama' => 'Tanngerang',
            ],
            [
                'nama' => 'bekasi',
            ],
        ];
        DB::table('kota')->insert($data);
    }
}
