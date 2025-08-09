<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [
            'nama' => 'Digital Innovation',
            'email' => 'isbdigitalinnovation@gmail.com',
            'password' => Hash::make('isbmantap'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'nama' => 'Sherin Yonatan',
            'email' => 'sherinkeren@gmail.com',
            'password' => Hash::make('sherin123'),
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    }
}
