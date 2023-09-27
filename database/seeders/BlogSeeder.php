<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
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
                'judul' => 'tips agar motor awet edit',
                'cuplikan' => 'Edit ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae numquam cupiditate illo iste temporibus dolorem ex ab aspernatur id a quos doloribus at omnis neque nobis obcaecati atque adipisci, et exercitationem, debitis ipsum modi? Temporibus quasi architecto illum. Illo perspiciatis veniam modi impedit quasi libero deserunt optio quidem, qui dignissimos porro facilis, fuga quae voluptate',
                'deskripsi' => 'isi konten blog',
                'thumbnail' => 'ptiyoOxSHl_berita2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'waktunya memprogram',
                'cuplikan' => 'Edit ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae numquam cupiditate illo iste temporibus dolorem ex ab aspernatur id a quos doloribus at omnis neque nobis obcaecati atque adipisci, et exercitationem, debitis ipsum modi? Temporibus quasi architecto illum. Illo perspiciatis veniam modi impedit quasi libero deserunt optio quidem, qui dignissimos porro facilis, fuga quae voluptate',
                'deskripsi' => 'isi konten blog',
                'thumbnail' => '6py47l4TbG_berita1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'ngoding lagi ngoding terus...',
                'cuplikan' => 'Edit ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae numquam cupiditate illo iste temporibus dolorem ex ab aspernatur id a quos doloribus at omnis neque nobis obcaecati atque adipisci, et exercitationem, debitis ipsum modi? Temporibus quasi architecto illum. Illo perspiciatis veniam modi impedit quasi libero deserunt optio quidem, qui dignissimos porro facilis, fuga quae voluptate',
                'deskripsi' => 'isi konten blog',
                'thumbnail' => 'tis7HQu829_berita3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('blogs')->insert($data);
    }
}
