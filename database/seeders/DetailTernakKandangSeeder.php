<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DetailTernakKandang;

class DetailTernakKandangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detailList = [
            [
                'kode_kandang' => 'A01-A',
                'hewan_tag' => 'A01',
                'jenis_domba' => 1,
                'berat_domba' => 1,
                'kondisi_domba' => 1,
            ],
            [
                'kode_kandang' => 'A01-B',
                'hewan_tag' => 'A02',
                'jenis_domba' => 2,
                'berat_domba' => 2,
                'kondisi_domba' => 1,
            ],
            [
                'kode_kandang' => 'A01-C',
                'hewan_tag' => 'C01',
                'jenis_domba' => 1,
                'berat_domba' => 3,
                'kondisi_domba' => 2,
            ],
        ];

        foreach ($detailList as $detail) {
            DetailTernakKandang::create($detail);
        }
    }
}
