<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Kesehatan;
use Carbon\Carbon;

class KesehatanSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $kesehatans = [
            [
                'kode_kesehatan' => 'KSHT',
                'nama_kesehatan' => 'Sehat',
                'deskripsi_kesehatan' => 'Ternak dalam kondisi optimal dan bebas masalah kesehatan.',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_kesehatan' => 'KMTI',
                'nama_kesehatan' => 'Mati',
                'deskripsi_kesehatan' => 'Ternak sudah mati.',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_kesehatan' => 'KMNY',
                'nama_kesehatan' => 'Menyusui',
                'deskripsi_kesehatan' => 'Ternak sedang dalam masa menyusui.',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_kesehatan' => 'KHML',
                'nama_kesehatan' => 'Hamil',
                'deskripsi_kesehatan' => 'Ternak dalam kondisi hamil.',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_kesehatan' => 'KSKT',
                'nama_kesehatan' => 'Sakit',
                'deskripsi_kesehatan' => 'Ternak dalam kondisi sakit.',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_kesehatan' => 'KMLH',
                'nama_kesehatan' => 'Melahirkan',
                'deskripsi_kesehatan' => 'Ternak melahirkan.',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_kesehatan' => 'KSPH',
                'nama_kesehatan' => 'Lepas sapih',
                'deskripsi_kesehatan' => 'Ternak dalam lepas sapih umur 3 bulan.',
                'created_at' => $now,
                'updated_at' => $now
            ],

        ];

        foreach ($kesehatans as $kesehatan) {
            Kesehatan::create(attributes: $kesehatan);
        }
    }
}
