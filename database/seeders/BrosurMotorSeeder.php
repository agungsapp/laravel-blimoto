<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrosurMotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $data = [
            [
                'nama_file' => 'brochure-beat-compressed-25102023-022057.pdf',
                'id_motor' => 1,
            ],
            [
                'nama_file' => 'brochure-cb150x-compressed-25102023-021545.pdf',
                'id_motor' => 2,
            ],
            [
                'nama_file' => 'refa-e-brochure-vario-160-9-16-mock-up-small-3-27102023-082759.pdf',
                'id_motor' => 3,
            ],
            [
                'nama_file' => 'fa-e-brochure-gaul-1080x1920px-tr-rev-1-compressed-27102023-082654.pdf',
                'id_motor' => 4,
            ],
            [
                'nama_file' => 'brochure-beat-compressed-25102023-022057.pdf',
                'id_motor' => 5,
            ],
            [
                'nama_file' => 'fa-brosur-supra-gtr150-a4-trifol-1-31102023-075414.pdf',
                'id_motor' => 6,
            ],
            [
                'nama_file' => 'brochure-revo-x-compressed-25102023-021945.pdf',
                'id_motor' => 7,
            ],
            [
                'nama_file' => 'brochure-suprax-25102023-045939.pdf',
                'id_motor' => 8,
            ],
            [
                'nama_file' => 'brochure-cb150r-25102023-031703.pdf',
                'id_motor' => 9,
            ],
            [
                'nama_file' => 'fa-e-brochure-honda-classy-rh-17112023-030114-21112023-085811.pdf',
                'id_motor' => 10,
            ],
            [
                'nama_file' => 'brochure-genio-25102023-045605.pdf',
                'id_motor' => 11,
            ],
            [
                'nama_file' => 'brochure-vario125-compressed-25102023-022125.pdf',
                'id_motor' => 12,
            ],
            [
                'nama_file' => 'new-brosur-adv-160-2-03112023-074907.pdf',
                'id_motor' => 13,
            ],
            [
                'nama_file' => 'brochure-scoopy-compressed-25102023-021851.pdf',
                'id_motor' => 14,
            ],
        ];

        DB::table('brosur_motor')->insert($data);
    }
}
