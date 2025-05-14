<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Petugas;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $petugass = [
            [
                'kode_petugas' => 'PTG001',
                'nama_petugas' => 'Rudi Hermawan',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_petugas' => 'PTG002',
                'nama_petugas' => 'Siti Aminah',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_petugas' => 'PTG003',
                'nama_petugas' => 'Tono Supriyadi',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_petugas' => 'PTG004',
                'nama_petugas' => 'Umi Kalsum',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_petugas' => 'PTG005',
                'nama_petugas' => 'Vino Bastian',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        foreach ($petugass as $petugas) {
            Petugas::create(attributes: $petugas);
        }
    }
}
