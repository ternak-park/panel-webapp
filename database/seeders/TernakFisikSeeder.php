<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TernakFisik;
use Carbon\Carbon;

class TernakFisikSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $ternakfisiks = [
            [
                'id' => 1,
                'ternak_tag_id' => 1,
                'ternak_kandang_id' => 1,
                'tgl_masuk_lahir_fisik' => $now->format('Y-m-d'),
                'berat_masuk_fisik' => 85.50,
                'tgl_timbang_terakhir_fisik' => $now->subDays(7)->format('Y-m-d'),
                'berat_terakhir_fisik' => 105.75,
                'kenaikan_berat_fisik' => 20.25,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 2,
                'ternak_tag_id' => 2,
                'ternak_kandang_id' => 1,
                'tgl_masuk_lahir_fisik' => $now->format('Y-m-d'),
                'berat_masuk_fisik' => 75.25,
                'tgl_timbang_terakhir_fisik' => $now->format('Y-m-d'),
                'berat_terakhir_fisik' => 95.50,
                'kenaikan_berat_fisik' => 20.25,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 3,
                'ternak_tag_id' => 3,
                'ternak_kandang_id' => 2,
                'tgl_masuk_lahir_fisik' => $now->format('Y-m-d'),
                'berat_masuk_fisik' => 65.75,
                'tgl_timbang_terakhir_fisik' => $now->format('Y-m-d'),
                'berat_terakhir_fisik' => 90.25,
                'kenaikan_berat_fisik' => 24.50,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 4,
                'ternak_tag_id' => 4,
                'ternak_kandang_id' => 2,
                'tgl_masuk_lahir_fisik' => $now->format('Y-m-d'),
                'berat_masuk_fisik' => 70.25,
                'tgl_timbang_terakhir_fisik' => $now->format('Y-m-d'),
                'berat_terakhir_fisik' => 95.00,
                'kenaikan_berat_fisik' => 24.75,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 5,
                'ternak_tag_id' => 5,
                'ternak_kandang_id' => 3,
                'tgl_masuk_lahir_fisik' => $now->format('Y-m-d'),
                'berat_masuk_fisik' => 80.00,
                'tgl_timbang_terakhir_fisik' => $now->format('Y-m-d'),
                'berat_terakhir_fisik' => 110.50,
                'kenaikan_berat_fisik' => 30.50,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($ternakfisiks as $ternakfisik) {
            TernakFisik::create($ternakfisik);
        }
    }
}   
