<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TernakKandangSeeder extends Seeder
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
                'kode_kandang' => 'KDG001',
                'pemilik' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kandang' => 'KDG002',
                'pemilik' => 2, 
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_kandang' => 'KDG003',
                'pemilik' => null, // Kandang tanpa pemilik
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('ternak_kandang')->insert($data);
    }
}
