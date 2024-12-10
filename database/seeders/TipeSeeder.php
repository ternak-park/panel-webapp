<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipe;

class TipeSeeder extends Seeder
{
    public function run()
    {
        $tipes = [
            [
                'nama_tipe' => 'Betina Daging',
            ],
            [
                'nama_tipe' => 'Jantan Tanduk',
            ],
            [
                'nama_tipe' => 'Betina Siap Kawin',
            ],
            [
                'nama_tipe' => 'Jantan Dugul',
            ],
            [
                'nama_tipe' => 'Betina Bunting',
            ],
            [
                'nama_tipe' => 'Betina Indukan',
            ],
            [
                'nama_tipe' => 'Anak Jantan',
            ],
            [
                'nama_tipe' => 'Anak Betina',
            ]
        ];

        foreach ($tipes as $tipe) {
            Tipe::create(attributes: $tipe);
        }
    }
}
