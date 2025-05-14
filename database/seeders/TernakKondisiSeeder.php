<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TernakKondisi;
use Carbon\Carbon;

class TernakKondisiSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $ternakkondisis = [
            [
                'tgl_kejadian_kondisi' => $now->format('Y-m-d'),
                'ternak_tag_id' => 1,
                'ternak_kandang_id' => 1,
                'ternak_jenis_id' => 1,
                'sex_hewan_kondisi' => 'Jantan',
                'ternak_kesehatan_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'tgl_kejadian_kondisi' => $now->format('Y-m-d'),
                'ternak_tag_id' => 2,
                'ternak_kandang_id' => 2,
                'ternak_jenis_id' => 2,
                'sex_hewan_kondisi' => 'Jantan',
                'ternak_kesehatan_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'tgl_kejadian_kondisi' => $now->format('Y-m-d'),
                'ternak_tag_id' => 3,
                'ternak_kandang_id' => 3,
                'ternak_jenis_id' => 3,
                'sex_hewan_kondisi' => 'Jantan',
                'ternak_kesehatan_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];
        foreach ($ternakkondisis as $ternakkondisi) {
            TernakKondisi::create(attributes: $ternakkondisi);
        }
    }
}
