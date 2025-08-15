<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SynapointHistory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua user dan memuat relasi 'historyPoints'
        $users = User::with('historyPoints')->get();

        // Menghitung total poin untuk setiap user
        foreach ($users as $user) {
            $user->total_points = $user->historyPoints()
                                       ->where('status_point', 'approved')
                                       ->sum('poin');
        }

        return view('admin.dataUser', compact('users'));
    }
}
