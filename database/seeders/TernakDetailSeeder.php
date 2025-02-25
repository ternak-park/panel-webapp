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
                'ternak_tag' => 'A01',
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
                'ternak_tag' => 'A02',
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
                'ternak_tag' => 'C01',
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
                'ternak_tag' => 'C01',
                'ternak_induk' => 'A02',
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
                'ternak_tag' => 'C02',
                'ternak_induk' => 'A02',
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
