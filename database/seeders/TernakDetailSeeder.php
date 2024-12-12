<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TernakDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'ternak_tag' => 'HEW-001',
                'ternak_induk' => null,
                'sex' => 'Jantan',
                'tanggal_masuk' => '2024-01-01',
                'ternak_status' => 1,
                'ternak_tipe' => 4,
                'ternak_kesehatan' => 1,
                'ternak_program' => 1,
                'ternak_kandang' => 1,
                'pemilik' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'HEW-002',
                'ternak_induk' => null,
                'sex' => 'Betina',
                'tanggal_masuk' => '2024-02-01',
                'ternak_status' => 1,
                'ternak_tipe' => 3,
                'ternak_kesehatan' => 1,
                'ternak_program' => 2,
                'ternak_kandang' => 2,
                'pemilik' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'HEW-003',
                'ternak_induk' => null,
                'sex' => 'Jantan',
                'tanggal_masuk' => '2024-03-01',
                'ternak_status' => 1,
                'ternak_tipe' => 2,
                'ternak_kesehatan' => 1,
                'ternak_program' => 1,
                'ternak_kandang' => 3,
                'pemilik' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'HEW-004',
                'ternak_induk' => 'HEW-002',
                'sex' => 'Betina',
                'tanggal_masuk' => '2024-02-01',
                'ternak_status' => 1,
                'ternak_tipe' => 7,
                'ternak_kesehatan' => 1,
                'ternak_program' => 3,
                'ternak_kandang' => 2,
                'pemilik' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'HEW-005',
                'ternak_induk' => 'HEW-002',
                'sex' => 'Betina',
                'tanggal_masuk' => '2024-02-01',
                'ternak_status' => 1,
                'ternak_tipe' => 8,
                'ternak_kesehatan' => 1,
                'ternak_program' => 3,
                'ternak_kandang' => 2,
                'pemilik' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('ternak_detail')->insert($data);
    }
}
