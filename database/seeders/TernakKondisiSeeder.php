<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TernakKondisiSeeder extends Seeder
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
                'ternak_kesehatan' => 1,
                'ternak_status' => 1,
            ],
            [
                'ternak_tag' => 'A02',
                'ternak_kesehatan' => 2,
                'ternak_status' => 2,
            ],
            [
                'ternak_tag' => 'C01',
                'ternak_kesehatan' => 3,
                'ternak_status' => 3,
            ],
        ];
        DB::table('ternak_kondisi')->insert($data);
    }
}
