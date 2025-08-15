<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Synapoint extends Model
{
    use HasFactory;

    // Pastikan nama tabel di sini menggunakan huruf kecil dan jamak
    protected $table = 'synapoints';

    // Pastikan primary key sesuai dengan migrasi Laravel
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_kegiatan',
        'min_poin',
        'max_poin',
        'bonus_poin',
        'status_delete',
    ];

    public function requests()
    {
        return $this->hasMany(SynapointRequest::class, 'synapoint_id');
    }

    public function histories()
    {
        return $this->hasMany(SynapointHistory::class, 'synapoint_id');
    }
}
