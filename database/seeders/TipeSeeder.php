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
                'kode_tipe' => 'UNE-123',
                'nama_tipe' => 'Betina Daging',
                'deskripsi' => 'Lorem Ipsum Gingsul Namata Sadewa',
            ],
            [
                'kode_tipe' => 'UNE-333',
                'nama_tipe' => 'Jantan Tanduk',
                'deskripsi' => 'Lorem Ipsum Gingsul Namata Sadewa',
            ],
            [
                'kode_tipe' => 'UNE-525',
                'nama_tipe' => 'Betina Siap Kawin',
                'deskripsi' => 'Lorem Ipsum Gingsul Namata Sadewa',
            ],
            [
                'kode_tipe' => 'UNE-SAD',
                'nama_tipe' => 'Jantan Dugul',
                'deskripsi' => 'Lorem Ipsum Gingsul Namata Sadewa',
            ],
            [
                'kode_tipe' => 'UNE-GAS',
                'nama_tipe' => 'Betina Bunting',
                'deskripsi' => 'Lorem Ipsum Gingsul Namata Sadewa',
            ],
            [
                'kode_tipe' => 'UNE-HWW',
                'nama_tipe' => 'Betina Indukan',
                'deskripsi' => 'Lorem Ipsum Gingsul Namata Sadewa',
            ],
            [
                'kode_tipe' => 'UNE-HSS',
                'nama_tipe' => 'Anak Jantan',
                'deskripsi' => 'Lorem Ipsum Gingsul Namata Sadewa',
            ],
            [
                'kode_tipe' => 'UNE-HSH',
                'nama_tipe' => 'Anak Betina',
                'deskripsi' => 'Lorem Ipsum Gingsul Namata Sadewa',
            ]
        ];

        foreach ($tipes as $tipe) {
            Tipe::create(attributes: $tipe);
        }
    }
}
