<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

class TernakHewanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example data for seeding
        $data = [
            [
                'tag' => 'A01',
                'jenis' => 'domba',
                'sex' => 'jantan',
                'ternak_tipe' => 4,
                'gambar_hewan' => 'hewan1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'A02',
                'jenis' => 'kambing',
                'sex' => 'betina',
                'ternak_tipe' => 3,
                'gambar_hewan' => 'hewan2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'B01',
                'jenis' => 'domba',
                'sex' => 'jantan',
                'ternak_tipe' => 2,
                'gambar_hewan' => 'hewan3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'C01',
                'jenis' => 'kambing',
                'sex' => 'jantan',
                'ternak_tipe' => 7,
                'gambar_hewan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'C02',
                'jenis' => 'kambing',
                'sex' => 'betina',
                'ternak_tipe' => 8,
                'gambar_hewan' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('ternak_hewan')->insert($data);
    }
}
