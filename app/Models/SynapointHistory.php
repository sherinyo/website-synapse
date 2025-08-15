<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SynapointHistory extends Model
{
    use HasFactory;

    protected $table = 'HistoryPoint';
    protected $primaryKey = 'id';

    protected $fillable = [
        'request_id',
        'user_id',
        'nama_kegiatan',
        'point',
        'status_point',
        'status_delete',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function request()
    {
        return $this->belongsTo(SynapointRequest::class, 'request_id');
    }
}
