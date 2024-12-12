<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $statuss = [
            [
                'kode_status' => 'AVA-XXA',
                'nama_status' => 'Aktif',
                'deskripsi' => 'Status aktif menunjukkan bahwa item ini sedang digunakan atau tersedia.'
            ],
            [
                'kode_status' => 'UNE-SAW',
                'nama_status' => 'Dijual',
                'deskripsi' => 'Status nonaktif menunjukkan bahwa item ini tidak sedang digunakan atau tidak tersedia.'
            ],
            [
                'kode_status' => 'WKW-WKW',
                'nama_status' => 'Mati',
                'deskripsi' => 'Status pending menunjukkan bahwa item ini sedang menunggu konfirmasi atau tindakan lebih lanjut.'
            ]
            ,
            [
                'kode_status' => 'DAD-WKW',
                'nama_status' => 'Hilang',
                'deskripsi' => 'Status pending menunjukkan bahwa item ini sedang menunggu konfirmasi atau tindakan lebih lanjut.'
            ]
        ];

        foreach ($statuss as $status) {
            Status::create($status);
        }
    }
}
