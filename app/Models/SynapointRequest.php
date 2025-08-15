<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SynapointRequest extends Model
{
    use HasFactory;

    // Perbarui nama tabel
    protected $table = 'synapoint_requests';
    protected $primaryKey = 'ID';

    protected $fillable = [
        'Synapoint_ID', 'user_ID', 'nama_kegiatan', 'type_kegiatan', 'bukti_kegiatan', 'status_delete'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ID');
    }

    // Tambahkan relasi ke model Synapoint
    public function synapoint()
    {
        return $this->belongsTo(Synapoint::class, 'Synapoint_ID', 'ID');
    }
}
