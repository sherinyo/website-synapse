<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SynapointRequest;
use Illuminate\Database\Seeder;

class SynapointRequestSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'user')->first();
        $synapoint = \App\Models\Synapoint::where('nama_kegiatan', 'Webinar')->first();

        if ($user && $synapoint) {
            SynapointRequest::create([
                'Synapoint_ID' => $synapoint->id,
                'user_ID' => $user->id,
                'nama_kegiatan' => 'Mengikuti Webinar Laravel 101',
                'type_kegiatan' => 'Webinar',
                'bukti_kegiatan' => 'https://example.com/bukti/webinar.pdf',
                'status_delete' => '0',
            ]);
        }
    }
}
