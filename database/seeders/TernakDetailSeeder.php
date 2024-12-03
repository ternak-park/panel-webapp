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
                'ternak_status' => 1, // ini  tabel `status`
                'ternak_jenis' => 1, // ini  tabel `jenis`
                'ternak_program' => 1, // ini  tabel `program`
                'ternak_kandang' => 1, // ini  tabel `ternak_kandang`
                'jenis_kandang' => 1, // ini  tabel `jenis`
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'HEW-002',
                'sex' => 'betina',
                'tanggal_masuk' => '2024-02-01',
                'ternak_status' => 2,
                'ternak_jenis' => 2,
                'ternak_program' => 2,
                'ternak_kandang' => 2,
                'jenis_kandang' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'HEW-003',
                'sex' => 'jantan',
                'tanggal_masuk' => '2024-03-01',
                'ternak_status' => 1,
                'ternak_jenis' => 3,
                'ternak_program' => 3,
                'ternak_kandang' => 3,
                'jenis_kandang' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('ternak_detail')->insert($data);
    }
}
