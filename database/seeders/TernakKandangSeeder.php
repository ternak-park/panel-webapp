<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TernakKandang;
use Carbon\Carbon;

class TernakKandangSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        $ternakkandangs = [
            [
                'kode_kandang' => 'KDG001',
                'total_ternak_kandang' => 10,
                'nama_pemilik_id' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_kandang' => 'KDG002',
                'total_ternak_kandang' => 8,
                'nama_pemilik_id' => 2,
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'kode_kandang' => 'KDG003',
                'total_ternak_kandang' => 12,
                'nama_pemilik_id' => 3,
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];
        foreach ($ternakkandangs as $ternakkandang) {
            TernakKandang::create(attributes: $ternakkandang);
        }
    }
}
