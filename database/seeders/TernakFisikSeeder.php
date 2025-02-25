<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TernakFisikSeeder extends Seeder
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
                'berat_masuk' => 25.50,
                'berat_terakhir' => 30.75,
                'kenaikan_berat' => 5.25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'A02',
                'berat_masuk' => 20.00,
                'berat_terakhir' => 25.00,
                'kenaikan_berat' => 5.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'C01',
                'berat_masuk' => 30.00,
                'berat_terakhir' => 33.50,
                'kenaikan_berat' => 3.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('ternak_fisik')->insert($data);
    }
}
