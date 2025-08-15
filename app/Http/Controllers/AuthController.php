<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan halaman pendaftaran
    public function showRegistrationForm()
    {
        return view('auth.signup');
    }

    // Memproses data pendaftaran
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'IsVerified' => false,
            'Status_Delete' => false,
        ]);

        Auth::login($user);

        return redirect('/tentangkami')->with('success', 'Pendaftaran berhasil!');
    }

    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Memproses data login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Cek peran (role) pengguna
            if ($user->role === 'admin') {
                // Arahkan ke rute admin.homeAdmin
                return redirect()->route('admin.homeAdmin')->with('success', 'Selamat datang, Admin!');
            } else {
                // Arahkan ke rute user.home
                return redirect()->route('user.home')->with('success', 'Login berhasil!');
            }
        }

        return back()->withInput()->with('error', 'Email atau password salah.');
    }
    // Logout pengguna
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil logout.');
    }
}
