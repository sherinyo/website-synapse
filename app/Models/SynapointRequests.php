<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SynapointRequests extends Model
{
    use HasFactory;

    protected $table = 'synapoint_requests';

    protected $fillable = [
        'user_id',
        'synapoint_id',
        'type_kegiatan',
        'bukti_kegiatan',
        'status',
        'status_delete',
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
