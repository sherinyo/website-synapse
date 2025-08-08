<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SynapointHistories extends Model
{
     use HasFactory;

    protected $table = 'synapoint_histories';

    protected $fillable = [
        'user_id', 'synapoint_id', 'tanggal', 'nama_kegiatan', 'poin', 'status_point', 'status_delete'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function synapoint()
    {
        return $this->belongsTo(Synapoints::class);
    }
}
