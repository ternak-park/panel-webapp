<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Status;
use Carbon\Carbon;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $statuss = [
            [
                'kode_status' => 'SDKG',
                'nama_status' => 'Dikandang',
                'deskripsi_status' => 'Ternak berada di dalam kandang',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'kode_status' => 'STJL',
                'nama_status' => 'Terjual',
                'deskripsi_status' => 'Ternak sudah terjual',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'kode_status' => 'SMTR',
                'nama_status' => 'Mitra',
                'deskripsi_status' => 'Ternak milik mitra',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'kode_status' => 'SMTI',
                'nama_status' => 'Mati',
                'deskripsi_status' => 'Ternak sudah mati karena sakit',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'kode_status' => 'SDSB',
                'nama_status' => 'Disembelih',
                'deskripsi_status' => 'Ternak sudah disembelih',
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ];

        foreach ($statuss as $status) {
            Status::create(attributes: $status);
        }
    }
}
