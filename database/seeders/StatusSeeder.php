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
                'nama_status' => 'Sehat',
            ],
            [
                'nama_status' => 'Malnutrisi',
            ],
            [
                'nama_status' => 'Sakit',
            ],
            [
                'nama_status' => 'Karantina',
            ],
            [
                'nama_status' => 'Sedang Diobati',
            ]
        ];

        foreach ($statuss as $status) {
            Status::create($status);
        }
    }
}
