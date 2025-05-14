<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\DetailTernakKandang;
use Carbon\Carbon;

class DetailTernakKandangSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $detailternakkandangs = [
            [
                'kode_kandang_id' => 1,
                'total_ternak' => 10,
                'total_bb' => 250.50,
                'nama_petugas_id' => 1,
                'nama_pemilik_id' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_kandang_id' => 2,
                'total_ternak' => 8,
                'total_bb' => 200.75,
                'nama_petugas_id' => 2,
                'nama_pemilik_id' => 2,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_kandang_id' => 3,
                'total_ternak' => 12,
                'total_bb' => 300.25,
                'nama_petugas_id' => 3,
                'nama_pemilik_id' => 3,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];

        foreach ($detailternakkandangs as $detailternakkandang) {
            DetailTernakKandang::create(attributes: $detailternakkandang);
        }
    }
}
