<?php

namespace Database\Seeders;

use App\Models\Synapoint;
use Illuminate\Database\Seeder;

class SynapointSeeder extends Seeder
{
    public function run(): void
    {
        Synapoint::create(['nama_kegiatan' => 'Peserta Seminar/Workshop', 'min_poin' => 5, 'max_poin' => 10, 'bonus_poin' => 2, 'status_delete' => '0']);
        Synapoint::create(['nama_kegiatan' => 'Panitia kecil', 'min_poin' => 10, 'max_poin' => 15, 'bonus_poin' => null, 'status_delete' => '0']);
        Synapoint::create(['nama_kegiatan' => 'Panitia besar', 'min_poin' => 20, 'max_poin' => 35, 'bonus_poin' => null, 'status_delete' => '0']);
        Synapoint::create(['nama_kegiatan' => 'Peserta Lomba proker SU ISB', 'min_poin' => 10, 'max_poin' => 20, 'bonus_poin' => null, 'status_delete' => '0']);
        Synapoint::create(['nama_kegiatan' => 'Beli merch murah', 'min_poin' => 2, 'max_poin' => 5, 'bonus_poin' => null, 'status_delete' => '0']);
        Synapoint::create(['nama_kegiatan' => 'Mahasiswa ikut lomba apapun', 'min_poin' => 10, 'max_poin' => 15, 'bonus_poin' => null, 'status_delete' => '0']);
        Synapoint::create(['nama_kegiatan' => 'PPK ORMAWA', 'min_poin' => 30, 'max_poin' => 40, 'bonus_poin' => null, 'status_delete' => '0']);
        Synapoint::create(['nama_kegiatan' => 'Up konten ttg ISB (SEMI LOMBA)', 'min_poin' => 10, 'max_poin' => 15, 'bonus_poin' => 12, 'status_delete' => '0']);
        Synapoint::create(['nama_kegiatan' => 'Pegasus', 'min_poin' => 30, 'max_poin' => 40, 'bonus_poin' => null, 'status_delete' => '0']);
        Synapoint::create(['nama_kegiatan' => 'SU', 'min_poin' => 40, 'max_poin' => 50, 'bonus_poin' => null, 'status_delete' => '0']);
    }
}
