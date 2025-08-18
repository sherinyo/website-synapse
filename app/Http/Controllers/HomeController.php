<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Podcasts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        public function index()
        {
            // 1. Ambil 3 berita terbaru berdasarkan ID
            $latestNews = News::orderBy('id', 'desc')->take(3)->get();

            // 2. Ambil SATU podcast terbaru
            $latestPodcast = Podcasts::latest()->first(); // Menggunakan nama model singular

            // 3. Proses link YouTube dari podcast jika ada
            if ($latestPodcast) {
                // Ekstrak ID video dari URL YouTube
                $videoId = null;
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i', $latestPodcast->link, $matches)) {
                    $videoId = $matches[1];
                }

                // Jika ID ditemukan, buat link embed. Jika tidak, gunakan link asli.
                if ($videoId) {
                    $latestPodcast->embed_link = "https://www.youtube.com/embed/{$videoId}";
                } else {
                    $latestPodcast->embed_link = $latestPodcast->link; // Fallback
                }
            }

            // 4. Kirim semua data yang sudah siap ke view homepage
            return view('users.home', [
                'latestNews' => $latestNews,
                'latestPodcast' => $latestPodcast,
            ]);
        }
}
