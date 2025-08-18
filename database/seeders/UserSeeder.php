<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
<<<<<<< HEAD
use Illuminate\Support\Str; // Tambahkan ini jika Anda ingin menggunakan Str::random()
=======
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
>>>>>>> 0765034083270b2918ff2456abd14a60add00fc5

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
<<<<<<< HEAD
            [
                'name' => 'Digital Innovation',
                'email' => 'isbdigitalinnovation@gmail.com',
                'password' => Hash::make('isbmantap'),
                'points' => '0',
                'role' => 'admin',
                'IsVerified' => true, // Admin dianggap sudah terverifikasi
                'VerificationToken' => null,
                'TokenExpires' => null,
                'Status_Delete' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sherin Yonatan',
                'email' => 'sherinkeren@gmail.com',
                'password' => Hash::make('sherin123'),
                'points' => '0',
                'role' => 'user',
                'IsVerified' => false, // User baru belum terverifikasi
                'VerificationToken' => Str::random(60), // Buat token verifikasi
                'TokenExpires' => now()->addHours(24), // Set masa berlaku token
                'Status_Delete' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
=======
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
>>>>>>> 0765034083270b2918ff2456abd14a60add00fc5
    }
}
