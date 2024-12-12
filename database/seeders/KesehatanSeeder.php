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
                'nama_kesehatan' => 'Sehat',
            ],
            [
                'nama_kesehatan' => 'Malnutrisi',
            ],
            [
                'nama_kesehatan' => 'Sakit',
            ],
            [
                'nama_kesehatan' => 'Karantina',
            ],
            [
                'nama_kesehatan' => 'Sedang Diobati',
            ]
        ];

        foreach ($kesehatans as $kesehatan) {
            Kesehatan::create($kesehatan);
        }
    }
}
