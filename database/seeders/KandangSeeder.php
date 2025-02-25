<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kandang;

class KandangSeeder extends Seeder
{
    public function run()
    {
        $kandangList = [
            [
                'kode_kandang' => 'A01-A',
                'anak_kandang' => 'PTG001',
            ],
            [
                'kode_kandang' => 'A01-B',
                'anak_kandang' => 'PTG002',
            ],
            [
                'kode_kandang' => 'A01-C',
                'anak_kandang' => 'PTG003',
            ],
        ];

        foreach ($kandangList as $kandang) {
            Kandang::create($kandang);
        }
    }
}