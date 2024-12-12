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
                'sex' => 'jantan',
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
                'sex' => 'betina',
                'tanggal_masuk' => '2024-02-01',
                'ternak_status' => 2,
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
                'sex' => 'jantan',
                'tanggal_masuk' => '2024-03-01',
                'ternak_status' => 1,
                'ternak_tipe' => 2,
                'ternak_kesehatan' => 1,
                'ternak_program' => 3,
                'ternak_kandang' => 3,
                'pemilik' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('ternak_detail')->insert($data);
    }
}
