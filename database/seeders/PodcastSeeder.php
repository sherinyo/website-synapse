<?php

namespace Database\Seeders;

use App\Models\Podcasts;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Podcasts::create([
<<<<<<< HEAD
            'name' => 'ISB Berpodcast 2025',
            'link' => 'https://youtu.be/s85cKxJIpo0?feature=shared',
=======
            'nama_podcast' => 'ISB Berpodcast 2025',
            'link_podcast' => 'https://youtu.be/s85cKxJIpo0?feature=shared',
>>>>>>> 0765034083270b2918ff2456abd14a60add00fc5
            'status_delete' => 0
        ]);
    }
}
