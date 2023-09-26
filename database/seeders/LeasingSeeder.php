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
            ],
            [
                'nama' => 'Adira',
                'diskon' => 0.40,
            ],
            [
                'nama' => 'OTO',
                'diskon' => 0.50,
            ],
        ];
        DB::table('leasing_motor')->insert($data);
    }
}
