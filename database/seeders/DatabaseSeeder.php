<?php

namespace Database\Seeders;

use App\Models\dues_category;
use App\Models\dues_members;
use App\Models\DuesCategory;
use App\Models\DuesMembers;
use App\Models\officer;
use App\Models\payment;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'id' => 1,
            'name'=> 'Admin',
            'username'=> 'admin123',
            'password'=> bcrypt('1234'),
            'nohp'=> '0876543524312',
            'address' => 'Tasik',
            'level' => 'admin'
        ]);

        User::create([
            'id' => 2,
            'name'=> 'Officer',
            'username'=> 'officer123',
            'password'=> bcrypt('1234'),
            'nohp'=> '0876543524312',
            'address' => 'Tasik',
            'level' => 'officer'
        ]);

          User::create([
            'id' => 3,
            'name'=> 'Warga',
            'username'=> 'Warga123',
            'password'=> bcrypt('123'),
            'nohp'=> '0876543524313',
            'address' => 'Ciamis',
            'level' => 'warga'
        ]);

        DuesCategory::create([
            'id'=> 1,
            'period' => 'mingguan',
            'nominal' => 5000,
            'status'=> 1,
        ]);

        DuesCategory::create([
            'id'=> 2,
            'period' => 'bulanan',
            'nominal' => 15000,
            'status'=> 1,
        ]);

        DuesMembers::create([
            'id'=> 1,
            'users_id'=> 1,
            'dues_categories_id' => 1,
        ]);

        DuesMembers::create([
            'id'=> 2,
            'users_id'=> 2,
            'dues_categories_id' => 2,
        ]);

        officer::create([
            'id' => '1',
            'users_id' => 1,
        ]);
    }
}
