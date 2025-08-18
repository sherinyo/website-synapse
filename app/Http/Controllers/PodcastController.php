<?php

namespace App\Http\Controllers;

use App\Models\Podcasts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PodcastController extends Controller
{
    // Menampilkan halaman admin dengan daftar podcast dan form
    public function index()
    {
        $podcasts = Podcasts::all();
        return view('admin.homeAdmin', compact('podcasts'));
    }

    // Menyimpan podcast baru ke database
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Podcasts::create($request->all());

        return redirect()->route('admin.homeAdmin')->with('success', 'Podcast berhasil ditambahkan!');
    }

    // Menghapus podcast dari database
    public function destroy(Podcasts $podcast)
    {
        $podcast->delete();
        return redirect()->route('admin.homeAdmin')->with('success', 'Podcast berhasil dihapus!');
    }
}
