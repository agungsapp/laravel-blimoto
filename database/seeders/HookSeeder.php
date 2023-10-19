<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HookSeeder extends Seeder
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
                'nama' => 'hook 3',
                'gambar' => '2023-10-06_hook-3.webp',
                'link' => '#',
                'warna' => '#292929',
                'warna_teks' => '#FFFFFF',
                'caption' => 'Beli Sekarang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'hook 2',
                'gambar' => 'hook-img2.webp',
                'link' => '#',
                'warna' => '#FFFFFF',
                'warna_teks' => '#292929',
                'caption' => 'Selengkapnya',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'hook 1',
                'gambar' => '2023-10-11_HOOK 01 REVISI .webp',
                'link' => '#',
                'warna' => '#DD0202',
                'warna_teks' => '#FFFFFF',
                'caption' => 'Lihat Promo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('hook')->insert($data);
    }
}
