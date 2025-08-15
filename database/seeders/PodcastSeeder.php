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
            'name' => 'ISB Berpodcast 2025',
            'link' => 'https://youtu.be/s85cKxJIpo0?feature=shared',
            'status_delete' => 0
        ]);
    }
}
