<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BestMotor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(MerkMotorSeeder::class);
        $this->call(TypeMotorSeeder::class);
        $this->call(BestMotorSeeder::class);
        $this->call(MotorSeeder::class);
        $this->call(MotorDetailSeeder::class);
        $this->call(HookSeeder::class);
        $this->call(LeasingSeeder::class);
        DB::table('admin')->insert([
            'nama' => 'Admin BliMoto',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}
