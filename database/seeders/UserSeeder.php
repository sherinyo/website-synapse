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
                'Nama' => 'Digital Innovation',
                'email' => 'isbdigitalinnovation@gmail.com',
                'password' => Hash::make('isbmantap'),
                'role' => 'admin', //admin
                'email_verified_at' => now(),
                'status_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'Nama' => 'Sherin Yonatan',
                'Email' => 'sherinkeren@gmail.com',
                'Password' => Hash::make('sherin123'),
                'Role' => 'user',                                
                'email_verified_at' => now(),
                'status_delete' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
