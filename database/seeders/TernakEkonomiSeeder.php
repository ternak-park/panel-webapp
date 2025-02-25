<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TernakEkonomiSeeder extends Seeder
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
                'harga_beli' => 1500000.00,
                'harga_jual' => 2000000.00,
                'hpp_pembelian' => 1550000.00,
                'biaya_transportasi' => 50000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'A02',
                'harga_beli' => 1800000.00,
                'harga_jual' => 2200000.00,
                'hpp_pembelian' => 1850000.00,
                'biaya_transportasi' => 50000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ternak_tag' => 'C01',
                'harga_beli' => 1400000.00,
                'harga_jual' => null, // Belum dijual
                'hpp_pembelian' => 1450000.00,
                'biaya_transportasi' => 50000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('ternak_ekonomi')->insert($data);
    }
}
