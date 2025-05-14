<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DetailTernakFisik;
use Carbon\Carbon;

class DetailTernakFisikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $detailternakfisiks = [
            [
                'ternak_fisik_id' => 1,
                'ternak_tag_id' => 1,
                'ternak_kandang_id' => 1,
                'tgl_masuk_lahir' => Carbon::now()->subMonths(6),
                'berat_masuk' => 85.50,
                'tgl_timbang_terakhir' => Carbon::now()->subDays(7),
                'berat_terakhir' => 105.75,
                'kenaikan_berat' => 20.25,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_fisik_id' => 2,
                'ternak_tag_id' => 2,
                'ternak_kandang_id' => 1,
                'tgl_masuk_lahir' => Carbon::now()->subMonths(5),
                'berat_masuk' => 75.25,
                'tgl_timbang_terakhir' => Carbon::now()->subDays(7),
                'berat_terakhir' => 95.50,
                'kenaikan_berat' => 20.25,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_fisik_id' => 3,
                'ternak_tag_id' => 3,
                'ternak_kandang_id' => 2,
                'tgl_masuk_lahir' => Carbon::now()->subMonths(4),
                'berat_masuk' => 65.75,
                'tgl_timbang_terakhir' => Carbon::now()->subDays(7),
                'berat_terakhir' => 90.25,
                'kenaikan_berat' => 24.50,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_fisik_id' => 1,
                'ternak_tag_id' => 4,
                'ternak_kandang_id' => 2,
                'tgl_masuk_lahir' => Carbon::now()->subMonths(3),
                'berat_masuk' => 70.25,
                'tgl_timbang_terakhir' => Carbon::now()->subDays(7),
                'berat_terakhir' => 95.00,
                'kenaikan_berat' => 24.75,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'ternak_fisik_id' => 2,
                'ternak_tag_id' => 5,
                'ternak_kandang_id' => 3,
                'tgl_masuk_lahir' => Carbon::now()->subMonths(7),
                'berat_masuk' => 80.00,
                'tgl_timbang_terakhir' => Carbon::now()->subDays(7),
                'berat_terakhir' => 110.50,
                'kenaikan_berat' => 30.50,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        foreach ($detailternakfisiks as $detailternakfisik) {
            DetailTernakFisik::create($detailternakfisik);
        }
    }
}
