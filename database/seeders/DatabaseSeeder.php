<?php

namespace Database\Seeders;

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

        $this->call([
<<<<<<< HEAD
            UserSeeder::class,
            SynapointSeeder::class,
            SynapointRequestSeeder::class,
=======
            PodcastSeeder::class,
        ]);

        $this->call([
            UserSeeder::class,
>>>>>>> 0765034083270b2918ff2456abd14a60add00fc5
        ]);

         $this->call(PodcastSeeder::class);
    }
}
