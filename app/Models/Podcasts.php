<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Podcasts extends Model
{
    use HasFactory;

    protected $table = 'podcasts';

    protected $fillable = [
        'name', 'link', 'status_delete'
    ];
}
