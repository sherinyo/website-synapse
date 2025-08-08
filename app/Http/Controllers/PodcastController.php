<?php

namespace App\Http\Controllers;

use App\Models\Podcasts;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function index()
    {
         $podcast = Podcasts::latest()->first(); // ambil podcast terbaru
        return view('users.home', compact('podcast'));
    }
}
