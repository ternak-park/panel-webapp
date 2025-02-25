<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Petugas;

class PetugasSeeder extends Seeder
{
    public function run()
    {
        $petugasList = [
            [
                'kode_petugas' => 'PTG001',
                'nama_petugas' => 'Ahmad Suherman',
            ],
            [
                'kode_petugas' => 'PTG002',
                'nama_petugas' => 'Budi Santoso',
            ],
            [
                'kode_petugas' => 'PTG003',
                'nama_petugas' => 'Citra Dewi',
            ],
        ];

        foreach ($petugasList as $petugas) {
            Petugas::create($petugas);
        }
    }
}