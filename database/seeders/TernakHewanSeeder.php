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
                'tag' => 'HEW-001',
                'jenis' => 'domba',
                'sex' => 'jantan',
                'ternak_tipe' => 4,
                'gambar_hewan' => 'hewan1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'HEW-002',
                'jenis' => 'kambing',
                'sex' => 'betina',
                'ternak_tipe' => 3,
                'gambar_hewan' => 'hewan2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tag' => 'HEW-003',
                'jenis' => 'domba',
                'sex' => 'jantan',
                'ternak_tipe' => 2,
                'gambar_hewan' => 'hewan3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('ternak_hewan')->insert($data);
    }
}
