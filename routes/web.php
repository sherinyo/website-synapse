<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rute ini mengelompokkan permintaan web untuk aplikasi Anda.
|
*/

// --- Rute Publik (Tidak memerlukan login) ---
// Rute ini dapat diakses oleh semua pengguna.
// Rute '/' akan memanggil controller untuk mengambil data podcast.
Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/tentangkami', function () {
    return view('users.tentangkami');
});

Route::get('/synapoint', function () {
    return view('users.synapoint');
});

Route::get('/berita', [NewsController::class, 'showPublicList'])->name('news.public.index');
Route::get('/berita/{news}', [NewsController::class, 'showPublicDetail'])->name('news.public.show');

Route::get('/detail-di', function () {
    return view('users.detail-di');
});


// --- Rute Otentikasi (Hanya untuk tamu/belum login) ---
// Rute ini dilindungi oleh middleware 'guest'.
Route::middleware('guest')->group(function () {
    Route::get('/signup', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/signup', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});


// --- Rute Terproteksi (Hanya untuk pengguna yang sudah login) ---
// Rute ini dilindungi oleh middleware 'auth'.
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // --- Rute Admin (Hanya untuk pengguna dengan peran 'admin') ---
    // Perhatikan: Grouping middleware di dalam middleware group lain adalah praktik yang baik.
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        Route::get('/homeAdmin', [PodcastController::class, 'index'])->name('admin.homeAdmin');
        Route::post('/podcasts', [PodcastController::class, 'store'])->name('podcast.store');
        Route::delete('/podcasts/{podcast}', [PodcastController::class, 'destroy'])->name('podcast.destroy');
    
        //news
        Route::get('/berita', [NewsController::class, 'index'])->name('admin.news.index');
        Route::post('/berita', [NewsController::class, 'store'])->name('admin.news.store');
        Route::delete('/berita/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
        Route::put('/berita/{id}', [NewsController::class, 'update'])->name('admin.news.update');
        Route::post('/berita/{id}/restore', [NewsController::class, 'restore'])->name('admin.news.restore');
    });

    // --- Rute Pengguna Biasa ---
    Route::middleware('role:user')->group(function () {
        Route::get('/home', function () {
            return view('users.home');
        })->name('user.home');
    });

    // Rute untuk halaman profil
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/apply-point', [ProfileController::class, 'applyPoint'])->name('profile.apply');

});
