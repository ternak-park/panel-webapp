<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TernakReproduksiSeeder extends Seeder
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
                'tanggal_birahi' => '2024-01-10',
                'tanggal_kawin' => '2024-01-15',
                'tanggal_ib' => '2024-01-20',
                'nomor_semen' => 'NS001',
                'jenis_semen' => 'Domba Lokal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'A02',
                'tanggal_birahi' => '2024-02-05',
                'tanggal_kawin' => '2024-02-10',
                'tanggal_ib' => null,
                'nomor_semen' => null,
                'jenis_semen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'C01',
                'tanggal_birahi' => null,
                'tanggal_kawin' => null,
                'tanggal_ib' => '2024-03-01',
                'nomor_semen' => 'NS002',
                'jenis_semen' => 'Kambing Etawa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('ternak_reproduksi')->insert($data);
    }
}
