<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'nama', 'deskripsi', 'role', 'mulai', 'selesai', 'lokasi', 'gambar', 'status_delete'
    ];
}

