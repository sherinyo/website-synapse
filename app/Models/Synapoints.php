<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Synapoints extends Model
{
    use HasFactory;

    protected $table = 'synapoints';

    protected $fillable = [
        'nama_kegiatan', 'poin', 'status_delete'
    ];


    public function requests()
    {
        return $this->hasMany(SynapointRequests::class);
    }

    public function histories()
    {
        return $this->hasMany(SynapointHistories::class);
    }
}
