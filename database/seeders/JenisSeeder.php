<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jenis;

class JenisSeeder extends Seeder
{
    public function run()
    {
        $jeniss = [
            [
                'nama_jenis' => 'Betina Daging',
            ],
            [
                'nama_jenis' => 'Jantan Tanduk',
            ],
            [
                'nama_jenis' => 'Betina Siap Kawin',
            ],
            [
                'nama_jenis' => 'Jantan Dugul',
            ],
            [
                'nama_jenis' => 'Betina Bunting',
            ],
            [
                'nama_jenis' => 'Betina Indukan',
            ],
            [
                'nama_jenis' => 'Anak Jantan',
            ],
            [
                'nama_jenis' => 'Anak Betina',
            ]
        ];

        foreach ($jeniss as $jenis) {
            Jenis::create($jenis);
        }
    }
}
