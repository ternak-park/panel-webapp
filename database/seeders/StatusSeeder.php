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
                'nama_status' => 'Aktif',
            ],
            [
                'nama_status' => 'Dijual',
            ],
            [
                'nama_status' => 'Mati',
            ],
            [
                'nama_status' => 'Hilang',
            ]
        ];

        foreach ($statuss as $status) {
            Status::create($status);
        }
    }
}
