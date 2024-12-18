<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kesehatan;

class KesehatanSeeder extends Seeder
{
    public function run()
    {
        $kesehatans = [
            [
                'kode_kesehatan' => 'SHT',
                'nama_kesehatan' => 'Sehat',
                'deskripsi' => 'Ternak dalam kondisi optimal dan bebas masalah kesehatan.',
            ],
            [
                'kode_kesehatan' => 'MLN',
                'nama_kesehatan' => 'Malnutrisi',
                'deskripsi' => 'Ternak kekurangan nutrisi yang memengaruhi pertumbuhannya.',
            ],
            [
                'kode_kesehatan' => 'SKT',
                'nama_kesehatan' => 'Sakit',
                'deskripsi' => 'Ternak mengalami gangguan kesehatan atau penyakit.  ',
            ],
            [
                'kode_kesehatan' => 'KRT',
                'nama_kesehatan' => 'Karantina',
                'deskripsi' => 'Ternak dipisahkan untuk mencegah penyebaran penyakit.',
            ],
            [
                'kode_kesehatan' => 'SDB',
                'nama_kesehatan' => 'Sedang Diobati',
                'deskripsi' => 'Ternak dalam proses perawatan medis.',
            ]
        ];

        foreach ($kesehatans as $kesehatan) {
            Kesehatan::create($kesehatan);
        }
    }
}
