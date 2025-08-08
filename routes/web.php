<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PodcastController;
use Illuminate\Session\Middleware\StartSession;

Route::get('/home', function () {return view('users.home');});
Route::get('/home', [PodcastController::class, 'index']);
Route::get('/detail-divisi', function () {return view('users.detail-hod');});
Route::get('/tentangkami', function () {return view('users.tentangkami');});
Route::get('/synapoint', function () {return view('users.synapoint');});

// Route::middleware([StartSession::class])->group(function () {
//     Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
//     Route::post('/login', [AuthController::class, 'login']);
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('/home', function () {
//     return view('home'); // Ganti 'home' jika kamu pakai nama file lain
// })->name('home')->middleware('auth');
// });

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware([StartSession::class])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
});

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');

Route::get('/profile', function () {
    return view('users.profile');
});

Route::get('/admin', function () {
    return view('admin.homeAdmin');
});

Route::get('/berita', function () {
    return view('users.berita');
});


