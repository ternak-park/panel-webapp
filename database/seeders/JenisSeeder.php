<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Jenis;

class JenisSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $jeniss = [
            [
                'kode_jenis' => 'JBDG',
                'nama_jenis' => 'Betina Daging',
                'deskripsi_jenis' => 'Lorem Ipsum Gingsul Namata Sadewa',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_jenis' => 'JJJT',
                'nama_jenis' => 'Jantan Tanduk',
                'deskripsi_jenis' => 'Lorem Ipsum Gingsul Namata Sadewa',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_jenis' => 'JBSK',
                'nama_jenis' => 'Betina Siap Kawin',
                'deskripsi_jenis' => 'Lorem Ipsum Gingsul Namata Sadewa',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_jenis' => 'JJDG',
                'nama_jenis' => 'Jantan Dugul',
                'deskripsi_jenis' => 'Lorem Ipsum Gingsul Namata Sadewa',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_jenis' => 'JBBT',
                'nama_jenis' => 'Betina Bunting',
                'deskripsi_jenis' => 'Lorem Ipsum Gingsul Namata Sadewa',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_jenis' => 'JBIN',
                'nama_jenis' => 'Betina Indukan',
                'deskripsi_jenis' => 'Lorem Ipsum Gingsul Namata Sadewa',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_jenis' => 'JAJT',
                'nama_jenis' => 'Anak Jantan',
                'deskripsi_jenis' => 'Lorem Ipsum Gingsul Namata Sadewa',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_jenis' => 'JABT',
                'nama_jenis' => 'Anak Betina',
                'deskripsi_jenis' => 'Lorem Ipsum Gingsul Namata Sadewa',
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];

        foreach ($jeniss as $jenis) {
            Jenis::create(attributes: $jenis);
        }
    }
}
