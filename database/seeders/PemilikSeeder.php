<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Pemilik;
use Carbon\Carbon;


class PemilikSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $pemiliks = [
            [
                'kode_pemilik' => 'PML001', // Ahmad Sanjaya
                'nama_pemilik' => 'Ahmad Sanjaya',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_pemilik' => 'PML002', // Budi Santoso
                'nama_pemilik' => 'Budi Santoso',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_pemilik' => 'PML003', // Cahya Wijaya
                'nama_pemilik' => 'Cahya Wijaya',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];

        foreach ($pemiliks as $pemilik) {
            Pemilik::create(attributes: $pemilik);
        }
    }
}
