<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //search
    public function index(Request $request)
    {
        $search = $request->query('search'); 

        if ($search) {
            $allNews = News::where('nama', 'LIKE', "%{$search}%")
                            ->orWhere('lokasi', 'LIKE', "%{$search}%")
                            ->latest()
                            ->get();
        } else {
            $allNews = News::latest()->get();
        }

        $query = News::query(); 
        if ($search) {
            $query->where('nama', 'LIKE', "%{$search}%")->orWhere('lokasi', 'LIKE', "%{$search}%");
        }
        $allNews = $query->latest()->get();

        // Ambil data yang sudah di-soft-delete (sampah)
        $trashedNews = News::onlyTrashed()->latest('deleted_at')->get();

        return view('admin.beritaAdmin', [
            'allNews' => $allNews,
            'trashedNews' => $trashedNews // Kirim data sampah ke view
        ]);
    }

    //simpan
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'mulai' => 'nullable|date',
            'selesai' => 'nullable|date|after_or_equal:mulai',
            'lokasi' => 'nullable|string',
            'role' => 'required|string',
            'gambar' => 'nullable|image|max:3072',
        ]);
        $imageName = null;
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images/news'), $imageName);
        }
        News::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'lokasi' => $request->lokasi,
            'role' => $request->role,
            'gambar' => $imageName,
        ]);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    //hapus 
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete(); // Ini sekarang akan mengisi 'deleted_at', bukan menghapus permanen
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dipindahkan ke sampah!');
    }
    
    //restore
    public function restore($id)
    {
        // Cari data di sampah, lalu kembalikan
        $news = News::onlyTrashed()->findOrFail($id);
        $news->restore(); // Ini akan membuat 'deleted_at' kembali menjadi null
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dikembalikan!');
    }

    //edit
    public function update(Request $request, $id)
    {
        $beritum = News::findOrFail($id); // Cari berita berdasarkan ID

        $rules = [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
            'lokasi' => 'required|string',
            'role' => 'required|string',
            'gambar' => 'nullable|image|max:3072',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('gambar')) {
            if ($beritum->gambar && file_exists(public_path('images/news/' . $beritum->gambar))) {
                unlink(public_path('images/news/' . $beritum->gambar));
            }
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images/news'), $imageName);
            $validatedData['gambar'] = $imageName;
        }

        $beritum->update($validatedData);
        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function showPublicList(Request $request)
    {
        $tipe = $request->query('tipe', 'Event');
        $listNews = News::where('role', $tipe)
                        ->latest('mulai')
                        ->paginate(5);

        // 1. Ambil 4 event terbaru yang memiliki tanggal mulai.
        // Kita juga memastikan tanggal mulainya tidak di masa lalu.
        $upcomingEvents = News::whereNotNull('mulai')
                            ->where('mulai', '>=', now()) // Hanya ambil event yang akan datang
                            ->orderBy('mulai', 'asc')    // Urutkan dari yang paling dekat
                            ->take(4)                     // Ambil maksimal 4
                            ->get();

        // 2. Ambil 2 berita terbaru yang TIDAK memiliki tanggal mulai.
        $pureNews = News::whereNull('mulai')
                        ->latest('created_at') // Urutkan dari yang paling baru dibuat
                        ->take(2)              // Ambil maksimal 2
                        ->get();

        // 3. Gabungkan keduanya menjadi satu koleksi untuk hero.
        $heroNews = $upcomingEvents->merge($pureNews);

        // Kirim semua data yang dibutuhkan ke view
        return view('users.berita', [
            'heroNews' => $heroNews,
            'listNews' => $listNews
        ]);
    }

    public function showPublicDetail(News $news)
    {
        // Berkat Route Model Binding, Laravel otomatis menemukan berita berdasarkan ID.
        // Variabel $news sudah berisi data berita yang diminta.
        return view('users.detailBerita', ['newsItem' => $news]);
    }

    public function showForHomepage()
    {
        $latestNews = News::latest() 
                        ->take(3) 
                        ->get();
        return view('users.home', [
            'latestNews' => $latestNews,
        ]); 
    }
}
